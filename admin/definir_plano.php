<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: dashboard.php?erro_gerar_codigo=1');
}
$nivel_permissao = $_SESSION['nivel'];
if($nivel_permissao != '2'){
    header('location: index.php?erro_not_permited=2');
}

require_once('../db.php');

$id_usuario = $_POST['id_usuario'];
$id_plano = $_POST['id_plano'];
$validade_plano = $_POST['validade_plano'];

if($id_usuario == '' || $id_plano == '' || $validade_plano == ''){
    die();
}

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "DELETE FROM up_plano_usuario WHERE id_usuario = $id_usuario";
mysqli_query($link, $sql);

$sql = "INSERT INTO up_plano_usuario (id_usuario, id_plano, validade_plano) VALUES ('$id_usuario', '$id_plano', '$validade_plano')";
mysqli_query($link, $sql);

mysqli_close($link);
header('location: dashboard.php?cadastro_sucesso=1&');
?>