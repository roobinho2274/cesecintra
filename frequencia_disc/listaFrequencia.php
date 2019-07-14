<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tabela da frequencia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
    </head>
<?php
	session_start();
	include_once ("../conexao.php");
	include_once ("../funcoes.php");

	if ($_SESSION['tipoUsuario'] != 'disciplina') {
	    echo $_SESSION['tipoUsuario'];
	    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login como professor!</div>";
	    header("location: ../index.php");
	}

	$query = "SELECT f.*, a.nome AS aluno, d.descricao AS disciplina FROM frequencia AS f
			JOIN disciplina AS d ON f.idDisciplina = d.id
			JOIN aluno AS a ON a.id = f.idAluno WHERE idDisciplina = ".$_SESSION['usuario_disciplina_id'];

	$resultado = mysqli_query($con, $query);


?>
	<body style="background-color:#65AFB2;">
        <nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
            <div class="navbar-brand w-100 d-flex">
                <a class="navbar-btn mx-auto"  href="controleFrequencia.php">
                    <img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
                </a>
                <div class="nav-item botoesDoMenu ml-2 mr-2 position-absolute" style="right: 1%;background-color: #dc3545;">
                    <a class="nav-link text-light"  href="../logout.php">Sair</a>
                </div>
            </div>
        </nav>
        <h2 class="mt-2" style="font-weight: bold; color: white;"><?php echo $_SESSION['usuario_disciplina']?></h2>

        <div class="pl-2 pr-2">
	        <div class = "container mt-5 mb-3">
				<h2 class="strong text-center text-light mb-2">Lista de Frequencias</h2>
            	<div class="table-responsive corpoDaTable strong">
					<table class="table table-striped table-bordered">
		                <thead class = "table-dark text-center">
		                    <tr>
		                        <th scope = "col">ID</th>
		                        <th scope = "col">Aluno</th>
		                        <th scope = "col">Disciplina</th>
		                        <th scope = "col">Frequência</th>
		                        <th scope = "col">Mês</th>
		                        <th scope = "col">Ano</th>
		                        <th scope = "col" colspan="2">Ações</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php
		                    while ($r = mysqli_fetch_assoc($resultado)) {
		                        echo"<tr>"
		                        . "<th scope = 'row'>" . $r['id'] . "</th>"
		                        . "<td>" . $r['aluno'] . "</td>"
		                        . "<td>" . $r['disciplina'] . "</td>"
		                        . "<td>" . $r['horas'] . "</td>"
		                        . "<td>" . $r['mes'] . "</td>"
		                        . "<td>" . $r['ano'] . "</td>"
		                        . "<td>" . '<form method="post" action="alterarFreq.php"><input type="hidden" value="'.$r['id'].'" name = "id"><input type = "submit" value="Alterar" class="form-control btn btn-light botõesAluno"></form>'."</td>"
		                        . "<td>" . '<form method="post" action="deletarFreq.php"><input type="hidden" value="'.$r['id'].'" name = "id"><input type = "submit" value="Deletar" class="form-control btn btn-light botõesAluno"></form>' . "</td>"
		                        . "</tr>";
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
            		<a class="btn btn-light form-control botõesDisciplina" href="controleFrequencia.php" role="button">Voltar</a>
				</div>
			</div>
		</div>
    </body>
</html>
