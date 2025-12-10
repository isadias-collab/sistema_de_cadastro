<?php
session_start();
require __DIR__ . '/../php/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: login_usuario.php'); exit; }

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: produtos_page.php'); exit; }

// busca produto
$stmt = mysqli_prepare($con, "SELECT * FROM produtos WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$produto = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$produto) { header('Location: produtos_page.php'); exit; }

// busca fornecedores
$fornRes = mysqli_query($con, "SELECT id, nome FROM fornecedores ORDER BY nome ASC");
$fornecedores = [];
while ($f = mysqli_fetch_assoc($fornRes)) $fornecedores[] = $f;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar Produto</title>
  <link rel="stylesheet" href="../css/produtos.css">
</head>
<body>

<div class="card-maior">
  
  <div class="top-voltar">
    <a href="produtos_page.php" class="voltar-btn">❮</a>
  </div>

  <h2 class="titulo">Editar Produto</h2>

  <div class="form-card">

    <form action="../php/update_produto.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
      <input type="hidden" name="img_atual" value="<?php echo $produto['imagem']; ?>">

      <label>Nome do Produto:</label>
      <input name="nome" value="<?php echo htmlspecialchars($produto['nome_produto']); ?>" required>

      <label>Descrição:</label>
      <textarea name="descricao"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

      <label>Quantidade:</label>
      <input name="quantidade" type="number" value="<?php echo $produto['quantidade']; ?>">

      <label>Preço:</label>
      <input name="preco" value="<?php echo number_format($produto['preco'], 2, '.', ''); ?>">

      <label>Fornecedor:</label>
      <select name="fornecedor_id">
        <option value="">-- selecione --</option>
        <?php foreach ($fornecedores as $f): ?>
            <option value="<?php echo $f['id']; ?>" 
              <?php echo $f['id'] == $produto['fornecedor_id'] ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($f['nome']); ?>
            </option>
        <?php endforeach; ?>
      </select>

      <label>Imagem Atual:</label>
      <?php if($produto['imagem']): ?>
        <img src="../uploads/<?php echo $produto['imagem']; ?>" class="thumb">
      <?php else: ?>
        <p>— sem imagem —</p>
      <?php endif; ?>

      <label>Enviar nova imagem:</label>
      <input type="file" name="imagem" accept="image/*">

      <button class="btn" type="submit">Salvar</button>

    </form>

  </div>
</div>

</body>
</html>
