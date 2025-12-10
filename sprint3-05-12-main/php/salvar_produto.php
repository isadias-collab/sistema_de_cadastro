<?php
session_start();
require __DIR__ . '/conexao.php';

// impede acesso sem login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../paginas/login_usuario.php');
    exit;
}

// cria pasta uploads se não existir
$uploadDir = __DIR__ . '/../uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// só aceita POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // pega os campos
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $quantidade = (int)($_POST['quantidade'] ?? 0);
    $preco = str_replace(',', '.', trim($_POST['preco'] ?? '0'));
    $fornecedor_id = $_POST['fornecedor_id'] ?? null;

    // valida nome obrigatório
    if ($nome === '') {
        $_SESSION['msg'] = "Nome do produto é obrigatório.";
        header('Location: ../paginas/produtos_page.php');
        exit;
    }

    // faz upload da imagem (opcional)
    $imagemNome = null;
    if (!empty($_FILES['imagem']['name'])) {

        $tmp = $_FILES['imagem']['tmp_name'];
        $orig = basename($_FILES['imagem']['name']);

        // deixa nome seguro
        $ext = pathinfo($orig, PATHINFO_EXTENSION);
        $base = pathinfo($orig, PATHINFO_FILENAME);
        $baseSeguro = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $base);

        // nome final
        $imagemNome = $baseSeguro . "_" . time() . "." . $ext;
        $destino = $uploadDir . '/' . $imagemNome;

        if (!move_uploaded_file($tmp, $destino)) {
            $_SESSION['msg'] = "Erro ao enviar imagem.";
            header('Location: ../paginas/produtos_page.php');
            exit;
        }
    }

    // se não escolher fornecedor → vira NULL
    if ($fornecedor_id === '' || $fornecedor_id === null) {
        $fornecedor_id = null;
    }

    // SQL definitivo (apenas 1!)
    $sql = "INSERT INTO produtos 
            (nome_produto, descricao, quantidade, preco, fornecedor_id, imagem)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("Erro prepare: " . mysqli_error($con));
    }

    // se fornecedor_id for NULL → usa "i" mas valor null
    mysqli_stmt_bind_param(
        $stmt,
        "ssidis",
        $nome,
        $descricao,
        $quantidade,
        $preco,
        $fornecedor_id,  // pode ser NULL
        $imagemNome
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['msg'] = "Produto cadastrado com sucesso!";
    header('Location: ../paginas/produtos_page.php');
    exit;
}

header('Location: ../paginas/produtos_page.php');
exit;
