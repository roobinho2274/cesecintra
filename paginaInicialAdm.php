
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
		   <title>Pagina Administrador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="imagens/CesecLogo.png">
		<?php
		session_start();
		?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/Professor.css" >
    </head>
    <body style="background-color:#65AFB2;">
		
		<nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
				<!-- Brand/logo -->
			<ul class="nav navbar-nav mx-auto">		
				<div class="navbar-brand">
					<a class="navbar-btn mx-auto"  href="paginaInicialAdm.php">
						<img src="imagens/LogoProMenu.png" alt="logo" style="width:60px;">
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
							<a class="nav-link text-light" href="professor/controleProfessor.php">Controle do Funcionário</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="disciplina/controleDisciplinas.php">Controle das Disciplinas</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="matriculas/controleMatriculas.php">Controle das Matriculas</a>
						</li>					

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="frequencia/controleFrequencia.php">Controle de Frequência</a>
						</li>
					</ul>
				</div>
			</ul>	
		</nav>
       
        <div class="container corpoDasOpções mt-5 pt-2" style="">
		<hr class="hrBranco"/>
		<h2 class=" mb-3">Página do Administrador</h2>
		<hr class="hrBranco"/>
		<form action="">
                <input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle Aluno" formaction="aluno/controleAluno.php"/>
                <input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle Servidor" formaction="professor/controleProfessor.php"/>
                <input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle Disciplinas" formaction="disciplina/controleDisciplinas.php"/>
                <input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle Matriculas" formaction="matriculas/controleMatriculas.php"/>
                <input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle Frequência" formaction="frequencia/controleFrequencia.php"/>
				<input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Menu de Relatorios" formaction="relatorios/opçoesrelatorios.php"/>

		</form>
		</div>
		
	</body>
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        
    
</html>
