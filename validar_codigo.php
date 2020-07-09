<?php
    session_start();
    require_once('db.php');

    $codigo_acesso = $_POST['codigo_acesso'];

    $sql = "SELECT codigo_acesso FROM up_codigos_usuarios WHERE codigo_acesso='$codigo_acesso'";

    $linkobjdb = new db();
    $link = $linkobjdb->conexaoMysql();

    $resultado_id = mysqli_query($link, $sql);
    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['codigo_acesso'])){

            $_SESSION['codigo_acesso'] = $dados_usuario['codigo_acesso'];

            header('location: criarconta.php');
        } else{
            header('location: primeiroacesso.php?error_codigo=1');
        }
    } else{
        echo 'Error durante a consulta ao Banco de Dados. Por favor, contate o suporte.';
    }
?>