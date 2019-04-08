<?php

session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");
if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
$disciplina = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_STRING);
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_STRING);

$query1 = "SELECT MAX(id) FROM frequencia";

$idBd = mysqli_fetch_assoc(executa($query1, $con));

$query3 = "SELECT CURDATE() - 0 AS today";
$databd = mysqli_query($con, $query3);
$hoje = mysqli_fetch_assoc($databd);

$ano = substr(strval($hoje["today"]),0, 4);
$mesNumber = substr(strval($hoje["today"]),4, 2);

$mes = mes($mesNumber - 1);

$id = $idBd['MAX(id)'] + 1;
$query2 = "INSERT INTO frequencia(id,idDisciplina,idAluno,mes,ano, horas)VALUES ('$id','$disciplina','$aluno','$mes','$ano','$horas') ";
$resultado = executa($query2, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Inserido com sucesso!</div>";    
    header("Location: ../frequencia/cadFrequencia.php");
    
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao Inserir!</div>";
    header("Location: ../frequencia/cadFrequencia.php");
}




function mes($mes){

  if($mes == 1){
  return "Janeiro";
  }elseif($mes == 2){
  return "Fevereiro";
  }elseif($mes == 3){
  return "Março";
  }elseif($mes == 4){
  return "Abril";
  }elseif($mes == 5){
  return "Maio";
  }elseif($mes == 6){
  return "Junho";
  }elseif($mes == 7){
  return "Julho";
  }elseif($mes == 8){
  return "Agosto";
  }elseif($mes == 9){
  return "Setembro";
  }elseif($mes == 10){
  return "Outubro";
  }elseif($mes == 11){
  return "Novembro";
  }elseif($mes == 12){
  return "Dezembro";
  }
}