<?php

session_start();
if(!isset($_SESSION['codigo_acesso'])){
    header('location: index.php?erro_codigo=1');
}

require_once('db.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UperSchool - Criar Conta</title>
    <script src="bs/js/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/css/style.css">
    <style>
        body{
            background-color: rgb(72, 72, 224);
        }
    </style>
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
    <header id="criar_conta">
        <div class="container"> <!--container 1-->
            <div class="row"> <!--row-->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 id="titulo_c1">Cadastro de Usuário</h1>
                </div>
                <div class="col-md-3"></div>
            </div><!--/row-->

            <div class="row"><!--row-->
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-body">
                        <form method="POST" action="registra_usuario.php" id="formCadastro">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-group-justified">Fazer Cadastro</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div> <!--/row-->

        </div>  <!--fim container 1-->
    </header> <!--fim header-->

    <script src="bs/js/bootstrap.min.js"></script>
</body>
</html>