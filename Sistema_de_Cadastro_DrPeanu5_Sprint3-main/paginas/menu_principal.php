<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login_usuario.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>

<div class="container">

    

 
    <h1>Sistema de Cadastro</h1>
    <p>Clique nas pastas de amendoim para escolher o destino desejado.</p>

        <div class="logo-container">
        <img src="../paginas/img/logo.png" class="logo-canto">
        </div>

    <!-- LISTA DE OPÇÕES -->
    <ul>

        <li>
            <a href="fornecedores_page.php" style="text-decoration:none; color:black;">
                <img src="../paginas/img/poteazul.png" alt="">
                <h3>Cadastro de Fornecedor</h3>
            </a>
        </li>

        <li>
            <a href="produtos_page.php" style="text-decoration:none; color:black;">
                <img src="../paginas/img/poteamarelo.png" alt="">
                <h3>Cadastro de Produtos</h3>
            </a>
        </li>

        <li>
            <a href="lista_produtos.php" style="text-decoration:none; color:black;">
                <img src="../paginas/img/poteroxo.png" alt="">
                <h3>Listagem de Produtos</h3>
            </a>
        </li>

    </ul>


    <!-- Botão sair -->
<a href="../paginas/inicio.php">
    <button>Sair</button>
</a>


    <!-- Imagem decorativa lateral (mãozinha) -->
    <img src="../paginas/img/maozinha.png" class="barra">

</div>


</body>
</html>
