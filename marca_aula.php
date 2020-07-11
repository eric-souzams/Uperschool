<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: index.php?erro=1');
}

require_once('db.php');

$data_marcada = $_POST['data_marcada'];
$hora_marcada = $_POST['hora_marcada'];
$materia = $_POST['materia'];
$id_usuario = $_SESSION['id_usuario'];

if($data_marcada == '' || $hora_marcada == '' || $materia == ''){
    die();
}

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "INSERT INTO up_aulas_marcadas (id_usuario, materia, data_marcada, hora_marcada)VALUES($id_usuario, '$materia', '$data_marcada', '$hora_marcada')";

mysqli_query($link, $sql);
mysqli_close($link);
header('location: dashboard.php?marcado_sucesso=1&');
?>