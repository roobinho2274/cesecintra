<?php

    session_start();
    include_once ("../conexao.php");
    if ($_SESSION['tipoUsuario'] != 'adm') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }

    if (isset($_SESSION['matricula'])) {
        $codigo = $_SESSION['matricula'];

        //$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
        //$disciplina = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_STRING);
        $turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
        $conclusao = filter_input(INPUT_POST, 'conclusao', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
        $media = filter_input(INPUT_POST, 'media', FILTER_SANITIZE_STRING);
        //$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_STRING);
        //$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_STRING);
        //$nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_STRING);
        //$nota4 = filter_input(INPUT_POST, 'nota4', FILTER_SANITIZE_STRING);
        //$nota5 = filter_input(INPUT_POST, 'nota5', FILTER_SANITIZE_STRING);


        $media = $media != '' ? ",media = '$media'" : '';
        $conclu = $conclusao == 'nao' ? NULL : 'NOW()';

        $queryAltera = "UPDATE matricula SET dataConclusao = $conclu, status = '$status', horaAula = '$horario' $media WHERE id = '$codigo'";

        unset($_SESSION['matricula']);

        $r = mysqli_query($con, $queryAltera);
        if ($r) {
            $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";
            header("Location: ../matriculas/listaMat.php");
        } else {
            $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
            header("Location: ../matriculas/alteraMat.php");
        }
    }