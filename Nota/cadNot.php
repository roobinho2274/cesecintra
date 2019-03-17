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
                $id_disciplina = filter_input(INPUT_POST, 'id_disciplina', FILTER_SANITIZE_STRING);
                $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_STRING);
                $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_STRING);
                $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_STRING);
                $nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_STRING);
                $nota4 = filter_input(INPUT_POST, 'nota4', FILTER_SANITIZE_STRING);
                $nota5 = filter_input(INPUT_POST, 'nota5', FILTER_SANITIZE_STRING);
                $query = "UPDATE matricula SET nota1 = '$nota1' ";
                $somatotal = $nota1;
                $quantidade_notas = 1;
                if($nota2 == null){
                } else {
                    $query = $query .", nota2 = '$nota2' ";
                    $somatotal = $somatotal + $nota2;
                    $quantidade_notas++;
                }
                
                if($nota3 == null){
                } else {
                    $query = $query.", nota3 = '$nota3' ";
                    $somatotal = $somatotal + $nota3;
                    $quantidade_notas++;
                }
                
                if($nota4 == null){
                } else {
                    $query = $query.", nota4 = '$nota4' ";
                    $somatotal = $somatotal + $nota4;
                    $quantidade_notas++;
                }
                
                if($nota5 == null){
                } else {
                    $query = $query.", nota5 = '$nota5' ";
                    $somatotal = $somatotal + $nota5;
                    $quantidade_notas++;
                }
                
                $media = $somatotal/$quantidade_notas;
                
                $query = $query.", media = '$media' WHERE idAluno='$id_aluno' and idDisciplina='$id_disciplina'";

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
                    $query;
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar Nota</div>";
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