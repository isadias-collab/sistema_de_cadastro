<?php
session_start();
require __DIR__ . '/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: ../paginas/login_usuario.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        // get image name
        $sql = "SELECT imagem FROM produtos WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $imagem);
            if (mysqli_stmt_fetch($stmt)) {
                if (!empty($imagem)) {
                    $file = __DIR__ . '/../uploads/' . $imagem;
                    if (file_exists($file)) @unlink($file);
                }
            }
            mysqli_stmt_close($stmt);
        }
        // delete record
        $sql2 = "DELETE FROM produtos WHERE id = ?";
        $stmt2 = mysqli_prepare($con, $sql2);
        if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, "i", $id);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt2);
        }
    }
}
header('Location: ../paginas/produtos_page.php');
exit;
