
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		<title>Deleta Funcionários</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >

  

    </head>
	<?php
	session_start();
	include_once ("../funcoes.php");
	include_once ("../conexao.php");
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
							<a class="nav-link text-light" href="aluno/controleAluno.php">Controle do Aluno</a>
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
	
		<div class="container mt-5">
            

            <form action="delProf.php" method="POST" class="corpoDoDeletar">
			<hr class="hrBranco"/>
			<h2>Deletar cadastro do funcionário</h2>
			<hr class="hrBranco"/>
			<div class="MensagemDeletar mb-3">
			Selecione o funcionário desejado para deletar.
			</div>
                <div class="form-group row pl-2 pr-2">
                    <div class="col-lg-10 mx-auto">
                        <select class="form-control" name="disc">
                            <?php
                            /* Faz a busca por todos as disciplinas para preencher o select */
                            $query = "SELECT * FROM professor";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r['id'] . ">" ."<b>Nome: ". $r['nome'] . "   |   Ocupação: ".$r['tipo'];   
                            }
                            ?>
                        </select>
                    </div>
                </div>
			<?php
            /* Verifica se a variável global que indica falha na exclusão está
              Setada, o que indica uma falha na inserção no banco ou valor inválido */
            if (isset($_SESSION['msn'])) {
				echo '<hr class="hrBranco"/>';
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
				echo '<hr class="hrBranco"/>';
            }
            ?>
				<div class="form-group pl-5 pr-5">
                    <div class="text-center">
                        <button type="submit" class="btn botõesDeletar text-light strong form-control rounded mb-3">Excluir funcionario</button>
                        <button type="submit" class="btn botõesDeletar text-light strong form-control rounded" formaction="../professor/controleProfessor.php">Voltar</button>
                    </div>
                </div>
				
            </form> 
		</div>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
       
    </body>
</html>
