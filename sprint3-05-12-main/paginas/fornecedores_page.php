<?php
session_start();
require __DIR__ . '/../php/conexao.php';
if (!isset($_SESSION['user_id'])) { header('Location: login_usuario.php'); exit; }

$stmt = mysqli_prepare($con, "SELECT id, nome, cnpj, endereco, telefone, email, observacoes FROM fornecedores ORDER BY id ASC");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $nome, $cnpj, $endereco, $telefone, $email, $observacoes);

$fornecedores = [];
while (mysqli_stmt_fetch($stmt)) {
    $fornecedores[] = [
        'id'=>$id,
        'nome'=>$nome,
        'cnpj'=>$cnpj,
        'endereco'=>$endereco,
        'telefone'=>$telefone,
        'email'=>$email,
        'observacoes'=>$observacoes
    ];
}
mysqli_stmt_close($stmt);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro de Fornecedores</title>
  <link rel="stylesheet" href="../css/fornecedores.css">
</head>
<body>



<div class="card-maior">

  <div class="top-voltar">
  <a href="menu_principal.php" class="voltar-btn">❮</a>
  </div>
  
  <div class="logo-area">
    <img src="../paginas/img/logo.png" alt="logo" class="logo">
  </div>

  <h2 class="titulo">Cadastro de Fornecedor</h2>

  <div class="form-card">



    <form action="../php/salvar_fornecedor.php" method="post">
      
      <label>Nome:</label>
      <input name="nome" placeholder="Digite aqui.." required>

      <label>CNPJ:</label>
      <input name="cnpj" placeholder="Digite aqui..">

      <label>Endereço</label>
      <input name="endereco" placeholder="Digite aqui..">

      <label>Telefone:</label>
      <input name="telefone" placeholder="Digite aqui..">

      <label>E-mail:</label>
      <input name="email" placeholder="Digite aqui..">

      <label>Observações:</label>
      <textarea name="observacoes" placeholder="Digite aqui.."></textarea>

      <button class="btn" type="submit">Cadastrar</button>
    </form>
  </div>

</div>

<div class="tabela-container">
  <h3 class="titulo-tabela">Listagem de Fornecedores</h3>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th><th>Nome</th><th>CNPJ</th><th>Endereço</th><th>Telefone</th><th>E-mail</th><th>Ações</th>
      </tr>
    </thead>
    <tbody>

      <?php if(empty($fornecedores)): ?>
        <tr><td colspan="7">Nenhum fornecedor cadastrado</td></tr>
      <?php else: foreach($fornecedores as $f): ?>
       <tr>
  <td data-label="ID"><?= $f['id'] ?></td>
  <td data-label="Nome"><?= htmlspecialchars($f['nome']) ?></td>
  <td data-label="CNPJ"><?= htmlspecialchars($f['cnpj']) ?></td>
  <td data-label="Endereço"><?= htmlspecialchars($f['endereco']) ?></td>
  <td data-label="Telefone"><?= htmlspecialchars($f['telefone']) ?></td>
  <td data-label="E-mail"><?= htmlspecialchars($f['email']) ?></td>
  <td data-label="Ações">
  
  <a class="action-btn edit" href="edit_fornecedor.php?id=<?= $f['id'] ?>">Editar</a>

  <form action="../php/delete_fornecedor.php" method="post" style="display:inline" onsubmit="return confirm('Deletar?')">
    <input type="hidden" name="id" value="<?= $f['id'] ?>">
    <button class="action-btn delete" type="submit">Excluir</button>
  </form>
</td>

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