
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
		   <title>Pagina Professor</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="imagens/CesecLogo.png">
        <link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/Professor.css" >
    </head>
		<?php
		session_start();
		?>
    <body style="background-color:#65AFB2;">
		
		<nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
				<!-- Brand/logo -->
			<ul class="nav navbar-nav mx-auto">		
				<div class="navbar-brand">
					<a class="navbar-btn mx-auto"  href="paginaInicialProf.php">
						<img src="imagens/LogoProMenu.png" alt="logo" style="width:60px;">
					</a>	
						
					<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>		
				</div>	
				
				
				<div class="collapse navbar-collapse text-center" id="collapsibleNavbar">

					<ul class="navbar-nav">
									
						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="frequencia/controleFrequencia.php">Controle de Frequência</a>
						</li>
					</ul>
				</div>
			</ul>	
		</nav>
       <div class="pl-2 pr-2 mb-4 ">
			<div class="container corpoDasOpções mt-5 pt-2" style="">
			<hr class="hrBranco"/>
			<h2 class=" mb-3">Página do Professor</h2>
			<hr class="hrBranco"/>
			<form action="">
					<input type="submit" class="btn btn-light botõesOpções btn-block mb-3" value="Controle da Frequência" formaction="frequencia/controleFrequencia.php"/>
					
			</form>
			</div>
		</div>
	</body>
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        
    
</html>
