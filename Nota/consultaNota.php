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
        <h2>LISTA DE NOTAS DE CADA ALUNO EM CADA DISCIPLINA</H2>
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
                <td>NOME</td><td>DISCIPLINA</td><td>NOTA 1</td><td>NOTA 2</td><td>NOTA 3</td><td>NOTA 4</td><td>NOTA 5</td><td>MEDIA</td>
                </thead>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <?php 
                    $sql = "SELECT nome,id from aluno";
                    $dados = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($dados)){
                        $sql2 = "SELECT nota1,nota2,nota3,nota4,nota5,idDisciplina,media from matricula where idAluno = ".$row['id'].";";
                        
                        
                        $dados2 = mysqli_query($con, $sql2);
                        while($row2 = mysqli_fetch_assoc($dados2)){
                            
                            $nota1 = $row2['nota1'];
                            if($row2['nota2'] == null){ $nota2 = "N/A";}else{$nota2 = $row2['nota2'];}
                            if($row2['nota3'] == null){ $nota3 = "N/A";}else{$nota3 = $row2['nota3'];}
                            if($row2['nota4'] == null){ $nota4 = "N/A";}else{$nota4 = $row2['nota4'];}
                            if($row2['nota5'] == null){ $nota5 = "N/A";}else{$nota5 = $row2['nota5'];}
                            
                            echo '<tr>';
                            $sql3 = "SELECT descricao FROM disciplina where id = ".$row2['idDisciplina'];
                            $dados3 = mysqli_query($con,$sql3);
                            while($row3 = mysqli_fetch_assoc($dados3)){
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row3['descricao'].'</td>'
                                    . '<td>'.$nota1.'</td><td>'.$nota2.'</td><td>'.$nota3.'</td><td>'.$nota4.'</td><td>'.$nota5.'</td><td>'.$row2['media'].'</td>';
                            echo '</tr>';
                            }
                        }
                    }
                ?>
                
            </table>
            <br/>
            <a class="btn btn-secondary strong form-control" style="width: 10%; margin-left: 45%" href="../Nota/controleNota.php" role="button">Voltar</a>
            
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>