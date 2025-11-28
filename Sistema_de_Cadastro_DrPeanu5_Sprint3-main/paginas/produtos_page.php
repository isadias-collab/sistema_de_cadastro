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

  <!-- Card principal (mesmo estilo da página de fornecedores) -->
  <div class="card-maior">
    <div class="logo-area">
      <img src="../paginas/img/logo.png" alt="logo" class="logo">
    </div>

    <h2 class="titulo">Cadastro de Produtos</h2>

    <div class="form-card">

      <div class="top-voltar">
        <a href="menu_principal.php" class="voltar-btn">❮</a>
      </div>

      <!-- FORMULÁRIO (mesma estrutura visual da página fornecedores; mantém name/types originais) -->
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

  <!-- Tabela de produtos (mesmo estilo de fornecedores) -->
  <div class="tabela-container">
    <h3 class="titulo-tabela">Produtos Cadastrados</h3>

    <table class="table">
      <thead>
        <tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Quantidade</th><th>Preço</th><th>Fornecedor</th><th>Imagem</th><th>Ações</th></tr>
      </thead>
      <tbody>
      <?php if(empty($produtos)): ?>
        <tr><td colspan="8">Nenhum produto cadastrado</td></tr>
      <?php else: foreach($produtos as $p): ?>
        <tr>
          <td><?php echo $p['id']; ?></td>
          <td><?php echo htmlspecialchars($p['nome_produto']); ?></td>
          <td><?php echo htmlspecialchars($p['descricao']); ?></td>
          <td><?php echo (int)$p['quantidade']; ?></td>
          <td><?php echo number_format($p['preco'],2,',','.'); ?></td>
          <td><?php echo htmlspecialchars($p['fornecedor']); ?></td>
          <td>
            <?php if(!empty($p['imagem']) && file_exists(__DIR__ . '/../uploads/' . $p['imagem'])): ?>
              <img class="thumb" src="../uploads/<?php echo htmlspecialchars($p['imagem']); ?>" alt="">
            <?php else: ?>
              -
            <?php endif; ?>
          </td>
<td>

    <!-- BOTÃO EDITAR -->
    <a href="edit_produto.php?id=<?php echo $p['id']; ?>" class="action-btn edit">Editar</a>

    <!-- BOTÃO EXCLUIR -->
    <form action="../php/delete_produto.php" method="post" style="display:inline" onsubmit="return confirm('Deletar?')">
      <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
      <button class="action-btn delete" type="submit">Excluir</button>
    </form>
</td>


        </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
