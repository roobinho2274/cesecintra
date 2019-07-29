
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
}

$query = "SELECT * FROM aluno WHERE grauensino = 1";
$resultadoAlunos = mysqli_query($con, $query);



if (isset($_POST['aluno']) && isset($_POST['alterar']) && $_POST['aluno'] != ''){

    $query = "SELECT * FROM aluno WHERE id = ".$_POST['aluno'];
    $resultado = mysqli_query($con, $query);

    $dados = mysqli_fetch_assoc($resultado);

    $queryid = "SELECT MAX(id) FROM aluno";
    $resId = mysqli_query($con,$queryid);
    $idBd = mysqli_fetch_assoc($resId);
    $id = $idBd['MAX(id)'] + 1;

    $query = "INSERT INTO aluno(id,rg,cpf,nome,orgaoExpedidor,mae,pai,tituloEleitor,"
        . "reservista,sexo,estadoCivil,logradouro,bairro,complemento,numeroResidencial,"
        . "cidade,cep,estado,telefone,email,celular,status,datacadastro,grauensino,turno)"
    . "VALUES ('$id','".$dados['rg']."','".$dados['cpf']."','".$dados['nome']."','".$dados['orgaoExpedidor']."','".$dados['mae']."','".$dados['pai']."','".$dados['tituloEleitor']."'"
        . ",'".$dados['reservista']."','".$dados['sexo']."','".$dados['estadoCivil']."','".$dados['logradouro']."','".$dados['bairro']."','".$dados['complemento']."',"
        . "'".$dados['numeroResidencial']."','".$dados['cidade']."','".$dados['cep']."','".$dados['estado']."','".$dados['telefone']."','".$dados['email']."',"
        . "'".$dados['celular']."','".$dados['status']."',NOW(),'2','".$dados['turno']."')";

    $resultado = mysqli_query($con, $query);

    if ($resultado){
        $_SESSION['msg'] = "<div class='alert alert-success text-center' role='alert'>Aluno alterado com sucesso!</div>";
        header('Location: consultaAluno.php');
    }else{
        $_SESSION['msg'] = "<div class='alert alert-error text-center' role='alert'>Não foi possível alterar o aluno!</div>";
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
        <h2 class="text-light strong text-center">Promover aluno</h2>
        <hr class="hrBranco">

        <?PHP
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <form method="POST">
            <div class="row">
                <div class="col-md-2 text-center">
                    <label for="select_aluno" class="control-label" style="font-weight: bold;color: white">Aluno</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" name="aluno" id="select_aluno">
                        <option value=""></option>
                        <?php
                        while($aluno = mysqli_fetch_array($resultadoAlunos)){
                            echo '<option value="'.$aluno['id'].'">'.$aluno['nome'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button id="btn_aluno" name="alterar" type="submit" class="btn btn-light botoesFrequencia btn-block mb-2">Alterar</button>
                </div>
            </div>
        </form>



        <a class="btn btn-light form-control botõesAluno mt-4 mb-2" href="../aluno/controleAluno.php">Voltar</a>
    </div>
</div>
</body>

<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>



