
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8"> 
		<title>Opções de relatorios</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >   
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
 
        <div class="container">
				<div class="corpoRelatorio mt-3 pt-2">
				<hr class="hrBranco"/>
				<h2 class=" mb-3">Relatorios</h2>
				<hr class="hrBranco"/>
			<form action="" class="pl-2 pr-2">
					<input type="submit" class="btn btn-light botoesRelatorio btn-block mb-3" value="Relatorio de aluno para matriculas" formaction="alunoXmatricula.php"/>
					<input type="submit" class="btn btn-light botoesRelatorio btn-block mb-3" value="Relatorio de aluno para disciplina" formaction="alunoXdisciplina.php"/>
					<input type="submit" class="btn btn-light botoesRelatorio btn-block mb-3" value="Relatorio de aluno por nivel" formaction="alunoXnivel.php"/>
					<input type="submit" class="btn btn-light botoesRelatorio btn-block mb-3" value="Relatorio de aluno concluintes" formaction="#"/>
					<input type="submit" class="btn btn-light botoesRelatorio btn-block mb-3" value="Relatorio de Frequência" formaction="#"/>
					<div class="text-center mx-auto">
					<input type="submit" class="btn btnVoltar btn-light strong form-control" value="Voltar" formaction="../paginaInicialAdm.php"/>
					</div>
			</form>
			</div>
		</div>
		
	</body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    
</html>

