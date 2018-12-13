<?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");

    $alunos = listaAlunos($con);
    $disciplinas = listaDisciplinas($con);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de matricula</title>
        <link rel="stylesheet" href="../css/bootstrap.css" >
    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>MATRICULA</h5>
            <?php
                /* Verifica se a variável global que indica falha na inserção está
                  Setada, o que indica uma falha na inserção no banco */
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
            ?>
            <form action="cadMatBD.php" method="POST" >
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Aluno</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="aluno">
                            <option value="">Selecione o aluno</option>
                            <?php
                                while ($r = mysqli_fetch_assoc($alunos)) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                
                  <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="submit" class="btn btn-primary" formaction="../matriculas/controleMatriculas.php">Voltar</button>
                        
                    </div>
                </div>
            </form> 
        </div>    
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
