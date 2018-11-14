<?php
session_start();
include_once ("../funcoes.php");
include_once ("../conexao.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Deleta disciplinas</title>

    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>DISCIPLINAS</h5>
            <?php
            /* Verifica se a variável global que indica falha na exclusão está
              Setada, o que indica uma falha na inserção no banco ou valor inválido */
            if (isset($_SESSION['msn'])) {
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
            }
            ?>
            <form action="delDisc.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disciplinas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="disc">
                            <?php
                            /* Faz a busca por todos as disciplinas para preencher o select */
                            $query = "SELECT * FROM disciplina";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                if ($r['idGrauEnsino'] == 1) {
                                    echo "<option value=" . $r['id'] . ">" . $r['descricao'] . " - Ensino Médio</option>";
                                } elseif ($r['idGrauEnsino'] == 2) {
                                    echo "<option value=" . $r['id'] . ">" . $r['descricao'] . " - Ensino Fundamental</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Excluir</button>
                        <button type="submit" class="btn btn-primary" formaction="../disciplina/controleDisciplinas.php">Voltar</button>

                    </div>
                </div>
            </form> 

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
