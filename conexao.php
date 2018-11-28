<?php

$servidor = "localhost  ";
$usuario = "root";
$senha = "";
$dbname = "cesecbd";

//Criar a conexao
$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
/*if ($con != null) {
  echo "Conexão ok";
} else {
    echo "falha na conexão";
}*/