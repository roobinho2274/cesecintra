<!DOCTYPE html>
<html>
    <head>
        <title>Consulta de alunos cadastrados</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
        <link rel="stylesheet" href="../css/Professor.css" >
    </head>
    <?php
    session_start();

    include_once ("../conexao.php");
    include_once ("../funcoes.php");

    if ($_SESSION['tipoUsuario'] != 'adm') {
        
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");

    }else{

        $msg = '';

        if(isset($_POST['desativar'])){

            $query = "UPDATE aluno SET status = '2';";
            $res = mysqli_query($con, $query);

            if($res)
                $msg = "<div class='alert alert-success text-center' role='alert'>Alunos desativados com sucesso!</div>";   
            else
                $msg = "<div class='alert alert-danger text-center' role='alert'>Não foi possível desativar os alunos!</div>";       
                
        }else if(isset($_POST['ativar'])){

            $query = "UPDATE aluno SET status = '1';";
            $res = mysqli_query($con, $query);

            if($res)
                $msg = "<div class='alert alert-success text-center' role='alert'>Alunos ativados com sucesso!</div>";   
            else
                $msg = "<div class='alert alert-danger text-center' role='alert'>Não foi possível ativar os alunos!</div>";       
            

        }
    }


    ?>
    <body style="background-color:#65AFB2;">
        
        <nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
                <!-- Brand/logo -->
            <ul class="nav navbar-nav mx-auto">     
                <div class="navbar-brand">
                    <a class="navbar-btn mx-auto"  href="../paginaInicialAdm.php">
                        <img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
                    </a>    
                        
                    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>       
                </div>  
                
                
                <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">

                    <ul class="navbar-nav">
                        
                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="controleAluno.php">Controle do Aluno</a>
                        </li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light" href="../professor/controleProfessor.php">Controle dos Usuários</a>
                        </li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light" href="../disciplina/controleDisciplinas.php">Controle das Disciplinas</a>
                        </li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light" href="../matriculas/controleMatriculas.php">Controle das Matriculas</a>
                        </li>                   

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="../frequencia/controleFrequencia.php">Controle de Frequência</a>
                        </li>
                        
                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
                        </li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2" style="background-color: #dc3545;">
                            <a class="nav-link text-light" href="../logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </ul>   
        </nav>
 
    
        

    <div class="pl-2 pr-2">
        <div class="mt-5 mb-3 container corpoDoAluno "> 
            <hr class="hrBranco">
            <h2 class="text-light strong text-center">Desativar alunos</h2>
            <hr class="hrBranco">
            
            <form method="POST">
                <input type="submit" name="ativar" class="btn btn-light btn-block mt-5 botõesAluno form-control" value="Ativar todos alunos"/>
                <input type="submit" name="desativar" class="btn btn-light btn-block mt-4 mb-5 botõesAluno form-control" value="Desativar todos alunos"/>
            </form>


            <?php

            if($msg != "") echo $msg;

            ?>


        
            <a class="btn btn-light form-control botõesAluno mt-4 mb-2" href="../aluno/controleAluno.php">Voltar</a>
        </div>
    
    </div>
    </body>
    
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>



