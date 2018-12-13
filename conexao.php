<?php

$servidor = "cesecbd.mysql.dbaas.com.br";
$usuario = "cesecbd";
$senha = "Cesec2018";
$dbname = "cesecbd";

//Criar a conexao
$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
/*if ($con != null) {
  echo "Conexão ok";
} else {
    echo "falha na conexão";
}*/