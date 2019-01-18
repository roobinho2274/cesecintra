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
	<?php
	//Inciai sessão
	session_start();
	//Inclui os arquivos de conexáo e funções
	include_once ("../conexao.php");
	include_once ("../funcoes.php");

	//Query para consulta no banco de todas as disciplinas
	$query = "SELECT * FROM professor";
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
						</br>		
						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../aluno/controleAluno.php">Controle do Aluno</a>
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
		
		<div class="container mb-3 mt-1">

			
               <h2 class="mt-5 mb-3 text-light">Lista de Funcionários</h2>
                <div class="table-responsive corpoDaTable strong">
				<table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col">Login</th>
                        <th scope = "col">Senha</th>
						<th scope = "col">Função</th>
                    </tr>
                </thead>
                <?php
                    while ($r = mysqli_fetch_assoc($resultado)) {
                        echo'<tr class="text-center">'
                        . "<th scope = 'row'>" . $r['id'] . "</th>"
                        . "<td>" . $r['nome'] . "</td>"
						. "<td>" . $r['login'] . "</td>"
						. "<td>" . $r['senha'] . "</td>"
						. "<td>" . $r['tipo'] . "</td>";
                        echo"</tr>";
                    }
                    ?>
			
            </table>
				<?php
                //Verifica se a variável global de mensagem está setada, a exibe e depois limpa
                if (isset($_SESSION['msn'])) {
					echo '<hr class="hrBranco"/>';
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
					echo '<hr class="hrBranco"/>';
                }		
                ?>
				<div class="mx-auto">
				<a class="btn btn-light botaoVoltar strong form-control mt-1" href="../professor/controleProfessor.php">Voltar</a>
				</div>
			</div>
			</div>
		
		
			
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        
		
    </body>
</html>
