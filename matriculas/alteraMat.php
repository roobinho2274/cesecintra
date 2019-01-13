<?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Altera Matarícula</title>
    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>MATRÍCULAS</h5>
            <?php
                
                //Verifica se a variável global que indica falha na exclusão está setada, o que indica uma falha na inserção no banco ou valor inválido 
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
                
            ?>
            <form action="altMat.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alunos</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" name="aluno" id="combobox_aluno">
                            <option value="">Selecione o aluno</option>
                            <?php 
                                $sql = "SELECT * FROM aluno ORDER BY nome";
                                $res = mysqli_query($con, $sql);
                                while($r = mysqli_fetch_assoc($res) ) {
                                    $sql2 = "SELECT * FROM matricula WHERE idAluno = '".$r['id']."'";
                                    $res2 = mysqli_query($con, $sql2);
                                    $r2 = mysqli_fetch_assoc($res2);
                                    if ($r2) {
                                        echo '<option value="'.$r['id'].'">'.$r['nome'].'</option>';
                                        
                                    }
                                }
                            ?>
                        </select>
                     </div>
                </div>
                <?php  
                    $sql2 = "SELECT COUNT(case idAluno when '1' then 1 else null end) FROM matricula";
                    $res2 = mysqli_query($con, $sql2);
                    $r2 = mysqli_fetch_row($res);
                ?>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disciplinas</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" name="disc7" id="combobox_disc">
                            <option value="">Selecione a disciplina</option>
                        </select>
                    </div>
                </div> 


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <button type="submit" class="btn btn-primary" formaction="../matriculas/controleMatriculas.php">Voltar</button>
                    </div>
                </div>
            </form> 

            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">google.load("jquery", "1.4.2");</script>
            
            <script type="text/javascript">
                $(function(){
                    $('#combobox_aluno').change(function(){
                        if( $(this).val() ) {
                            $.getJSON('disciplinas.php?search=',{combobox_aluno: $(this).val(), ajax: 'true'}, function(j){
                                var options = '<option value="">Selecione a disciplina</option>'; 
                                for (var i = 0; i < j.length; i++) {
                                    options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                                }   
                                $('#combobox_disc').html(options).show();
                            });
                        } else {
                            $('#combobox_disc').html('<option value="">Selecione a disciplina</option>');
                        }
                    });
                });
            </script>

            <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
