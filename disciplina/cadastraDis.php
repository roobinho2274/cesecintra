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


        <title>Pagina Administrador</title>

    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>DISCIPLINAS</h5>
            <?php
            /*Verifica se a variável global que indica falha na inserção está
            Setada, o que indica uma falha na inserção no banco*/
            if (isset($_SESSION['msn'])) {
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
            }
            ?>
            <form action="cadDis.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Modalidade</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ensino" value="1" checked>
                                <label class="form-check-label" >
                                    Ensino Medio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ensino" value="2">
                                <label class="form-check-label">
                                    Ensino Fundamental
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Turno</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" value="1" checked>
                                <label class="form-check-label" >
                                    Matutino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" value="2">
                                <label class="form-check-label">
                                    Noturno
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Professor</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="prof">
                            <?php
                            /*Faz a busca por todos os usuários do tipo porfessor no banco
                            e preenche um select*/
                            $query = "SELECT * FROM professor WHERE professor.tipo = 'professor'";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Horário</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="horario" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="../disciplina/controleDisciplinas.php" class="btn btn-primary">Voltar</a>
                        
                    </div>
                </div>
            </form> 

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
