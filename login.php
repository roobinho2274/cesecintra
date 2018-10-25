<?php

//session_start();

include 'funcoes.php';
include 'conexao.php';

$usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

$tipo = validasuario($usuario, $senha, $con);

$_SESSION['tipoUsuario'] = $tipo;

if ($tipo == "adm") {
    header('location: paginaInicialAdm.php');
} else if ($_SESSION['tipoUsuario'] == "secretaria") {
    header('location: secretarias/paginaInicialSec.php');
} else if ($_SESSION['tipoUsuario'] == "professor") {
    header('location: paginaInicialProf.php');
}

