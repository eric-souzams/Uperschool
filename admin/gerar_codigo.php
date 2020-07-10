<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: dashboard.php?erro_gerar_codigo=1');
}

require_once('../db.php');

$codigo_acesso = mt_rand(100000000000,999999999999);
$nivel_permissao = $_SESSION['nivel'];

if($nivel_permissao == '' || $nivel_permissao != '2'){
    die();
}

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "INSERT INTO up_codigos_usuarios (codigo_acesso) VALUES ($codigo_acesso)";

mysqli_query($link, $sql);
mysqli_close($link);
header('location: dashboard.php?gerado_sucesso=1&');
?>