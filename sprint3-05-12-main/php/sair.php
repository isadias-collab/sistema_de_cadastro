<?php
// File: meusite/php/sair.php
session_start();
session_unset();
session_destroy();
header('Location: ../paginas/inicio.php');
exit;
