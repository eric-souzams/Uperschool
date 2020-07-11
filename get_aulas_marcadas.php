<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location: index.php?error=1&');
}

require_once('db.php');

$id_usuario = $_SESSION['id_usuario'];

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "SELECT DATE_FORMAT(data_marcada, '%d %M %Y') AS data_marcada_formatada, DATE_FORMAT(data_inclusao, '%d %M %Y') AS data_inclusao_formatada, hora_marcada, materia FROM up_aulas_marcadas WHERE id_usuario = $id_usuario ORDER BY data_inclusao DESC LIMIT 0,5";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        echo '<div class="list-group-item">';
            //echo '<h4 class="list-group-item-heading"> Sua aula foi marcada:'.$registro['data_inclusao_formatada'].'</h4>';
            echo '<p class="list-group-item-text"> Marcado para o dia: '.$registro['data_marcada_formatada'].'</p>';
            echo '<p class="list-group-item-text"> Aula marcada para as: '.$registro['hora_marcada'].'</p>';
            echo '<p class="list-group-item-text"> Matéria a ser aplicada: '.$registro['materia'].'</p>';
        echo '</div>';
    }

} else{
    echo 'Erro ao tentar consultar aulas marcadas';
}
mysqli_close($link);
?>