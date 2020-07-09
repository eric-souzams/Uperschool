<?php

    class db{
        //host
        private $host = 'localhost';
        //usuario host
        private $usuario = 'root';
        //senha host
        private $senha = '';
        //banco de dados
        private $database = 'uperschool';

        public function conexaoMysql(){
            //conexão
            $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
            //set utf-8
            mysqli_set_charset($conexao, 'utf8');
    
            //verificando existencia de erros
            if(mysqli_connect_errno()){
                echo 'Error ao tentar conectar ao Banco de Dados: '.mysqli_connect_error();
            }
            return $conexao;
        }
    }

?>