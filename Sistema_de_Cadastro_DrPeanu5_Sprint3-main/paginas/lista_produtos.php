<?php
session_start();
require __DIR__ . '/../php/conexao.php';

if (!isset($_SESSION['user_id'])) { 
    header('Location: login_usuario.php'); 
    exit; 
}

$produtos = [];
$sql = "SELECT p.id, p.nome_produto, p.descricao, p.quantidade, p.preco, p.imagem, f.nome AS fornecedor 
        FROM produtos p 
        LEFT JOIN fornecedores f ON p.fornecedor_id = f.id 
        ORDER BY p.id ASC";
$res = mysqli_query($con, $sql);
while ($r = mysqli_fetch_assoc($res)) $produtos[] = $r;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listagem de Produtos</title>
  <link rel="stylesheet" href="../css/lista.css">
</head>
<body>

<div class="top-banner"></div>

<div class="container">

  <div class="top-voltar">
  <a href="menu_principal.php" class="voltar-btn">❮</a>
  </div>

  <h2 class="titulo">Listagem de Produtos</h2>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Fornecedor</th>
        <th>Imagens</th>
        <th>Ações</th>
      </tr>
    </thead>

    <tbody>
    <?php if(empty($produtos)): ?>
        <tr><td colspan="7" style="text-align:center;padding:20px">Nenhum produto cadastrado</td></tr>
    <?php else: foreach($produtos as $p): ?>
        <tr>
          <td><?= $p['id'] ?></td>
          <td><?= htmlspecialchars($p['nome_produto']) ?></td>
          <td><?= htmlspecialchars($p['descricao']) ?></td>
          <td>R$<?= number_format($p['preco'],2,',','.') ?></td>
          <td><?= htmlspecialchars($p['fornecedor'] ?: '—') ?></td>
          <td>
            <?php if(!empty($p['imagem']) && file_exists(__DIR__ . '/../uploads/' . $p['imagem'])): ?>
              <img src="../uploads/<?= $p['imagem'] ?>" class="img-produto">
            <?php else: ?>
              —
            <?php endif; ?>
          </td>
          <td>
            <a href="edit_produto.php?id=<?= $p['id'] ?>" class="btn editar">Editar</a>
            <a href="delete_produto.php?id=<?= $p['id'] ?>" class="btn excluir">Excluir</a>
          </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>

  </table>

</div>

<section class="promocoes">
      <h2>Produtos Cadastrados:</h2>
      <div class="cards">

        <div class="card">
          <img src="../paginas/img/azul.png" alt="Produto 1">
          <h3>Alfajor sabor Doce de Leite - Cobertura de Chocolate ao Leite 55g</h3>
          <p class="preco">R$ 14,90</p>
          <p class="parcelas">Em até 2x R$ 7,45 sem juros</p>
        </div>

        <div class="card">
          <img src="../paginas/img/branco.png" alt="Produto 2">
          <h3>Alfajor sabor Doce de Leite - Cobertura de Chocolate ao Leite 55g</h3>
          <p class="preco">R$ 14,90</p>
          <p class="parcelas">Em até 2x R$ 7,45 sem juros</p>
        </div>

        <div class="card">
          <img src="../paginas/img/marrom.png" alt="Produto 3">
          <h3>Alfajor sabor Doce de Leite - Cobertura de Chocolate ao Leite 55g</h3>
          <p class="preco">R$ 14,90</p>
          <p class="parcelas">Em até 2x R$ 7,45 sem juros</p>
        </div>

      </div>


    </section>

    <img src="img/Captura de tela 2025-09-12 100130.png" alt="alfajor grande" class="alfajor">

</body>
</html>
