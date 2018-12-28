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

        <title>Deleta matrículas</title>

    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>DELETAR MATRÍCULAS</h5>
            <?php
            /* Verifica se a variável global que indica falha na exclusão está
              Setada, o que indica uma falha na inserção no banco ou valor inválido */
            if (isset($_SESSION['msn'])) {
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
            }
            ?>
            <form action="delMatrBD.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alunos</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" name="matr" id="combobox_aluno">
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

                <div class="input-group mb-3">
                    <div class="input-group-prepend" id="div_checkbox"></div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Excluir</button>
                        <button type="submit" class="btn btn-primary" formaction="../matriculas/controleMatriculas.php">Voltar</button>
                    </div>
                </div>
            </form> 

            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">google.load("jquery", "1.4.2");</script>
            
            <script type="text/javascript">
                $(function(){
                    $('#combobox_aluno').change(function(){
                        //alert("asdas");
                        if( $(this).val() ) {
                            $.getJSON('matriculasD.php?search=',{combobox_aluno: $(this).val(), ajax: 'true'}, function(j){
                                var checkbox = ''; 
                                for (var i = 0; i < j.length; i++) {
                                    checkbox += '<div class="input-group-text"><input type="checkbox" aria-label="Checkbox for following text input" value="' + j[i].id + '" name="sel[]">' + j[i].nome + '</div>';
                                }   
                                $('#div_checkbox').html('').show();
                                $('#div_checkbox').html(checkbox).show();
                            });
                        } else {
                            $('#div_checkbox').html('').show();
                        }
                    });
                });
            </script>
           
           <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
