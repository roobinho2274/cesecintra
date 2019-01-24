<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
		<title>Lista de Matrícula</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
      
    </head>
	<?php
	//Inciai sessão
	session_start();
	//Inclui os arquivos de conexáo e funções
	include_once ("../conexao.php");
	include_once ("../funcoes.php");

	//Query para consulta no banco de todas as disciplinas
	$query = "SELECT * FROM matricula ORDER BY id";
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
	
        <div class="container mt-5">
		<h2 class="text-light mb-3">Lista de Matrículas</h2>
                <div class="table-responsive corpoDaTable strong">
				<table class="table table-striped table-bordered">
                
                
                <thead class = "table-dark">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col">Disciplina</th>
                        <th scope = "col">Horário</th>
                        <th scope = "col">Status</th>
                        <th scope = "col">Data Matrícula</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 1</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 2</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 3</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 4</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 5</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Média</th>
                        <!--
                            <th scope = "col">Turno</th>
                            <th scope = "col">Professor</th>
                        -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($r = mysqli_fetch_assoc($resultado)) {
                            echo"<tr>"
                            . "<th scope = 'row'>" . $r['id'] . "</th>";
                            // . "<td>" . $r['descricao'] . "</td>";
                            $queryAluno = "SELECT nome FROM aluno WHERE id =" . $r['idAluno'] . ";";
                            $resAluno = mysqli_fetch_assoc(executa($queryAluno, $con));
                            echo "<td >" . $resAluno['nome'] . "</td>";

                            $queryDisciplina = "SELECT descricao FROM disciplina WHERE id =" . $r['idDisciplina'] . ";";
                            $resDisciplina = mysqli_fetch_assoc(executa($queryDisciplina, $con));
                            echo "<td >" . $resDisciplina['descricao'] . "</td>";

                            //$queryTurno = "SELECT descricao FROM turno WHERE id =" . $r['idTurno'] . ";";
                            //$resTurno = mysqli_fetch_assoc(executa($queryTurno, $con));
                            //echo "<td >" . $resTurno['descricao'] . "</td>";

                            echo "<td>".$r['horaAula']."</td>";

                            echo "<td>".$r['status']."</td>";

                            echo "<td>".$r['dataMatricula']."</td>";
                    
                            echo "<td class='d-none d-md-table-cell'>".$r['nota1']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota2']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota3']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota4']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota5']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['media']."</td>";

                            echo"</tr>";
                            /*
                                if ($r['idGrauEnsino'] == 1) {
                                    echo "<td class='d-none d-md-table-cell'>Ensino Médio</td>";
                                } elseif ($r['idGrauEnsino'] == 2) {
                                    echo "<td class='d-none d-md-table-cell'>Ensino Fundamental</td>";
                                } else {
                                    echo "<td class='d-none d-md-table-cell'>Não encontrado</td>";
                                }
                                
                                $queryProf = "SELECT professor.nome FROM professor WHERE professor.id =" . $r['idProf'] . ";";
                                $resProf = mysqli_fetch_assoc(executa($queryProf, $con));
                                echo "<td >" . $resProf['nome'] . "</td>";  
                            */
                        }
                    ?>
                </tbody>
            </table>
			<?php
                    //Verifica se a variável global de mensagem está setada, a exibe e depois limpa
					echo'<div class="text-center">';
                    if (isset($_SESSION['msn'])) {
						echo '<hr class="hrBranco">';
                        echo $_SESSION['msn'];
                        unset($_SESSION['msn']);
						echo '<hr class="hrBranco">';
                    }
					echo'</div>';
                ?>
			<div class="mx-auto">
				<a class="btn btn-light botaoVoltar strong form-control mt-1" href="../matriculas/controleMatriculas.php">Voltar</a>
			</div>
        </div>
		</div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

