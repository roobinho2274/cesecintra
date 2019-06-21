<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de professores</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
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
						</br>		
						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../aluno/controleAluno.php">Controle do Aluno</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="controleProfessor.php">Controle dos Usuários</a>
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

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
						</li>
					</ul>
				</div>
			</ul>	
		</nav>
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
	<div class="pr-2 pl-2">	 
	<div class="container  p-1 mt-5 mb-3  rounded corpoDoAlterar strong">	 
		 <form action="altProf.php" method="POST">
		 <hr class="hrBranco"/>
		 <h2 class="text-center mt-1"> Alterar dados dos funcionários </h2>
		 <hr class="hrBranco"/>
		 <div class="tamanhoDaMensagem text-center">Selecione o funcionario desejado para alterar seus dados.</div>
                <div class="form-group row mt-4 pr-4 pl-4">
                    
                        <select class="form-control " name="nome">
                            <?php
                            /* Faz a busca por todos as disciplinas para preencher o select */
                            $query = "SELECT * FROM professor";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] .	"  -  "	. $r['tipo']."</option>";               
                            }
                            ?>
                        </select>
					<?php
					 if (isset($_SESSION['msn'])) {
						echo' <hr class="hrBranco"/>';
						echo $_SESSION['msn'];
						unset($_SESSION['msn']);
						echo' <hr class="hrBranco"/>';
					}
					?>
					
                </div>
				
                <div class="form-group row">
                    <div class="col-sm-12 text-center pl-5 pr-5">
                        <button type="submit" class="rounded botões btn btn-light strong form-control mt-2" >Alterar dados</button>
                        <button type="submit" class="rounded botões btn btn-light strong form-control mt-3" formaction="../professor/controleProfessor.php">Voltar</button>

                    </div>
                </div>
        </form> 
 
	</div >
	</div>
    </body> 
	<script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
