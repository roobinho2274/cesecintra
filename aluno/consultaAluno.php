<?php
session_start();

include_once ("../conexao.php");
include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
    header("location: /PROJETOCESEC/cesecintra/index.php");
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
                <td>Id</td><td>Nome</td><td>Email</td><td>CPF</td><td>Status</td><td>---</td><td>---</td>
                </thead>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <?php 
                    $sql = "SELECT nome,email,id,cpf,status from aluno";
                    $dados = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($dados)){
                        
                        echo '<tr><td>'.$row['id'].'</td><td>'.$row['nome'].'</td><td>'.$row['email'].'</td><td>'.$row['cpf'].'</td><td>'.$row['status'].'</td>';
                        echo '<form action = "alterarAluno.php"><td><input type = "submit" value="Alterar" class="btn-success"><input type="hidden" value="'.$row['id'].' name = "id"></form></td>';
                        echo '<form action = "deletarAluno.php"><td><input type = "submit" value="Deletar" class="btn-success"><input type="hidden" value="'.$row['id'].' name = "id"></form></td>';
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