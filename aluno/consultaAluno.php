<?php
session_start();

include_once ("../conexao.php");
include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = '<script type="text/javascript">alert("Sem permissão de acesso!");</script>';
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
        <h2>FORMULARIO PARA CADASTRO DE ALUNO</h2>
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
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>CPF</td>
                    <td>Status</td>
                    <td colspan="2">Ações</td>
                </thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                    $sql = "SELECT nome,email,id,cpf,status from aluno";
                    $dados = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($dados)){
                        if($row['status'] == 1){
                            $status = "ATIVO"; 
                        }else{ 
                            $status = "INATIVO";
                        } 
                        echo '<tr><td>'.$row['id'].'</td><td>'.$row['nome'].'</td><td>'.$row['email'].'</td><td>'.$row['cpf'].'</td><td>'.$status.'</td>';
                        echo '<td><form method="post" action = "alterarAluno.php"><input type="hidden" value="'.$row['id'].'" name = "id"><input type = "submit" value="Alterar" class="btn-success"></form></td>';
                        echo '<td><form method="post" action = "deleteAluno.php"><input type="hidden" value="'.$row['id'].'" name = "id"><input type = "submit" value="Deletar" class="btn-success"></form></td>';
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
        <small id="usurHelp" class="form-text  text-muted text-center ">*Ao deletar aluno, certifique-se de que não haja nenhum vínculo com as matrículas!</small>
    </body>
</html>