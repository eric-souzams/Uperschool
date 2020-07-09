<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UperSchool - Reforço Escolar - Primeiro Acesso</title>
    <script src="bs/js/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/css/style.css">
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
                <a class="navbar-brand fonte1" href="index.php">UperSchool</a>
                <!-- LOGO DO SITE <img src="imagens/logo.png" /> -->
            </div>
              
            <div id="navbar" class="navbar-collapse collapse fonte1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Painel do Aluno</a>
                            <ul class="dropdown-menu" aria-labelledby="entrar">
                                <div class="col-md-12">
                                    <p>Login do Aluno</h3>
                                    <br/>
                                        <form method="POST" action="validar_login.php" id="formLogin">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="campo_usuario" name="campo_usuario" placeholder="Usuario" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="campo_senha" name="campo_senha" placeholder="Senha" required>
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
    </nav> <!--Fim menu de navegação-->
    
    <header> <!--header-->
        <div class="container"> <!--container-->
            <div class="row"> <!--row-->
                <div class="col-md-12">
                    <h1 id="titulo_s1">Meu Primeiro Acesso</h1>
                </div>
            </div><!--/row-->

            <div class="row"><!--row-->
                <div class="col-md-12">

                </div>
            </div> <!--/row-->

        </div>  <!--fim container-->
    </header> <!--fim header-->
        
    <section id="area_input_codigo">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
            
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="validar_codigo.php" id="form_codigo" class="input-group">
                                <input type="text" name="codigo_acesso" id="area_codigo" class="form-control" placeholder="Digite aqui o seu codigo de registro" maxlength="20" required>
                                <span class="input-group-btn">
                                <button class="btn btn-default" id="btn_codigo" type="submit">Prosseguir</button>
                                </span>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    

    
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