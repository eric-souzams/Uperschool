<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: index.php?erro_login=1');
    }
    require_once('db.php');

    $linkobjdb = new db();
    $link = $linkobjdb->conexaoMysql();

    $id_usuario = $_SESSION['id_usuario'];
    $usuario = $_SESSION['usuario'];

    //puxar nome dp usuario
    $sql = "SELECT nome AS nomeusuario FROM up_usuarios WHERE id = $id_usuario";
    $resultado_id = mysqli_query($link, $sql);
    if($resultado_id){
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
        $nomeusuario = $registro['nomeusuario'];
    } else{
        echo 'Error ao tentar executar a query.';
    }
    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UperSchool - DashBoard</title>
    <script src="bs/js/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/css/style.css">
    <script>
    $(document).ready(function(){

        function historicoAulas(){
            //carregar aulas marcadas
            $.ajax({
                url: 'get_historico_aulas.php',
                success: function(data){
                    $('#info_historico').html(data);
                }
            });
        }

        historicoAulas();

    });
    </script>
</head>
<body>
    <!-- Barra do menu -->
    <nav class="navbar navbar-default navbar-static-top corbarra">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fonte1" href="dashboard.php">UperSchool</a>
                <!-- LOGO DO SITE <img src="imagens/logo.png" /> -->
            </div>
              
            <div id="navbar" class="navbar-collapse collapse fonte1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="historico.php">Histórico de Aulas</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Fazer Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Fim menu de navegação-->
    <header>
        <div class="container"> <!--container 1-->
            <div class="row"> <!--row-->
                <div class="col-md-12">
                    <h1 id="titulo_d1">Bem Vindo, <?= $nomeusuario ?></h1>
                </div>
            </div><!--/row-->
        </div>  <!--fim container 1-->
    </header> <!--fim header-->

    <section id="meus_cursos" class="espaco">
        <div class="container">
            <div class="row" id="info_historico">
                
            </div>
        </div>
    </section>

    
    <!-- Rodapé -->
    <footer id="rodape">
        <hr>
            <div class="container"> <!-- Container -->
                <div class="row"> <!-- Row -->
                    <div class="col-lg-12">
                        <div class="row">                        
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="nav navbar-left rodape-h3">
                                    <li>
                                        <h3>Copyright &copy; <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>  UperSchool</h3>
                                    </li>
                                </ul>
                                <ul class="nav navbar-right rodape-h3">
                                    <li>
                                        <h3>CNPJ: 000.000.000.000</h3>
                                    </li>
                                </ul>
                            </div>
                            <!-- //caso precisa de outros listas no rodapé
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="rodape-h3-2">
                                    <h3>
                                        <a href="#">nome aqui</a>
                                    </h3>
                                </div>
                            </div>
                            -->    
                        </div>
                    </div>
    
                </div> <!-- Row -->
            </div> <!-- /Container -->
        </footer> <!-- /Rodapé -->

    <script src="bs/js/bootstrap.min.js"></script>
</body>
</html>