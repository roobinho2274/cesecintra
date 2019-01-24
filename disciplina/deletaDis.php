<!DOCTYPE html>
<html>
    <head>
		<title>Deleta disciplinas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >    
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
							<a class="nav-link text-light" href="controleDisciplinas.php">Controle das Disciplinas</a>
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
		
		<div class="pl-2 pr-2">
        <div class=" mt-5 mb-2 container corpoDaDisciplina">
			<hr class="hrBranco">
				<h5>DISCIPLINAS</h5>
			<hr class="hrBranco">

            <form action="delDisc.php" method="POST">
                <div class="form-group row mx-auto">
                    <label class="col-lg-2 col-sm-12 col-form-label MensagemDisciplina">Disciplinas:</label>
                    <div class="col-lg-10 col-sm-12">
                        <select class="form-control" name="disc">
                            <?php
                            /* Faz a busca por todos as disciplinas para preencher o select */
                            $query = "SELECT * FROM disciplina";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                if ($r['idGrauEnsino'] == 1) {
                                    echo "<option value=" . $r['id'] . ">" . $r['descricao'] . " - Ensino Fundamental</option>";
                                } elseif ($r['idGrauEnsino'] == 2) {
                                    echo "<option value=" . $r['id'] . ">" . $r['descricao'] . " - Ensino Médio</option>";
                                }
                            }
                            ?>
                        </select>
                    <small id="usurHelp" class="form-text ml-1 text-danger strong ">Certifique-se de não haver matrículas nessa disciplina!</small>
                    </div>
                </div>
				<?php
					/*Verifica se a variável global que indica falha na inserção está
					Setada, o que indica uma falha na inserção no banco*/
					echo'<div class="text-center">';
					if (isset($_SESSION['msn'])) {
						echo '<hr class="hrBranco">';
						echo $_SESSION['msn'];
						unset($_SESSION['msn']);
						echo '<hr class="hrBranco">';
					}
					echo'</div>';
				?>
				<hr class="hrBranco">
                <div class="pl-4 pr-4">
                        <button type="submit" class="btn btn-light form-control botõesDisciplina mt-2">Excluir</button>
                        <button type="submit" class="btn btn-light form-control botõesDisciplina mt-2 mb-3" formaction="../disciplina/controleDisciplinas.php">Voltar</button>
                </div>
            </form> 
		</div>
		</div>
    </body>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
       
</html>
