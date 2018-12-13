<?php 
session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

$query1 = "SELECT MAX(id) FROM professor ";

$idBd = mysqli_fetch_assoc(executa($query1, $con));

$id = $idBd['MAX(id)'] + 1;

$query2 = "INSERT INTO professor(id,nome,login,senha,tipo)VALUES ('$id','$nome','$login','$senha','$tipo') ";

$resultado = executa($query2, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Inserido com sucesso!</div>";
    header("Location: ../professor/CadastraProf.php");
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao Inserir!</div>";
    header("Location: ../professor/CadastraProf.php");
}



?>