<?php 
session_start();
include_once ("../conexao.php");
include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$idDisc = filter_input(INPUT_POST, 'disciplina', FILTER_SANITIZE_STRING);

if($tipo != 'disciplina')$idDisc = '';

$query1 = "SELECT MAX(id) FROM professor ";

$idBd = mysqli_fetch_assoc(executa($query1, $con));

$id = $idBd['MAX(id)'] + 1;

$query2 = "INSERT INTO professor(id,nome,login,senha,tipo, idDisc)VALUES ('$id','$nome','$login','$senha','$tipo', '$idDisc') ";

$resultado = executa($query2, $con);

if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Inserido com sucesso!</div>";
    header("Location: ../professor/CadastraProf.php");
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao Inserir!</div>";
    header("Location: ../professor/CadastraProf.php");
}



?>