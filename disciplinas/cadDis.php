<?php
session_start();
include_once '../funcoes.php';
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ensino = filter_input(INPUT_POST, 'ensino', FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_STRING);

$query = "SELECT MAX(id) FROM professor ";

$id = mysqli_fetch_assoc(executa($query));
echo $id['MAX(id)'];

$id = $id['MAX(id)'] + 1;

$query = "INSERT INTO disciplina(id,descricao,idGrauEnsino,idProf)VALUES ($id,$nome,$ensino,$professor) ";

$resultado = executa($query);

if ($resultado) {
    $_SESSION['msn'] = "<span style= color: gren>Inserido com sucesso!</span>";
    header("Location: ../disiciplia/listaDis.php");
} else {
    $_SESSION['msn'] = "<span style= color: red>Falha ao inserir!</span>";
    header("Location: ../disiciplia/cadastraDis.php");
}



