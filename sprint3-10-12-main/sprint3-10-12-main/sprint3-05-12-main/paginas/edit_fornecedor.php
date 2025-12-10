<?php
session_start();
require __DIR__ . '/../php/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: login_usuario.php'); exit; }

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: fornecedores_page.php'); exit; }

$stmt = mysqli_prepare($con, "SELECT nome, cnpj, endereco, telefone, email, observacoes FROM fornecedores WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nome, $cnpj, $endereco, $telefone, $email, $observacoes);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar Fornecedor</title>
  
  <link rel="stylesheet" href="../css/produtos.css">
</head>
<body>

<div class="card-maior">

  <div class="top-voltar">
    <a href="fornecedores_page.php" class="voltar-btn">❮</a>
  </div>

  <h2 class="titulo">Editar Fornecedor</h2>

  <div class="form-card">
    <form action="../php/update_fornecedor.php" method="post">

      <input type="hidden" name="id" value="<?= $id ?>">

      <label>Nome:</label>
      <input name="nome" value="<?= htmlspecialchars($nome) ?>" required>

      <label>CNPJ:</label>
      <input name="cnpj" value="<?= htmlspecialchars($cnpj) ?>">

      <label>Endereço:</label>
      <input name="endereco" value="<?= htmlspecialchars($endereco) ?>">

      <label>Telefone:</label>
      <input name="telefone" value="<?= htmlspecialchars($telefone) ?>">

      <label>E-mail:</label>
      <input name="email" value="<?= htmlspecialchars($email) ?>">

      <label>Observações:</label>
      <textarea name="observacoes"><?= htmlspecialchars($observacoes) ?></textarea>

      <button class="btn" type="submit">Salvar Alterações</button>
    </form>
  </div>

</div>

</body>
</html>
