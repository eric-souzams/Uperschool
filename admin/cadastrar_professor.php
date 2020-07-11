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

$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$materia = $_POST['materia'];
$nome_professor = $_POST['nome_professor'];
$materia_aplicaveis = $_POST['materia_aplicaveis'];

if($estado== '' || $cidade == '' || $materia == '' || $nome_professor == '' || $materia_aplicaveis == ''){
    die();
}

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "INSERT INTO up_lista_professores (estado, cidade, materia, nome_professor, materia_aplicaveis) VALUES ('$estado', '$cidade', '$materia', '$nome_professor', '$materia_aplicaveis')";

mysqli_query($link, $sql);
mysqli_close($link);
header('location: dashboard.php?cadastro_sucesso=1&');
?>