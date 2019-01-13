<!DOCTYPE html>
<html>
    <head>
        <title>Controle dos Funcionários</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
							<a class="nav-link text-light " href="aluno/controleAluno.php">Controle do Aluno</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="controleProfessor.php">Controle do Funcionário</a>
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
            <form class="text-center mt-5  p-2 corpodasOpcpoes">
			<hr class="hrBranco"/>
			<h2 class="text-center strong mt-2 mb-2 text-light">Funcionários</h2>
			<hr class="hrBranco"/>
                 <input type="submit" class="mt-4 btn botoesOpcao btn-block strong mb-4 btn-light" value="Cadastrar novo funcionários" formaction="CadastraProf.php"/>
                 <input type="submit" class="btn botoesOpcao btn-block strong mb-4 btn-light" value="Consultar os funcionários cadastrados" formaction="listaProfessor.php"/>
                 <input type="submit" class="btn botoesOpcao btn-block strong mb-4 btn-light" value="Alterar os dados dos funcionários" formaction="alteraProf.php"/>
                 <input type="submit" class="btn botoesOpcao btn-block strong mb-4 btn-light" value="Deletar funcionários" formaction="deletaProf.php"/>
				
				<div class="mb-3">
				 <a class="btn btnVoltarMENUADM btn-light strong form-control" href="../paginaInicialAdm.php"> Voltar</a>
				 </div>
				 
            </form>
			
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
		
    </body>
</html>
