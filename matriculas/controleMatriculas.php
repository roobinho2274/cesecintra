<!DOCTYPE html>
<html>
    <head>
	<title>Página matrícula</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
    </head>
	<?php
	session_start();
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
					</ul>
				</div>
			</ul>	
		</nav>
       
		<div class="pl-2 pr-2">
			<div class = "container mt-5 mb-5"> 
				<form class="corpoDaMatricula pl-3 pr-3">
				<hr class="hrBranco">
				<h2>Matrículas</h2>
				<hr class="hrBranco">
					<input type="submit" class="btn btn-light botõesMatricula btn-block mb-3" value="Realizar matrícula" formaction="cadastraMat.php"/>
					<input type="submit" class="btn btn-light botõesMatricula btn-block mb-3" value="Consultar matrículas" formaction="listaMat.php"/>
					<input type="submit" class="btn btn-light botõesMatricula btn-block mb-3" value="Alterar dados da matrícula" formaction="alteraMat.php"/>
					<input type="submit" class="btn btn-light botõesMatricula btn-block mb-3" value="Deletar matrícula" formaction="deletaMat.php"/>
					<div class="text-center">
					<a class="btn btn-light strong form-control btnVoltarMatricula mb-3" href="../paginaInicialAdm.php"> Voltar</a>
					</div>
				  </form>
			</div>
		</div>
    </body>
	
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
       
</html>
