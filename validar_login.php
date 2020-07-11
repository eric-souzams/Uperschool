<?php
    session_start();
    require_once('db.php');

    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT id, usuario, nivelpermissao FROM up_usuarios WHERE usuario='$usuario' AND senha='$senha'";

    $linkobjdb = new db();
    $link = $linkobjdb->conexaoMysql();

    $resultado_id = mysqli_query($link, $sql);
    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['usuario'])){

            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['nivel'] = $dados_usuario['nivelpermissao'];

            header('location: dashboard.php');
        } else{
            header('location: index.php?error_login=1');
        }
    } else{
        echo 'Error durante a consulta ao Banco de Dados. Por favor, contate o suporte.';
    }
    mysqli_close($link);
?>