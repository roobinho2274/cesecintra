<!DOCTYPE html>
<html>
    <head>
		<title>Login</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
 
    </head>
	<?php
		//Inciai sessão
		session_start();
		//Inclui os arquivos de conexáo e funções
		include_once ("../conexao.php");
		include_once ("../funcoes.php");

		if ($_SESSION['tipoUsuario'] != 'adm') {
            echo $_SESSION['tipoUsuario'];
        	$_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
            header("location: ../index.php");
        }

		//Query para consulta no banco de todas as disciplinas
		$query = "SELECT * FROM disciplina";
		//Recebe o resultad da execução da query anterios pela função executa
		$resultado = mysqli_query($con, $query);
		//Mostra o resultado na tela
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
							<a class="nav-link text-light" href="../professor/controleProfessor.php">Controle dos Usuários</a>
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

                        <li class="nav-item botoesDoMenu ml-2 mr-2" style="background-color: #dc3545;">
                            <a class="nav-link text-light" href="../logout.php">Sair</a>
                        </li>
					</ul>
				</div>
			</ul>	
		</nav>
		<div class="pl-2 pr-2">
        <div class = "container mt-5 mb-3">
		<h2 class="strong text-center text-light mb-2">Lista de Disciplinas</h2>
                <div class="table-responsive corpoDaTable strong">
				<table class="table table-striped table-bordered">


                <thead class = "table-dark">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Curso</th>
                        <th scope = "col">Professor</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Turno</th>
                        <th scope = "col">horario</th>
                    </tr>
                </thead>
                <tbody><?php
                    while ($r = mysqli_fetch_assoc($resultado)) {
                        echo"<tr>"
                        . "<th scope = 'row'>" . $r['id'] . "</th>"
                        . "<td>" . $r['descricao'] . "</td>";

                        if ($r['idGrauEnsino'] == 1) {
                            echo "<td class='d-none d-md-table-cell'>Ensino Fundamental</td>";
                        } elseif ($r['idGrauEnsino'] == 2) {
                            echo "<td class='d-none d-md-table-cell'>Ensino Médio</td>";
                        } else {
                            echo "<td class='d-none d-md-table-cell'>Não encontrado</td>";
                        }
                        $queryProf = "SELECT professor.nome FROM professor WHERE professor.id =" . $r['idProf'] . ";";
                        $resProf = mysqli_fetch_assoc(executa($queryProf, $con));
                        echo "<td >" . $resProf['nome'] . "</td>";
                        if ($r['turno'] == 1) {
                            echo "<td class='d-none d-md-table-cell'>Matutino</td>";
                        } elseif ($r['turno'] == 2) {
                            echo "<td class='d-none d-md-table-cell'>Noturno</td>";
                        } else {
                            echo "<td class='d-none d-md-table-cell'>Não encontrado</td>";
                        }
                        
                        echo "<td>" . $r['horario'] . "</td>";

                        echo"</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
            <a class="btn btn-light form-control botõesDisciplina" href="../disciplina/controleDisciplinas.php" role="button">Voltar</a>
			</div>
			</div>
		</div>
   </body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
 
</html>

