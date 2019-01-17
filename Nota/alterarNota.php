<?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_STRING);
    $id_disciplina = filter_input(INPUT_POST, 'id_disciplina', FILTER_SANITIZE_STRING);
    $sql = "SELECT nome from aluno where id=1 or id = '$id_aluno'";
    $dados = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($dados)){
        $nome_aluno = $row['nome'];
    }
    $sqld = "SELECT descricao from disciplina where id=1 or id = '$id_disciplina'";
    $dadosd = mysqli_query($con, $sqld);
    while($rowd = mysqli_fetch_assoc($dadosd)){
        $nome_disciplina = $rowd['descricao'];
    }
    $sqln = "SELECT nota1,nota2,nota3,nota4,nota5 from matricula where idDisciplina = '$id_disciplina' and idAluno = '$id_aluno'";
    $dadosn = mysqli_query($con, $sqln);
    while($rown = mysqli_fetch_assoc($dadosn)){
        $nota1 = $rown['nota1'];
        $nota2 = $rown['nota2'];
        $nota3 = $rown['nota3'];
        $nota4 = $rown['nota4'];
        $nota5 = $rown['nota5'];
    }
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Inserir Nota</title>
        
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <div style="margin-left: 50px">
            <form method = "post" action = "cadNot.php">
                <!-- DIV NOME DO ALUNO -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> ALUNO : <?php echo $nome_aluno; ?></label>
                    <div class="col-sm-10">
                        <input type = "hidden" <?php echo 'value = "'.$id_aluno.'"'; ?> name = "id_aluno">
                    </div>
                </div>
                <!-- DIV NOME DA DISCIPLINA -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">DISCIPLINA : <?php echo $nome_disciplina; ?></label>
                    <div class="col-sm-10">
                        <input type = "hidden" <?php echo 'value = "'.$id_disciplina.'"'; ?> name = "id_disciplina">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOTA 1 :</label>
                    <div class="col-sm-10">
                        <input type="number" <?php echo 'value ="'.$nota1.'"'; ?> class="form-control"  name="nota1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOTA 2 :</label>
                    <div class="col-sm-10">
                        <input type="number" <?php echo 'value ="'.$nota2.'"'; ?> class="form-control"  name="nota2">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOTA 3 :</label>
                    <div class="col-sm-10">
                        <input type="number" <?php echo 'value ="'.$nota3.'"'; ?> class="form-control"  name="nota3">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOTA 4 :</label>
                    <div class="col-sm-10">
                        <input type="number" <?php echo 'value ="'.$nota4.'"'; ?> class="form-control"  name="nota4">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOTA 5 :</label>
                    <div class="col-sm-10">
                        <input type="number" <?php echo 'value ="'.$nota5.'"'; ?> class="form-control"  name="nota5">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Inserir Notas</button>
                <button type="submit" class="btn btn-primary" formaction="../Nota/listaAluno.php">Voltar</button>
            </form>
        </div>
    <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>