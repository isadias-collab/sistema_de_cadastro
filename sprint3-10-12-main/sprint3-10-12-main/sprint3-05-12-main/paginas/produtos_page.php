<?php
session_start();
require __DIR__ . '/../php/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: login_usuario.php'); exit; }


$fornecedores = [];
$res = mysqli_query($con, "SELECT id, nome FROM fornecedores ORDER BY nome ASC");
while ($row = mysqli_fetch_assoc($res)) $fornecedores[] = $row;


$produtos = [];
$sql = "SELECT p.id, p.nome_produto, p.descricao, p.quantidade, p.preco, p.imagem, f.nome AS fornecedor FROM produtos p LEFT JOIN fornecedores f ON p.fornecedor_id = f.id ORDER BY p.id ASC";
$res2 = mysqli_query($con, $sql);
while ($r = mysqli_fetch_assoc($res2)) $produtos[] = $r;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Produtos</title>
  <link rel="stylesheet" href="../css/produtos.css">
</head>
<body>

  

  <!-- Card principal -->
  <div class="card-maior">
    <div class="logo-area">
      <img src="../paginas/img/logo.png" alt="logo" class="logo">
    </div>

    <h2 class="titulo">Cadastro de Produtos</h2>

    <div class="form-card">

      <div class="top-voltar">
        <a href="menu_principal.php" class="voltar-btn">❮</a>
      </div>

      <!-- FORMULÁRIO -->
      <form action="../php/salvar_produto.php" method="post" enctype="multipart/form-data">

        <label>Nome do Produto:</label>
        <input name="nome" placeholder="Digite aqui.." required>

        <label>Descrição:</label>
        <textarea name="descricao" placeholder="Digite aqui.."></textarea>

        <label>Quantidade em Estoque:</label>
        <div class="quant-row">
          <input class="quant-input" name="quantidade" type="number" value="0" min="0">
        </div>

        <label>Preço:</label>
        <input name="preco" placeholder="0.00">

        <label>Nome do Fornecedor:</label>
        <select name="fornecedor_id">
          <option value="">-- selecione --</option>
          <?php foreach($fornecedores as $f): ?>
            <option value="<?php echo $f['id']; ?>"><?php echo htmlspecialchars($f['nome']); ?></option>
          <?php endforeach; ?>
        </select>

        <label>Imagem:</label>
        <input type="file" name="imagem" accept="image/*">

        <button class="btn" type="submit">Cadastrar</button>
      </form>

    </div>
  </div>

  <!-- Tabela de produtos -->
<div class="tabela-card">
    <h2 class="titulo-tabela">Produtos Cadastrados</h2>


    <table>
      <thead>
        <tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Quantidade</th><th>Preço</th><th>Fornecedor</th><th>Imagem</th><th>Ações</th></tr>
      </thead>
      <tbody>
      <?php if(empty($produtos)): ?>
        <tr><td colspan="8">Nenhum produto cadastrado</td></tr>
      <?php else: foreach($produtos as $p): ?>
        <tr>
          <td data-label="ID"><?= $p['id'] ?></td>
          <td data-label="Nome"><?= htmlspecialchars($p['nome_produto']) ?></td>
          <td data-label="Descrição"><?= htmlspecialchars($p['descricao']) ?></td>
          <td data-label="Quantidade"><?= (int)$p['quantidade'] ?></td>
          <td data-label="Preço"><?= number_format($p['preco'],2,',','.') ?></td>
          <td data-label="Fornecedor"><?= htmlspecialchars($p['fornecedor']) ?></td>

          <td data-label="Imagem">
            <?php if(!empty($p['imagem']) && file_exists(__DIR__ . '/../uploads/' . $p['imagem'])): ?>
              <img class="thumb" src="../uploads/<?php echo htmlspecialchars($p['imagem']); ?>" alt="">
            <?php else: ?>
              -
            <?php endif; ?>
          </td>

          <td data-label="Ações">
              <a href="edit_produto.php?id=<?php echo $p['id']; ?>" class="edit">Editar</a>
              <form action="../php/delete_produto.php" method="post" style="display:inline" onsubmit="return confirm('Deletar?')">
                <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                <button class="delete" type="submit">Excluir</button>
              </form>
          </td>

        </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
</div>

<div class="bola1">
    <img src="../paginas/img/bola1.png" alt="bola1">
</div>

<div class="bola2">
    <img src="../paginas/img/bola2.png" alt="bola2">
</div>

<div class="bola3">
    <img src="../paginas/img/bola3.png" alt="bola3">
  
</div>

</body>
</html>
