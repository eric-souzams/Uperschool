<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: index.php?error=1&');
}

require_once('db.php');

$id_usuario = $_SESSION['id_usuario'];

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "SELECT DATE_FORMAT(data_marcada, '%d %M %Y') AS data_marcada_formatada, DATE_FORMAT(data_inclusao, '%d %m %Y') AS data_inclusao_formatada, hora_marcada, materia FROM up_aulas_marcadas WHERE id_usuario = $id_usuario ORDER BY data_inclusao DESC";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        echo '<div class="col-md-4 col-sm-6" id="area_historico"><div class="panel panel-default"><div class="panel-body">';
            echo '<h3>Aula marcada dia: '.$registro['data_inclusao_formatada'].'</h3>';
            echo '<br>';
            echo '<p class="list-group-item-text"> Marcado para o dia: '.$registro['data_marcada_formatada'].'</p>';
            echo '<p class="list-group-item-text"> Aula marcada para as: '.$registro['hora_marcada'].'</p>';
            echo '<p class="list-group-item-text"> Matéria a ser aplicada: '.$registro['materia'].'</p>';
        echo '</div></div></div>';
    }

} else{
    echo 'Erro ao tentar consultar aulas marcadas';
}

?>