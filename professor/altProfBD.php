<?php

session_start();
include_once ("../conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

if (isset($_SESSION['funcionario'])) {
    $codigo = $_SESSION['funcionario'];
    $queryAltera = "UPDATE professor SET nome = '$nome',login = '$login',senha = '$senha' ,tipo = '$tipo' ". "WHERE professor.id = $codigo";

    unset($_SESSION['funcionario']);

    $r = mysqli_query($con, $queryAltera);
    if ($r) {
        $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";
        header("Location: ../professor/ListaProfessor.php");
    } else {
        $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
        header("Location: ../disciplina/alteraProf.php");
    }
}