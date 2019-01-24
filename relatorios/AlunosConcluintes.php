<?php
session_start();

include_once ("../conexao.php");
include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Cadastro Aluno</title>

    </head>
    <body>
        <h2>FORMULARIO PARA CADASTRO DE ALUNO</H2>
        <div class = "container" style="background-color: #71dd8a" >
            <?PHP
            if(isset($_SESSION['msg']))
                {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
            
            <table style="width: 100%" class="text-center">
                
                <thead>
                <td>Id</td><td>Nome</td><td>Email</td><td>CPF</td><td>Status</td>
                </thead>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <?php 
                    $sql1 = "SELECT nome,email,id,cpf,status from aluno";
                    $sql2 = "SELECT dataConclusao from matricula";
                    $dados1 = mysqli_query($con, $sql1);
                    $dados2 = mysqli_query($con, $sql2);
                    while($row1 = mysqli_fetch_assoc($dados1) and $row2 = mysqli_fetch_assoc($dados2)){
                        if($row2['dataConclusao'] != null){$status = 'concluiu';}else{$status = 'cursando';}
                        echo '<tr><td>'.$row1['id'].'</td><td>'.$row1['nome'].'</td><td>'.$row1['email'].'</td><td>'.$row1['cpf'].'</td><td>'.$status.'</td>';
                        echo '</tr>';
                    }
                ?>
                
            </table>
            <br/>
            <a class="btn btn-secondary strong form-control" style="width: 10%; margin-left: 45%" href="../aluno/controleAluno.php" role="button">Voltar</a>
            
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>