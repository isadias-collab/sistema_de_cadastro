<?php

session_start();
require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($usuario === '' || $senha === '') {
        $_SESSION['msg'] = "Preencha todos os campos.";
        header('Location: ../paginas/login_usuario.php');
        exit;
    }

    $sql = "SELECT id, senha FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $senha_db);
        if (mysqli_stmt_fetch($stmt)) {
            // senha em texto puro (comparação direta)
            if ($senha === $senha_db) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $usuario;
                mysqli_stmt_close($stmt);
                header('Location: ../paginas/menu_principal.php');
                exit;
            }
        }
        mysqli_stmt_close($stmt);
    }
    $_SESSION['msg'] = "Usuário ou senha inválidos.";
    header('Location: ../paginas/login_usuario.php');
    exit;
}
header('Location: ../paginas/login_usuario.php');
exit;
