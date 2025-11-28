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
    <form action="../php/delete_fornecedor.php" method="post" style="display:inline" onsubmit="return confirm('Deletar?')">
      <input type="hidden" name="id" value="<?= $f['id'] ?>">
      <button class="action-btn delete" type="submit">Excluir</button>
    </form>
  </td>
</tr>
      <?php endforeach; endif; ?>

    </tbody>
  </table>
</div>


<style>
 

body {
    
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    background: url(../paginas/img/FUNDO.png) no-repeat center top/cover;
    background-color: rgba(107, 3, 3, 0.83);
}

/*---------------- BOTÃO VOLTAR ----------------*/
.top-voltar {
    padding: 2px;
}
.voltar-btn {
 margin-left: -300px;
    font-size: 18px;
    cursor: pointer;
    display: inline-flex;
    justify-content: flex-start;
    width: 20%;
    margin-bottom: 10px;
    z-index: 9;
    color: #f8d7a4;
    text-decoration: none;
}

/*---------------- CARD PRINCIPAL ----------------*/
.card-maior {
    width: 95%;
    margin: 10px auto;
    background: rgba(107, 3, 3, 0.83);
    padding: 15px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.4);
    text-align: center;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* LOGO */
.logo-area {
    margin-bottom: 10px;
    text-align: center;
    margin-right: 00px;
}
.logo {
    width: 100px;
}

/* Título */
.titulo {
    font-size: 20px;
    margin-bottom: 15px;
    color: #f1c16d;
}

/*---------------- FORMULÁRIO ----------------*/
.form-card {
    background: rgba(107, 3, 3, 0.83);
    padding: 1px;
    border-radius: 1px;
    text-align: left;
    width: 40%;
}

.form-card label {
    color: #f1c16d;
    font-weight: bold;
}
.form-card input,
.form-card textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 0;
    margin: 6px 0;
}

/*---------------- BOTÃO ----------------*/
.btn {
    padding: 0.9em 2em;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 500;
    color: #000;
    background-color: #a30707ff;
    border: none;
    border-radius: 40px;
    box-shadow: 0px 6px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    cursor: pointer;
    display: block;
    margin: 15px auto 0 auto;
}
.btn:hover {
    background-color: #f1c16d;
    box-shadow: 0px 10px 15px rgba(253,221,36,0.65);
    color: #fff;
    transform: translateY(-4px);
}
.btn:active {
    transform: translateY(-1px);
}

/*---------------- TABELA ----------------*/
.tabela-container {
    width: 85%;
    margin: 20px auto;
    background: rgba(255,255,255,0.1);
    padding: 10px;
    border-radius: 15px;
}
.titulo-tabela {
    text-align: center;
    color: #ffdf86;
    padding: 8px;
    border-radius: 6px;
    font-size: 18px;
    margin-bottom: 15px;
}
.table {
    width: 100%;
    margin-top: 10px;
    border-collapse: collapse;
}
.table th {
    background: #e4c48a;
    color: #8b4f2f;
    padding: 8px;
}
.table td {
    background: rgba(107, 3, 3, 0.83);
    color: #fff;
    padding: 8px;
    border-bottom: 1px solid rgba(255,246,246,0.8);
}

/* Botão excluir */
.action-btn {
    padding: 4px 8px;
    border-radius: 6px;
    color: #fff;
}
.delete {
    background: #dc3545;
}
 
/*--------RESPONSIVIDADE----------*/
@media (max-width: 768px) {
    .table, .table thead, .table tbody, .table th, .table td, .table tr {
        display: block;
    }

    .table thead {
        display: none; /*--oculta cabeçalho--*/
    }

    .table tr {
        margin-bottom: 15px;
        background: rgba(107,3,3,0.83);
        padding: 5px;
        border-radius: 12px;
    }

    .table td {
        text-align: right;
        padding-left: 60%;
        position: relative;
    }

    .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        padding-left: 10px;
        font-weight: bold;
        color: #f1c16d;
        text-align: left;
    }

    .action-btn {
        width: 100%;
        margin-top: 5px;
    }
}

/*----------- MAIOR QUE 768px -----------*/
@media (min-width: 768px) {
    .card-maior {
        width: 70%;
        padding: 25px;
    }
    .logo {
        width: 150px;
        
    }
    .titulo, .titulo-tabela {
        font-size: 28px;
    }
    .btn {
        padding: 1.2em 3em;
        font-size: 14px;
    }
    .table th, .table td {
        padding: 12px;
    }
    .voltar-btn {
        font-size: 22px;
        width: 12%;
    }
}

/*---------- LARGE DESKTOP -------------*/
@media (min-width: 1025px) {
    .titulo, .titulo-tabela {
        font-size: 32px;
    }
    .voltar-btn {
        font-size: 25px;
        width: 9%;
    }
}

</style>
</body>
</html>