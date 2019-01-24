<?php

session_start();
include_once ("../conexao.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ensino = filter_input(INPUT_POST, 'ensino', FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_STRING);
$turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);

if (isset($_SESSION['disciplina'])) {
    $codigo = $_SESSION['disciplina'];
    $queryAltera = "UPDATE disciplina SET descricao = '$nome',idGrauEnsino = '$ensino',idProf = '$professor', turno = '$turno', horario = '$horario' WHERE disciplina.id = $codigo";

    unset($_SESSION['disciplina']);

    $r = mysqli_query($con, $queryAltera);
    if ($r) {
        $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";
        header("Location: ../disciplina/listaDis.php");
    } else {
        $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
        header("Location: ../disciplina/alteraDis.php");
    }
}