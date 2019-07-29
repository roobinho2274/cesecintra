<?php
session_start();
include_once ("../funcoes.php");
include_once ("../conexao.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}
if (isset($_POST['sel'])) {
    foreach ($_POST['sel'] as $codigo) {

        $query = "UPDATE matricula SET dataConclusao = NOW() WHERE id = $codigo";
        //unset($_SESSION['sel']);
        $res = mysqli_query($con, $query);

        if ($res) {
            $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";
            header("Location: ../matriculas/listaMat.php");
        }else{
            $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
            header("Location: ../matriculas/concluirMat.php");
        }
    }
}else{
    header("Location: ../matriculas/deletaMat.php");
}
