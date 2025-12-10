<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Dr. Peanut - Início</title>
  <link rel="stylesheet" href="../css/inicio.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Faixa superior PIX -->
<div class="top-pix">
  Pague com PIX e ganhe 3% OFF
</div>


  <!-- Cabeçalho -->
  <div class="header">
    <div class="logo"><img src="../paginas/img/logo.png" alt="logo"></div>
    <div class="search">
      <input type="text" placeholder="O que você está procurando?" />
    </div>
    <div class="links">
      <a href="cadastro_usuario.php" style="color:#fff;text-decoration:none;margin-right:12px">Cadastre-se</a>
      <a href="login_usuario.php" style="color:#fff;text-decoration:none">Login</a>
    </div>
  </div>



<!-- Menu principal (igual ao site) -->
<nav class="main-menu">
  <ul>
    <li><a href="#">PASTAS DE AMENDOIM</a></li>
    <li class="dropdown">
      <a href="#">SNACKS</a>
    </li>
    <li><a href="#">WHEY PROTEIN</a></li>
    <li><a href="#">COMBOS</a></li>
    <li><a href="#">PROMOÇÕES</a></li>
  </ul>
</nav>


  <!-- Container do Produto -->
  <div class="container">
    <div class="card">
    <img src="../paginas/img/bannerverde.jpg" alt="banner">
    </div>
  </div>

<footer class="footer">
    <div class="footer-container">

        <div class="footer-section">
            <img src="../paginas/img/logo.png" class="footer-logo" alt="Dr. Peanut">
            <p>Os melhores produtos de amendoim, feitos para você dar o melhor de si!</p>
        </div>

        <div class="footer-section">
            <h3>Links rápidos</h3>
            <ul>
                <li><a href="inicio.php">Início</a></li>
                <li><a href="cadastro_usuario.php">Cadastre-se</a></li>
                <li><a href="login_usuario.php">Login</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Contato</h3>
            <p>Email: atendimento@drpeanut.com</p>
            <p>Telefone: (11) 99999-9999</p>
            <p>Endereço: Av. Energia, 2024 - Brasil</p>
        </div>

        <div class="footer-section">
            <h3>Siga-nos</h3>
            <div class="social-links">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Dr. Peanut. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
