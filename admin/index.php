<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UperSchool - Reforço Escolar</title>
    <script src="../bs/js/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bs/css/style.css">
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
                <a class="navbar-brand fonte1" href="../index.php">UperSchool</a>
                <!-- LOGO DO SITE <img src="imagens/logo.png" /> -->
            </div>
              
            <div id="navbar" class="navbar-collapse collapse fonte1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="../index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a role="button">Painel do Administrador</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> <!--Fim menu de navegação-->
    
    <header>
        <div class="container"> <!--container 1-->
            <div class="row"> <!--row-->
                <div class="col-md-12">
                    <h1 id="titulo_s1">Painel de Admin</h1>
                </div>
            </div><!--/row-->

            <section id="area_input_admin">
            <div class="row"><!--row-->
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-body">
                        <form method="POST" action="validar_admin.php" id="formAdmin">
                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-group-justified">Fazer Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div> <!--/row-->
            </section>

        </div>  <!--fim container 1-->
    </header> <!--fim header-->

    
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

    <script src="../bs/js/bootstrap.min.js"></script>
</body>
</html>