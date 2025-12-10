<?php
session_start();
require __DIR__ . '/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: ../paginas/login_usuario.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int)($_POST['id'] ?? 0);
    if ($id <= 0) { header('Location: ../paginas/fornecedores_page.php'); exit; }

    $nome = trim($_POST['nome']);
    $cnpj = trim($_POST['cnpj'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $observacoes = trim($_POST['observacoes'] ?? '');

    $sql = "UPDATE fornecedores 
            SET nome = ?, cnpj = ?, endereco = ?, telefone = ?, email = ?, observacoes = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", 
        $nome, $cnpj, $endereco, $telefone, $email, $observacoes, $id
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../paginas/fornecedores_page.php");
    exit;
}

header("Location: ../paginas/fornecedores_page.php");
exit;
?>