<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<title>Alterar Matrícula</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
		<script src="../js/jquery-3.3.1.min.js"></script>
		<?php
			session_start();
			include_once ("../funcoes.php");
			include_once ("../conexao.php");

			if ($_SESSION['tipoUsuario'] != 'adm') {
	            echo $_SESSION['tipoUsuario'];
        		$_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
	            header("location: ../index.php");
        	}
		?>
 
    </head>
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
							<a class="nav-link text-light" href="../professor/controleProfessor.php">Controle dos Usuários</a>
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
			<div class="container mt-5 mb-5">
				<form action="altMat.php" method="POST" class="corpoDaMatricula"> 
				<hr class="hrBranco">
				<h2>Alterar matrícula</h2>
				<hr class="hrBranco">
				<div class="Mensagemmatricula mb-3">
				Para editar os dados primeiro selecione o aluno e disciplina desejado.
				</div>
					<div class="form-group row pl-3 pr-3">
						<label class="col-sm-2 col-form-label text-center Mensagemmatricula">Alunos:</label>
						<div class="col-sm-10"> 
							<select class="form-control" name="aluno7" id="combobox_aluno">
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

					<div class="form-group row pl-3 pr-3">
						<label class="col-sm-2 col-form-label text-center Mensagemmatricula">Disciplinas:</label>
						<div class="col-sm-10"> 
							<select class="form-control " name="disc7" id="combobox_disc">
								<option value="">Selecione a disciplina</option>
							</select>
						</div>
					</div> 

				<?php
					
					//Verifica se a variável global que indica falha na exclusão está setada, o que indica uma falha na inserção no banco ou valor inválido 
					if (isset($_SESSION['msn'])) {
						echo'<hr class="hrBranco">';
						echo $_SESSION['msn'];
						unset($_SESSION['msn']);
						echo'<hr class="hrBranco">';
					}
					
				?>
				<div class="pl-4 pr-4">
							<button type="submit" class="btn btn-light form-control botõesMatricula mb-2">Alterar</button>
							<button type="submit" class="btn btn-light form-control botõesMatricula mb-3" formaction="../matriculas/controleMatriculas.php">Voltar</button>
				</div>
				</form>            
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
			</div>
		</div>
    </body>
            <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
     
</html>
