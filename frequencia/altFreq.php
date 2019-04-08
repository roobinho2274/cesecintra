<?php

session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");
if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$idFreq = filter_input(INPUT_POST, 'idFreq', FILTER_SANITIZE_STRING);
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_STRING);
//$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
//$disciplina = filter_input(INPUT_POST, 'disciplina', FILTER_SANITIZE_STRING);
//$mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
//$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);

$query = "UPDATE frequencia SET horas = '$horas' WHERE id = '$idFreq'";
$resultado = executa($query, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";    
    header("Location: ../frequencia/listaFrequencia.php");   
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
    header("Location: ../frequencia/listaFrequencia.php");
}
?>