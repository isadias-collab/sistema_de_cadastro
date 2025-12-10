<?php

session_start();
require __DIR__ . '/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: ../paginas/login_usuario.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $cnpj = trim($_POST['cnpj'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $observacoes = trim($_POST['observacoes'] ?? '');

    if ($nome === '') {
        $_SESSION['msg'] = "Nome do fornecedor é obrigatório.";
        header('Location: ../paginas/fornecedores_page.php');
        exit;
    }

    $sql = "INSERT INTO fornecedores (nome, cnpj, endereco, telefone, email, observacoes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $nome, $cnpj, $endereco, $telefone, $email, $observacoes);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header('Location: ../paginas/fornecedores_page.php');
    exit;
}
header('Location: ../paginas/fornecedores_page.php');
exit;
