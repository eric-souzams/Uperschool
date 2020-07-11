<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: index.php?error=1&');
}

require_once('db.php');

$id_usuario = $_SESSION['id_usuario'];

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "SELECT uplp.*, uppu.*, DATE_FORMAT(uppu.validade_plano, '%d %M %Y') AS validade_plano FROM up_lista_planos AS uplp LEFT JOIN up_plano_usuario AS uppu ON(uppu.id_usuario = $id_usuario AND uplp.id = uppu.id_plano) WHERE id_usuario = $id_usuario";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        echo '<div class="list-group-item">';
            //echo '<h4 class="list-group-item-heading"> Sua aula foi marcada:'.$registro['data_inclusao_formatada'].'</h4>';
            echo '<p class="list-group-item-text"><h3> Plano: '.$registro['nome_plano'].'</h3><br></p>';
            echo '<p class="list-group-item-text"><h4> Descrição: <br>'.$registro['descricao'].'<h4></p>';
            echo '<p class="list-group-item-text"><h4> Vantagens: <br>'.$registro['vantagens'].'<h4></p>';
            echo '<p class="list-group-item-text"><h4> Tipo de plano: '.$registro['tipo_plano'].'<h4></p>';
            echo '<p class="list-group-item-text"><h4> Validade até: '.$registro['validade_plano'].'<h4></p>';
        echo '</div>';
    }

} else{
    echo 'Erro ao tentar consultar seu plano';
}
mysqli_close($link);
?>