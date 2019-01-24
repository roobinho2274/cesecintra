<?php
    session_start();
    //Inclui os arquvis de conexão e funções
    include_once ("../conexao.php");
    include_once ("../funcoes.php");
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
        <div class = "container" style="background-color: #71dd8a" >
            <h5>CADASTRO DE ALUNOS</h5>
            <?php
            //verifica se o usuario pode estar aqui
            if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {

                $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_STRING);
                $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_STRING);
                $nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_STRING);
                $nota4 = filter_input(INPUT_POST, 'nota4', FILTER_SANITIZE_STRING);
                $nota5 = filter_input(INPUT_POST, 'nota5', FILTER_SANITIZE_STRING);
                $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_STRING);
                $id_disciplina = filter_input(INPUT_POST, 'id_disciplina', FILTER_SANITIZE_STRING);
                                
                $query = "UPDATE matricula SET nota1 = '$nota1', nota2 = '$nota2', nota3 = '$nota3', nota4 = '$nota4', nota5 = '$nota5' WHERE idAluno='$id_aluno' and idDisciplina='$id_disciplina'";

                $resultado = mysqli_query($con, $query);
                
                if ($resultado) {
                    Echo "<div class='alert alert-success' role='alert'>Nota inserida com sucesso</div>";
                    echo
                    "<div class='row'>"
                    . "<div class='col-sm'>"
                    . "<a class='btn btn-primary btn-block' href='../Nota/listaAluno.php?cod' role='button'>Cadastrar mais Notas</a>"
                    . "</div>";
                    echo ""
                    . "<div class='col-sm'>"
                    . "<a class='btn btn-primary btn-block' href='../Nota/controleNota.php' role='button'>VOLTAR</a>"
                    . "</div>"
                    . "</div>";
                } else {
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar Nota</div>";
                    header("Location: ../Nota/listaAluno.php");
                }
            } else {
                echo $_SESSION['tipoUsuario'];
                echo"<script>alert sem permissão de acesso</script>";
                header("location: /PROJETOCESEC/cesecintra/index.php");
            }
            ?>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>