<?php

//Inicio da sessão e incluçãos dos arquivos 
session_start();
include_once ("../conexao.php");

if ($_SESSION['tipoUsuario'] != 'adm' && $_SESSION['tipoUsuario'] != 'disciplina') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

//Pega o código da disciplina envida por POST do deletaDis.php usando filtro
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
//Cria a String com o comando SQL
$query = "DELETE FROM frequencia WHERE id = $id";
//Executa o comando SQL no banco que veio da conexão
$resultadoDelete = mysqli_query($con, $query);
//Verifica se foi deletado

if ($resultadoDelete) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Excluído com sucesso!</div>";
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao excluir!</div>";
}

header("Location: ../frequencia/listaFrequencia.php");

?>

