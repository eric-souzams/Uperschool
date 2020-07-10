<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UperSchool - Reforço Escolar</title>
    <script src="bs/js/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/css/style.css">
    <script>
        $(document).ready(function(){

            /*function dadosPlano(){
                //carregar aulas marcadas
                $.ajax({
                    url: 'get_planos.php',
                    success: function(data){
                        $('#plano').html(data);
                    }
                });
            }

            dadosPlano();*/

        });
    </script>
</head>
<body>
    <!-- Barra do menu -->
    <nav class="navbar navbar-default navbar-fixed-top corbarra">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fonte1" href="#top">UperSchool</a>
                <!-- LOGO DO SITE <img src="imagens/logo.png" /> -->
            </div>
              
            <div id="navbar" class="navbar-collapse collapse fonte1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#servicos">Serviços</a></li>
                    <li><a href="#planos">Planos</a></li>
                    <li><a href="#contato">Contato</a></li>
                    <li><a href="sejaprofessor.php">Seja um professor</a></li>
                    <li><a href="primeiroacesso.php">Primeiro Acesso</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="#">Criar Conta</a></li>-->
                    <li>
                        <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Painel do Aluno</a>
                            <ul class="dropdown-menu" aria-labelledby="entrar">
                                <div class="col-md-12">
                                    <p>Login do Aluno</h3>
                                    <br/>
                                        <form method="POST" action="validar_login.php" id="formLogin">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuario" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="campo_senha" name="senha" placeholder="Senha" required>
                                            </div>
                                            
                                            <button type="buttom" class="btn btn-default" id="btn_login">Entrar</button>
            
                                            <br/><br/>
                                        </form>
                                </div>
                            </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Fim menu de navegação-->
    <header>
        <div class="container"> <!--container 1-->
            <div class="row"> <!--row-->
                <div class="col-md-12">
                    <h1 id="titulo_p1">Nós da UperSchool possuímos os melhores professores para lhe ajudar</h1>
                </div>
            </div><!--/row-->

            <div class="row"><!--row-->
                <div class="col-md-12 selecionar_materia">
                    <div class="col-md-1"></div>
                    <form method="POST" action="index.php" id="form_selecionar_materia" class="form-inline">
                        <div class="col-md-8" id="selecionar_materia">
                        <select name="estado" id="estadoselect" class="form-control borderclear">
                            <option value="null">Selecione o Estado</option>
                            <option value="Brasilia">Brasília</option>
                            <option value="Sao Paulo">São Paulo</option>
                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                            <option value="Goias">Goiás</option>
                        </select>
                        <select name="cidade" id="cidadeselect" class="form-control borderclear">
                            <option value="null">Selecione a Cidade</option>
                            <option value="Taguatinga">Taguatinga</option>
                            <option value="Ceilandia">Ceilandia</option>
                            <option value="Samambaia">Samambaia</option>
                            <option value="Riacho Fundo">Riacho Fundo</option>
                        </select>
                        
                        <select name="materia" id="materiaselect" class="form-control borderclear">
                            <option value="null">Seleciona a Materia</option>
                            <option value="Geografia">Geografia</option>
                            <option value="Fisica 1">Física 1</option>
                            <option value="Fisica 2">Fisica 2</option>
                            <option value="Historia">Hístoria</option>
                            <option value="Literatura">Literatura</option>
                            <option value="Matematica 1">Matematica 1</option>
                            <option value="Matematica 2">Matematica 2</option>
                            <option value="Portugues">Portugues</option>
                            <option value="Ciencias">Ciencias</option>
                            <option value="Ingles">Inglês</option>
                            <option value="Quimica 1">Quimica 1</option>
                            <option value="Quimica 2">Quimica 2</option>
                            <option value="Biologia 1">Biologia 1</option>
                            <option value="Biologia 2">Biologia 2</option>
                        </select>
                        </div>
                        <div class="col-md-3 alinhamento_btn">
                        <button type="submit" class="btn_buscar">Buscar Professores</button>
                        </div>
                    </form>
                </div>
            </div> <!--/row-->
            <div class="row">
            <div id="area_busca">
                    <?php
                        $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
                        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
                        $materia = isset($_POST['materia']) ? $_POST['materia'] : null;

                        $linkobjdb = new db();
                        $link = $linkobjdb->conexaoMysql();

                        $sql = "SELECT *, DATE_FORMAT(professor_desde, '%d %M %Y') AS professor_desde FROM up_lista_professores WHERE estado = '$estado' AND cidade = '$cidade' AND materia = '$materia'";

                        $resultado_busca = mysqli_query($link, $sql);

                        if($resultado_busca){

                            while($resultado = mysqli_fetch_array($resultado_busca, MYSQLI_ASSOC)){
                                echo '<br>';
                                echo '<div class="list-group-item">';
                                    echo '<strong>'.$resultado['nome_professor'].'</strong>';
                                    echo '<h5 class="list-group-item-text pull-right">Professor desde: '.$resultado['professor_desde'].'</h5>';
                                    echo '<h5 class="list-group-item-text"> Matéria Selecionada: '.$resultado['materia'].'</h5>';
                                    echo '<h5 class="list-group-item-text"> Outras matérias aplicada por esta professor: '.$resultado['materia_aplicaveis'].'<h5>';
                                    echo '<h5 class="list-group-item-text"> Estado Selecionado: '.$resultado['estado'].'</h5>';
                                    echo '<h5 class="list-group-item-text"> Cidade Selecionada: '.$resultado['cidade'].'</h5>';
                                    echo '<div class="clearfix"></div>';
                                echo '</div>';
                            }
                            
                        } else{
                            echo 'Erro durante a busca por professores.';
                        }
                        mysqli_close($link);
                        ?>
                    </div>

            </div>

            <div class="row sessao1">

            </div>
        </div>  <!--fim container 1-->
    </header> <!--fim header-->

    <!-- Serviços -->
    <section id="servicos">
        <div class="container"> <!-- container -->
            <div class="row"> <!-- row -->

                <div class="servicos-h2">
                    <h2>Serviços</h2>
                    <h3>Saiba um pouco do que temos a oferecer.</h3>
                </div>

                <div class="col-md-12">
                    <div class="row servicos"> <!-- row-->

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="circulo-servicos">
                                <!-- icon aqui <img src="#" class="img-responsive img-tamanho">-->
                            </div>
                            <div class="servico-1">
                                <h3>Lorem Ipsum</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed eget cursus eros, vitae lobortis dolor. 
                                </h4>
                            </div>
                        </div>

                    </div> <!-- /row-->
                </div>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /Serviços -->

    <hr>
    
    <section id="como_funciona">
        <div class="container">
            <div class="row">
                <div class="titulo-como_funciona">
                    <h2>Como Funciona</h2>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </section>

    <hr>

    <section id="planos"> <!-- Planos -->
        <div class="container"> <!-- Container -->
            <div class="row"> <!-- Row -->

                <div class="titulo-planos">
                    <h2>Planos</h2>
                    <h3>Selecione o plano mais adequado a você.</h3>
                </div>

                <div class="col-md-12">
                    <div class="row" id="plano"> <!-- Row -->

                    <?php
                        $linkobjdb = new db();
                        $link = $linkobjdb->conexaoMysql();

                        $sql = "SELECT * FROM up_lista_planos";

                        $resultado_id = mysqli_query($link, $sql);

                        if($resultado_id){

                            while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
                                    echo '<div class="col-md-4 col-sm-6 col-xs-12 espacos list-group-item"><div><img src="img/fundo.png" class="img-responsive"></div><div class="port-1" id="plano_1"><h4>';
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

                        
                        <!--
                        <div class="col-md-4 col-sm-6 espacos">
                            <div>
                                <img src="img/fundo.png" class="img-responsive">
                            </div>
                            <div class="port-1" id="plano">
                                <h4>Plano nº 1</h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 espacos"><div><img src="img/fundo.png" class="img-responsive"></div><div class="port-1" id="plano_1"><h4>Plano nº 1</h4></div></div>

                        -->

                       
                        
                    </div> <!-- /Row -->
                </div>

            </div> <!-- /Row -->
        </div> <!-- /Container -->
    </section> <!-- /Planos -->

    <section id="contato"> <!-- Contato -->
        <div class="container"> <!-- Container -->
            <div class="row"> <!-- Row -->

                <div class="titulo-contato">
                    <h2>Contato</h2>
                    <h3>Entre em contato conosco e faça o seu orçamento ou tire suas duvidas!</h3>
                </div>

            <div class="col-lg-12">

                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" placeholder="SEU NOME *" required>
                        </div>
 
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="SEU E-MAIL *" required>
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control" id="telefone" placeholder="SEU TELEFONE *" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" id="mensagem" placeholder="SUA MENSSAGEM *" required></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="submit-contato">
                            <button type="submit" class="btn btn-contato btn-lg">Enviar Menssagem</button>
                        </div>
                    </div>
                </form>

            </div>

            </div> <!-- /Row -->
        </div> <!-- /Container -->
    </section> <!-- /Contato -->
    
    <!-- Rodapé -->
    <footer id="rodape">
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
                                        <a href="#">Política de privacidade</a>
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