<?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    //Recebe o código da disciplina a ser alterada
    $id_disciplina = filter_input(INPUT_POST, 'disc7', FILTER_SANITIZE_NUMBER_INT);
    $id_aluno = filter_input(INPUT_POST, 'aluno7', FILTER_SANITIZE_NUMBER_INT);
    if ($id_aluno == "" || $id_disciplina == "") {
        header("Location: ../matriculas/alteraMat.php");
    }

    //String de alteração no banco
    $query = "SELECT * FROM matricula WHERE idAluno = $id_aluno AND idDisciplina = $id_disciplina";
    //execução da estring SQL e coloca o resultado em $res

    $r = mysqli_query($con, $query);
    $res = mysqli_fetch_assoc($r);
    $_SESSION['matricula'] = $res['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >


        <title>Matricula a ser alterada</title>

    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>MATRÍCULAS</h5>
            <?php
                /* Verifica se a variável global que indica falha na inserção está
                  Setada, o que indica uma falha na inserção no banco */
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
            ?>
            <form action="altMatBD.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Aluno</label>
                    <div class="col-sm-10">
                         <select class="form-control" name="aluno" id="combobox_aluno">
                            <?php
                                $sql = "SELECT nome FROM aluno WHERE id = $id_aluno";
                                $res2 = mysqli_query($con, $sql);
                                $r2 = mysqli_fetch_assoc($res2);
                            ?>
                            <option value="<?php echo $id_aluno ?>"><?php  echo $r2['nome']; ?></option>
                            <?php 
                                $sql2 = "SELECT * FROM aluno WHERE id <> '$id_aluno' ORDER BY nome";
                                $res3 = mysqli_query($con, $sql2);
                                while($r3 = mysqli_fetch_assoc($res3) ) {
                                    echo '<option value="'.$r3['id'].'">'.$r3['nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disciplina</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="disc">
                            <?php
                                $sql3 = "SELECT descricao FROM disciplina WHERE id = $id_disciplina";
                                $res3 = mysqli_query($con, $sql3);
                                $r4 = mysqli_fetch_assoc($res3);
                            ?>

                            <option value="<?php echo $id_disciplina ?>"><?php  echo $r4['descricao']; ?></option>

                            <?php
                                /* Faz a busca por todos as disciplinas para preencher o select */
                                $query = "SELECT * FROM disciplina WHERE id <> '$id_disciplina' ORDER BY descricao";
                                $resultado = mysqli_query($con, $query);
                                while ($r5 = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r5['id'] . ">" . $r5['descricao'] . "</option>";    
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Turno</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="turno">
                            <?php
                                $sql4 = 'SELECT descricao FROM turno WHERE id = '.$res['idTurno'].'';
                                $res4 = mysqli_query($con, $sql4);
                                $r6 = mysqli_fetch_assoc($res4);
                            ?>

                            <option value="<?php echo $res['idTurno'] ?>"><?php  echo $r6['descricao']; ?></option>

                            <?php
                                /* Faz a busca por todos as disciplinas para preencher o select */
                                $query = 'SELECT * FROM turno WHERE id <> '.$res['idTurno'].'';
                                $resultado = mysqli_query($con, $query);
                                while ($r5 = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r5['id'] . ">" . $r5['descricao'] . "</option>";    
                                }
                            ?>
                        </select>
                    </div>
                </div>


                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Concluída</legend>
                        <div class="col-sm-10">

                            <?php 
                                if ($res['dataConclusao'] == NULL) {
                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="sim">
                                            <label class="form-check-label" >
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="nao" checked>
                                            <label class="form-check-label">
                                                Não
                                            </label>
                                        </div>
                                    ';
                                }else{

                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="sim" checked>
                                            <label class="form-check-label" >
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="nao">
                                            <label class="form-check-label">
                                                Não
                                            </label>
                                        </div>
                                    ';
                                }

                            ?>
                        </div>
                    </div>
                </fieldset>

                 <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">

                            <?php 
                                if ($res['status'] == "INATIVO") {
                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="ativo">
                                            <label class="form-check-label" >
                                                ATIVO
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="inativo" checked>
                                            <label class="form-check-label">
                                                INATIVO
                                            </label>
                                        </div>
                                    ';
                                }else{

                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="ativo" checked>
                                            <label class="form-check-label" >
                                                ATIVO
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="inativo">
                                            <label class="form-check-label">
                                                INATIVO
                                            </label>
                                        </div>
                                    ';
                                }

                            ?>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Horário</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="horario" value="<?php echo $res['horaAula'] ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">1º Nota</label>
                    <div class="col-sm-10"> 
                        <input type="number" step="any" min="0" class="form-control" name="nota1" value="<?php echo $res['nota1'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">2º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota2" value="<?php echo $res['nota2'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">3º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota3" value="<?php echo $res['nota3'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">4º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota4" value="<?php echo $res['nota4'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">5º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota6" value="<?php echo $res['nota5'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Média</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="media" value="<?php echo $res['media'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <button type="submit" class="btn btn-primary" formaction="../matriculas/alteraMat.php">Voltar</button>
                        <button type="reset" class="btn btn-primary" formaction="../matriculas/altMat.php">Redefinir</button>
                    </div>
                </div>
            </form> 

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
