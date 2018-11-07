<?php
session_start();
//Inclui os arquivos que contém as conexões e as funções em PHP
include_once ("funcoes.php");
include_once ("conexao.php");
//Pega dos dados que vem de index.php atráves do metódo post usando filtro
$usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
//Chama função que verifica usuário no banco e retorna o tipo de usuário
$tipo = validasuario($usuario, $senha, $con);
//verifica se a variável global de sessão que contém o tipo de usuário está setada
if (isset($_SESSION['tipoUsuario'])) {
    unset($_SESSION['tipoUsuario']);
}
//atribui valor a variável globaç de sessão 
$_SESSION['tipoUsuario'] = $tipo;
//Verifica o tipo de usuário que fez o login e e encaminha para pagina específica
if ($tipo == "adm") {
    header('location: paginaInicialAdm.php');
} else if ($tipo == "secretaria") {
    header('location: secretarias/paginaInicialSec.php');
} else if ($tipo == "professor") {
    header('location: professor/paginaInicialProf.php');
}
else
{
    //Variável global de sessão que informa erro de Login quando a senha ou usuário é inválido
    $_SESSION['msg'] = "<p><span style = 'color: red'>Usuário inválido</span></p> ";
    header('location: index.php');
}

