<?php

//session_start();

include 'funcoes.php';
include 'conexao.php';

$usuario = filter_input(INPUT_POST,'user',FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING);

$tipo = validasuario($usuario, $senha, $con);

$_SESSION['tipoUsuario'] = $tipo;

header('location: paginaInicial.php');
