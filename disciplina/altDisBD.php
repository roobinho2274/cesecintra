<?php

session_start();
include_once ("../conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ensino = filter_input(INPUT_POST, 'ensino', FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_STRING);

if (isset($_SESSION['disciplina'])) {
    $codigo = $_SESSION['disciplina'];
    $queryAltera = "UPDATE disciplina SET descricao = '$nome',idGrauEnsino = '$ensino',idProf = '$professor' "
            . "WHERE disciplina.id = $codigo";

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