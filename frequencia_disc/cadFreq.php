<?php

session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");
if ($_SESSION['tipoUsuario'] != 'adm' && $_SESSION['tipoUsuario'] != 'disciplina') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
$disciplina = $_SESSION['usuario_disciplina_id'];
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_STRING);

$query1 = "SELECT MAX(id) FROM frequencia";

$idBd = mysqli_fetch_assoc(executa($query1, $con));

$query3 = "SELECT CURDATE() - 0 AS today";
$databd = mysqli_query($con, $query3);
$hoje = mysqli_fetch_assoc($databd);

$ano = substr(strval($hoje["today"]),0, 4);
$mesNumber = substr(strval($hoje["today"]),4, 2);

$beforeMes = $mesNumber - 2 == -1 ? 11 : $mesNumber - 2;

$mes = $meses[$beforeMes];

$id = $idBd['MAX(id)'] + 1;
$query2 = "INSERT INTO frequencia(id,idDisciplina,idAluno,mes,ano, horas)VALUES ('$id','$disciplina','$aluno','$mes','$ano','$horas') ";

$resultado = executa($query2, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Inserido com sucesso!</div>";    
    header("Location: ../frequencia_disc/cadFrequencia.php");
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao Inserir!</div>";
    header("Location: ../frequencia_disc/cadFrequencia.php");
}