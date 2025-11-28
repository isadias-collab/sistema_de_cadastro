<?php

session_start();
require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($usuario === '' || $senha === '') {
        $_SESSION['msg'] = "Preencha todos os campos.";
        header('Location: ../paginas/cadastro_usuario.php');
        exit;
    }

    $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if ($ok) {
            $_SESSION['msg'] = "Cadastro realizado. Faça login.";
            header('Location: ../paginas/login_usuario.php');
            exit;
        }
    }
    $_SESSION['msg'] = "Erro: usuário já existe ou problema.";
    header('Location: ../paginas/cadastro_usuario.php');
    exit;
}
header('Location: ../paginas/cadastro_usuario.php');
exit;
