<?php
session_start();
include_once ("../funcoes.php");
include_once ("../conexao.php");

$alunos = listaAlunos($con);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Caddastro de matricula</title>
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
            <form action="cadMat.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Aluno</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="aluno">
                            <?php
                            while ($r = mysqli_fetch_assoc($alunos)) {
                                echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <?php
                ?>
                <fieldset class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input"> Matemática
                            </div>
                        </div>

                    </div>
                </fieldset>


            </form> 

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
