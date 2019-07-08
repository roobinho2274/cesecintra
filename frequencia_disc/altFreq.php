<?php

session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");
if ($_SESSION['tipoUsuario'] != 'adm' && $_SESSION['tipoUsuario'] != 'disciplina') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$idFreq = filter_input(INPUT_POST, 'idFreq', FILTER_SANITIZE_STRING);
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_STRING);
$mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);

$query = "UPDATE frequencia SET horas = '$horas', mes = '$mes' WHERE id = '$idFreq'";
$resultado = executa($query, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";    
    header("Location: ../frequencia_disc/listaFrequencia.php");
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
    header("Location: ../frequencia_disc/listaFrequencia.php");
}
?>