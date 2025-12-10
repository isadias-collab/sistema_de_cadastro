<?php
session_start();
require __DIR__ . '/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: ../paginas/login_usuario.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id     = (int)$_POST['id'];
    $nome   = $_POST['nome'];
    $desc   = $_POST['descricao'];
    $quant  = (int)$_POST['quantidade'];
    $preco  = (float)$_POST['preco'];
    $forn   = $_POST['fornecedor_id'] ?: NULL;
    $img_atual = $_POST['img_atual'];

    // imagem
    $novaImg = $img_atual;

    if (!empty($_FILES['imagem']['name'])) {

        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $novoNome = uniqid("prod_") . "." . $ext;

        $destino = __DIR__ . '/../uploads/' . $novoNome;
[]

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {

            if (!empty($img_atual)) {
                $old = __DIR__ . '/../uploads/' . $img_atual;
                if (file_exists($old)) unlink($old);
            }

            $novaImg = $novoNome;
        }
    }

    $sql = "UPDATE produtos SET nome_produto=?, descricao=?, quantidade=?, preco=?, fornecedor_id=?, imagem=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssidsis", 
    $nome, $desc, $quant, $preco, $forn, $novaImg, $id
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header('Location: ../paginas/produtos_page.php');
exit;
