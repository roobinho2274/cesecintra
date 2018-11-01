<?php

include_once ("funcoes.php");
include_once ("conexao.php");

$usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

$tipo = validasuario($usuario, $senha, $con);

if (isset($_SESSION['tipoUsuario'])) {
    unset($_SESSION['tipoUsuario']);
}

$_SESSION['tipoUsuario'] = $tipo;
echo "Aqui".$tipo;
if ($tipo == "adm") {
    header('location: paginaInicialAdm.php');
} else if ($tipo == "secretaria") {
    header('location: secretarias/paginaInicialSec.php');
} else if ($tipo == "professor") {
    header('location: professor/paginaInicialProf.php');
}
else
{
    $_SESSION['msg'] = "<p><span style = 'color: red'>Usuário inválido</span></p> ";
    
    header('location: index.php');
}

