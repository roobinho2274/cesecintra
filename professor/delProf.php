<?php

//Inicio da sessão e incluçãos dos arquivos 
session_start();
include_once ("../conexao.php");
//Pega o código da disciplina envida por POST do deletaDis.php usando filtro
$cod = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_NUMBER_INT);
//Cria a String com o comando SQL
$query = "DELETE FROM professor WHERE id = $cod";
//Executa o comando SQL no banco que veio da conexão
$resultadoDelete = mysqli_query($con, $query);
//Verifica se foi deletado
if ($resultadoDelete) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Excluído com sucesso!</div>";
    header("Location: ../professor/ListaProfessor.php");
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao excluir!</div>";
    header("Location: ../professor/deletaProf.php");
}


