<?php

    session_start();
    include_once ("../conexao.php");

    if (isset($_SESSION['matricula'])) {
        $codigo = $_SESSION['matricula'];

        //String de alteração no banco
        $query = "SELECT * FROM matricula WHERE id = $codigo";
        //execução da estring SQL e coloca o resultado em $res

        $r = mysqli_query($con, $query);
        $res = mysqli_fetch_assoc($r);

        //$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
        //$disciplina = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_STRING);
        $turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
        $conclusao = filter_input(INPUT_POST, 'conclusao', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
        //$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_STRING);
        //$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_STRING);
        //$nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_STRING);
        //$nota4 = filter_input(INPUT_POST, 'nota4', FILTER_SANITIZE_STRING);
        //$nota5 = filter_input(INPUT_POST, 'nota5', FILTER_SANITIZE_STRING);
        //$media = filter_input(INPUT_POST, 'media', FILTER_SANITIZE_STRING);

        $conclu = NULL;


        $queryAltera = "UPDATE matricula SET dataConclusao = '$conclu', status = '$status', horaAula = '$horario'  WHERE id = '$codigo'";

        /*
            if ($conclusao == "nao" && $res['dataConclusao'] == NULL) {
                $conclu = NULL;
            }else if($conclusao == "nao" && $res['dataConclusao'] != NULL){
                $conclu = NULL;
            }
        */

        if($conclusao == "sim" && $res['dataConclusao'] == NULL){
            $queryAltera = "UPDATE matricula SET dataConclusao = NOW(), status = '$status', horaAula = '$horario' WHERE id = '$codigo'";
        }else if($conclusao == "sim" && $res['dataConclusao'] != NULL || $conclusao == "nao" && $res['dataConclusao'] == NULL){
            $queryAltera = "UPDATE matricula SET status = '$status', horaAula = '$horario' WHERE id = '$codigo'";
        }

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