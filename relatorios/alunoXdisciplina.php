<?php
//Inciai sessão
session_start();
//Inclui os arquivos de conexáo e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

//Query para consulta no banco de todas as disciplinas
$query = "SELECT * FROM matricula ORDER BY id";
//Recebe o resultad da execução da query anterios pela função executa
$resultado = mysqli_query($con, $query);
//Mostra o resultado na tela
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Relatório de disciplinas</title>

        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <div class = "container" style="background-color: buttonface">	
            <h2>Relatório de Disciplinas</h2>
    		<div class="form-group row">
                <label class="col-sm-2 col-form-label">Disciplinas</label>
                <div class="col-sm-10"> 
                    <select class="form-control" name="aluno7" id="combobox_disc">
                        <option value="">Selecione a disciplina</option>
                        <?php 
                            $sql = "SELECT * FROM disciplina ORDER BY descricao";
                            $res = mysqli_query($con, $sql);
                            while($r = mysqli_fetch_assoc($res) ) {
                                $sql2 = "SELECT * FROM matricula WHERE idDisciplina = '".$r['id']."'";
                                $res2 = mysqli_query($con, $sql2);
                                $r2 = mysqli_fetch_assoc($res2);
                                if ($r2) {
                                    echo '<option value="'.$r['id'].'">'.$r['descricao'].'</option>';
                                    
                                }
                            }
                        ?>
                    </select>
                 </div>
            </div>
            <table class="table table-sm table-striped table-bordered table-hover" >
                <thead class="table-dark">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col">Disciplina</th>
                        <th scope = "col">Horário</th>
                        <th scope = "col">Status</th>
                        <th scope = "col">Data Matrícula</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 1</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 2</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 3</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 4</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 5</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Média</th>
                        <!--
                            <th scope = "col">Turno</th>
                            <th scope = "col">Professor</th>
                        -->
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
            <a class="btn btn-primary " href="../matriculas/controleMatriculas.php" role="button">Voltar</a>
            
            <script type="text/javascript">
                $(function(){
                    $('#combobox_disc').change(function(){
                        if( $(this).val() ) {
                            $.getJSON('taluno.php?search=',{combobox_disc: $(this).val(), ajax: 'true'}, function(j){
                                var options = '<tr>'; 
                                for (var i = 0; i < j.length; i++) {
                                    options += "<th scope = 'row'>" + j[i].id + "</th>";
                                    options += "<td>" + j[i].nome + "</td>";
                                    options += "<td>" + j[i].disciplina + "</td>";
                                    options += "<td>" + j[i].horaAula + "</td>";
                                    options += "<td>" + j[i].status + "</td>";
                                    options += "<td>" + j[i].dataMatricula + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].nota1 + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].nota2 + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].nota3 + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].nota4 + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].nota5 + "</td>";
                                    options += "<td class='d-none d-md-table-cell'>" + j[i].media + "</td>";
                                	options += '</tr>'; 
                                }   
                                $('#tbody').html(options).show();
                            });
                        } else {
                            $('#tbody').html('');
                        }
                    });
                });
            </script>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

