<?php
session_start();
if(!isset($_SESSION['codigo_acesso'])){
    header('location: index.php?erro_codigo=1');
}
require_once('db.php');

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$codigo_acesso = $_SESSION['codigo_acesso'];

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$existe_usuario = false;

//check if user already exist into data base
$sql = "SELECT * from up_usuarios WHERE usuario='$usuario'";
if($resultado_id = mysqli_query($link, $sql)){
    
    $dados_usuario = mysqli_fetch_array($resultado_id);

    if(isset($dados_usuario['usuario'])){
        $existe_usuario = true;
    } else {
        echo 'Error ao tentar localizar o registro de usuario';
    }
}

//show in url that user exist 
if($existe_usuario){
    $retorno_no_get = '';
    if($existe_usuario){
        $retorno_no_get.="erro_usuario=1&";
    }
    header('location: criarconta.php?'.$retorno_no_get);
    die();
}

$sql = "INSERT INTO up_usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";

//execute the query
if(mysqli_query($link, $sql)){
            
        $sql2 = "DELETE FROM up_codigos_usuarios WHERE codigo_acesso = '$codigo_acesso' ";

        if(mysqli_query($link, $sql2)){
            header('location: index.php?sucesso=2&');
        } else{
            header('location: criarconta.php?error_ao_criar_conta=2&');
        }


    header('location: index.php?sucesso=1&');
} else{
    header('location: criarconta.php?error_ao_criar_conta=1&');
}
unset($_SESSION['codigo_acesso']);
mysqli_close($link);
?>