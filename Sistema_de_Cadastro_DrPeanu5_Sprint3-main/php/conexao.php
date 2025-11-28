<?php

$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = 'Senai@118';
$DB_NAME = 'sistema_cadastro';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$con) {
    die("Erro DB: " . mysqli_connect_error());
}
// definir charset
mysqli_set_charset($con, "utf8mb4");
