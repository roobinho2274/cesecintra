<html>
    <head>
        <title>Relatório de nível</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
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
    <body style="background-color:#65AFB2;">
		
		<nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
				<!-- Brand/logo -->
			<ul class="nav navbar-nav mx-auto">		
				<div class="navbar-brand">
					<a class="navbar-btn mx-auto"  href="../paginaInicialAdm.php">
						<img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
					</a>	
						
					<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>		
				</div>	
				
				
				<div class="collapse navbar-collapse text-center" id="collapsibleNavbar">

					<ul class="navbar-nav">
						
						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="../aluno/controleAluno.php">Controle do Aluno</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../professor/controleProfessor.php">Controle do Funcionário</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../disciplina/controleDisciplinas.php">Controle das Disciplinas</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../matriculas/controleMatriculas.php">Controle das Matriculas</a>
						</li>					

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="../frequencia/controleFrequencia.php">Controle de Frequência</a>
						</li>
					</ul>
				</div>
			</ul>	
		</nav>
		
		<div class="pl-2 pr-2">
        <div class="mt-5 mb-3 container corpoRelatorio">	
		<hr class="hrBranco">
            <h2 class="text-light strong text-center">Relatório de Nivel</h2>
		<hr class="hrBranco">
		<div class="MensagemRelatorio mb-3">
			Selecione o nivel de educação ou o horário para ver os alunos matriculados.
		</div>		
    		<div class="form-group row mx-auto">
                <label class="col-lg-2 col-sm-12 col-form-label strong text-center">Nível:</label>
                <div class="col-lg-10 col-sm-12"> 
                    <select class="form-control" name="aluno7" id="combobox_nivel">
                        <option value="">Selecione o nivel</option>
                        <option value="fundamental">Ensino Fundamental</option>
                        <option value="medio">Ensino Médio</option>
                        <?php 
                            $sql = "SELECT * FROM turno";
                            $res = mysqli_query($con, $sql);
                            while($r = mysqli_fetch_assoc($res)) {
                                echo '<option value="'.strtolower($r['descricao']).'">'.ucfirst(strtolower($r['descricao'])).'</option>';
                            }
                        ?>
                    </select>
                 </div>
            </div>
			<div class="table-responsive corpoDaTableRelatorios strong">
            <table class="table table-striped table-bordered corpoDaTableRelatorios text-center">
                <thead class="table-dark text-light">
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
			</div>
			<div class="pl-4 pr-4 mb-2 mt-3">
            <a class="btn btn-light form-control  botoesRelatorio"  href="../relatorios/opcoesrelatorios.php" role="button">Voltar</a>
			</div>
            
            <script type="text/javascript">
                $(function(){
                    $('#combobox_nivel').change(function(){
                        if( $(this).val() ) {
                            $.getJSON('tnivel.php?search=',{combobox_nivel: $(this).val(), ajax: 'true'}, function(j){
                                var options = '<tr>'; 
                                for (var i = 0; i < j.length; i++) {
                                    options += "<th class=' text-light strong text-center' scope = 'row'>" + j[i].id + "</th>";
                                    options += "<td class=' text-light strong text-center'>" + j[i].nome + "</td>";
                                    options += "<td class=' text-light strong text-center'>" + j[i].disciplina + "</td>";
                                    options += "<td class=' text-light strong text-center'>" + j[i].horaAula + "</td>";
                                    options += "<td class=' text-light strong text-center'>" + j[i].status + "</td>";
                                    options += "<td class=' text-light strong text-center'>" + j[i].dataMatricula + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].nota1 + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].nota2 + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].nota3 + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].nota4 + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].nota5 + "</td>";
                                    options += "<td class='d-none d-md-table-cell text-light strong text-center'>" + j[i].media + "</td>";
                                	options += '</tr>'; 
                                }   
                                $('#tbody').html(options).show();
                            });
                        } else {
                            $('#tbody').html('');
                            return;
                        }
                        $('#tbody').html('<td colspan = "12" class="alert alert-danger text-center"><h5>Não há matrículas disponíveis para o aluno selecionado!</h5></td>').show();
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

