<?php
require_once('db.php');

$linkobjdb = new db();
$link = $linkobjdb->conexaoMysql();

$sql = "SELECT * FROM up_lista_planos";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<div class="col-md-4 col-sm-6 espacos list-group-item"><div><img src="img/fundo.png" class="img-responsive"></div><div class="port-1" id="plano_1"><h4>';
            echo '<p class="list-group-item-text"><h3> Plano: '.$registro['nome_plano'].'</h3><br></p>';
            echo '<p class="list-group-item-text"><h4> Descrição: <br>'.$registro['descricao'].'<h4></p>';
            echo '<p class="list-group-item-text"><h4> Vantagens: <br>'.$registro['vantagens'].'<h4></p>';
            echo '<p class="list-group-item-text"><h4> Tipo de plano: '.$registro['tipo_plano'].'<h4></p>';
            echo '</h4></div></div>';
    }

} else{
    echo 'Erro ao tentar consultar lista de planos disponiveis';
}
mysqli_close($link);
?>