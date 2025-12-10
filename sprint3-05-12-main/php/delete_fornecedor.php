<?php
session_start();
require __DIR__ . '/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: ../paginas/login_usuario.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        $sql = "DELETE FROM fornecedores WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}
header('Location: ../paginas/fornecedores_page.php');
exit;
