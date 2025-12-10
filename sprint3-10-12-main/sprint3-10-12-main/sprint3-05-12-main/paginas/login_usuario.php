<?php
session_start();
$msg = $_SESSION['msg'] ?? '';
unset($_SESSION['msg']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <div class="center">
    <div class="box">

    <a class="voltar" href="../paginas/inicio.php">
    <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="logo">
        <img src="../paginas/img/logo.png" alt="Logo">
  </div>

      <h2>Entrar</h2>

      <?php if($msg): ?>
        <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
      <?php endif; ?>

      <form action="../php/fazer_login.php" method="post">
        
        <label>Usuário</label>
        <input name="usuario" required placeholder="Digite aqui..">

        <label>Senha</label>
        <input name="senha" type="password" required placeholder="Digite aqui..">

        <button class="btn" type="submit">Entrar</button>

      </form>


  </div>

  <div class="barra">
    <img src="../paginas/img/barrabranca.png" alt="barra branca">
  </div>

  <div class="bengala">
    <img src="../paginas/img/bengala.png" alt="bengala">
  </div>

    <div class="bengala2">
    <img src="../paginas/img/bengala.png" alt="bengala2">
  </div>

  <div class="bola1">
    <img src="../paginas/img/bola1.png" alt="bola1">
  </div>

  <div class="bola2">
    <img src="../paginas/img/bola2.png" alt="bola2">
  </div>

  <div class="presente">
    <img src="../paginas/img/presente.png" alt="presente">
  </div>

</body>
</html>
