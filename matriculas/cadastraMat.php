
<!DOCTYPE html>

<html>
    <head>
        <title>Cadastro de matricula</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
		<script src="../js/jquery-3.3.1.min.js"></script>
    </head> 
	
	<?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    if ($_SESSION['tipoUsuario'] != 'adm') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }

    $alunos = listaAlunos($con);
    $disciplinas = listaDisciplinas($con);
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
							<a class="nav-link text-light" href="controleMatriculas.php">Controle das Matriculas</a>
						</li>					

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="../frequencia/controleFrequencia.php">Controle de Frequência</a>
						</li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
                        </li>
					</ul>
				</div>
			</ul>	
		</nav>
		
		<div class="pl-2 pr-2">
        <div class = "container mt-5 mb-5">

            <form action="cadMatBD.php" method="POST" class="corpoDaMatricula">
			<hr class="hrBranco">
            <h2 class="text-light strong">Realizar matrícula</h2>
			<hr class="hrBranco">
			<div class="Mensagemmatricula mb-3">
			Selecione o aluno deseja para matriculá lo.
			</div>
                <div class="form-group row pl-2 pr-2">
                    <label class="col-sm-2 col-form-label text-center Mensagemmatricula">Aluno:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="aluno" id="combobox_aluno">
                            <option value="">Selecione o aluno</option>
                            <?php
                                while ($r = mysqli_fetch_assoc($alunos)) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend mx-auto " id="div_checkbox"></div>
                </div>
                <?php
                /* Verifica se a variável global que indica falha na inserção está
                  Setada, o que indica uma falha na inserção no banco */
                if (isset($_SESSION['msn'])) {
					echo '<hr class="hrBranco">';
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
					echo '<hr class="hrBranco">';
                }
				?>
				<hr class="hrBranco">
					<div class="pl-4 pr-4">
                        <button type="submit" class="btn btn-light form-control botõesMatricula mb-2">Cadastrar</button>
                        <button type="submit" class="btn btn-light form-control botõesMatricula mb-3" formaction="../matriculas/controleMatriculas.php">Voltar</button>
					</div>
            </form> 
            <script type="text/javascript">
                $(function(){
                    $('#combobox_aluno').change(function(){
                        //alert("asdas");
                        if( $(this).val() ) {
                            $.getJSON('disciplinasCB.php?search=',{combobox_aluno: $(this).val(), ajax: 'true'}, function(j){
                                var checkbox = ''; 
                                for (var i = 0; i < j.length; i++) {
                                    checkbox += '<div class="input-group-text ml-1"><input type="checkbox" aria-label="Checkbox for following text input" value="' + j[i].id + '" name="sel[]" checked>' + j[i].nome + '</div>';
                                }   
                                $('#div_checkbox').html('').show();
                                $('#div_checkbox').html(checkbox).show();
                            });
                        } else {
                            $('#div_checkbox').html('').show();
                            return;//gambiarra
                        }
                        $('#div_checkbox').html('<div class="alert alert-danger"><h5>Não há matrículas disponíveis para o aluno selecionado!</h5></div>').show();
                    });
                });
            </script>
			</div>
            </div>    
    </body>
           <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
      
</html>
