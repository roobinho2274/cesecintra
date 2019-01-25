<?php
session_start();
//Inclui os arquvis de conexão e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

    if ($_SESSION['tipoUsuario'] != 'adm') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    mysqli_select_db($con, $dbname );
    
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    $query = sprintf('DELETE FROM aluno WHERE id= "'.$id.'" ');
    
    $resultado = mysqli_query($con, $query);
    
    header("Location: ../aluno/consultaAluno.php");
?>