
<!DOCTYPE html>
<html>
    <head>
	    <title>Consulta de alunos cadastrados</title>
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
							<a class="nav-link text-light " href="controleAluno.php">Controle do Aluno</a>
						</li>

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light" href="../professor/controleProfessor.php">Controle do Funcionário</a>
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
		

        <div class="pl-2 pr-2">
        <div class="mt-5 mb-3 container corpoDoAluno ">	
		<hr class="hrBranco">
		<h2 class="text-light strong text-center">Tabela de alunos cadastrados</h2>
		<hr class="hrBranco">
	
            <?PHP
            if(isset($_SESSION['msg']))
                {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
            
	<div class="table-responsive corpoDaTableAlunos strong">
            <table class="table table-striped table-bordered corpoDaTableAlunos text-center">
                <thead class="table-dark text-light">
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Whatsapp</td>
                    <td>RG</td>
                    <td>Status</td>
                    <td colspan="2">Ações</td>
                </thead>

                <?php 
                    $sql = "SELECT nome,telefone,id,rg,status from aluno";   
                    $dados = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($dados)){
                        if($row['status'] == 1){
                            $status = "ATIVO"; 
                        }else{ 
                            $status = "INATIVO";
                        } 

                        if ($row['telefone'] == 0) {
                        	$whats = "";
                        }else{
                        	$whats = $row['telefone'];
                        }

                        echo '<tr class="strong text-center text-light"><td>'.$row['id'].'</td><td>'.$row['nome'].'</td><td>'.$whats.'</td><td>'.$row['rg'].'</td><td>'.$status.'</td>';
                        echo '<td><form method="post" action = "alterarAluno.php"><input type="hidden" value="'.$row['id'].'" name = "id"><input type = "submit" value="Alterar" class="form-control btn btn-light botõesAluno"></form></td>';
                        echo '<td><form method="post" action = "deleteAluno.php"><input type="hidden" value="'.$row['id'].'" name = "id"><input type = "submit" value="Deletar" class="form-control btn btn-light botõesAluno"></form></td>';
                        echo '</tr>';

                    }
                ?>
                
            </table>
            </div>
            <a class="btn btn-light form-control botõesAluno mt-4 mb-2" href="../aluno/controleAluno.php">Voltar</a>
        </div>
        <p id="usurHelp" class="form-text text-danger strong text-center ">*Ao deletar aluno, certifique-se de que não haja nenhum vínculo com as matrículas!</p>
    </div>
	</body>
	
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
</html>



