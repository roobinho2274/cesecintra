
<!DOCTYPE html>
<html>
    <head>
        <title>Alterar aluno</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >

    </head>
	<?php
    session_start();
    //Inclui os arquvis de conexão e funções
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
        <div class = "container mt-5 mb-5 corpoDoAluno">
		<h2 class="text-light strong mt-2">Alteração de dados do aluno</h2>

            <?php
            //verifica se o usuario pode estar aqui
            if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {


                //Atribuindo valor recebido por POST aos variaveis
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
                $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
                $nomedamae = filter_input(INPUT_POST, 'nomedamae', FILTER_SANITIZE_STRING);
                $nomedopai = filter_input(INPUT_POST, 'nomedopai', FILTER_SANITIZE_STRING);
                $tituloeleitor = filter_input(INPUT_POST, 'tituloEleitor', FILTER_SANITIZE_STRING);
                $reservista = filter_input(INPUT_POST, 'reservista', FILTER_SANITIZE_STRING);
                $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
                $estadocivil = filter_input(INPUT_POST, 'estadocivil', FILTER_SANITIZE_STRING);
                $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
                $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
                $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
                $numeroresidencia = filter_input(INPUT_POST, 'numeroResidencial', FILTER_SANITIZE_STRING);
                $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
                $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
                $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
                $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
                $grauensino = filter_input(INPUT_POST, 'grauensino', FILTER_SANITIZE_STRING);
                $orgaoexpedidor = filter_input(INPUT_POST, 'orgaoexpedidor', FILTER_SANITIZE_STRING);
                $turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
                $query = "UPDATE aluno SET rg = '$rg',cpf = '$cpf',nome = '$nome',orgaoExpedidor = '$orgaoexpedidor',mae = '$nomedamae', pai = '$nomedopai',tituloEleitor = '$tituloeleitor', reservista = '$reservista',sexo = '$sexo', estadoCivil = '$estadocivil',logradouro = '$logradouro',bairro = '$bairro',complemento = '$complemento',numeroResidencial = '$numeroresidencia',cidade = '$cidade',cep = '$cep',estado = '$estado',telefone = '$telefone',email = '$email',celular = '$celular',status = '$status',grauensino = '$grauensino', turno = '$turno' WHERE id = '$id'";
                //Executa a $query2 no banco através da função Executa
                $res = mysqli_query($con, $query);

                /*
                    Verifica se a inserção foi feita corretamente e direciona à outras 
                    paginas confome o res, também define a mensagem a ser exibida através 
                    da variável Global $_SESSION['msn']
                */
                
                if ($res) {
					echo' <hr class="hrBranco">';
                    Echo "<div class='alert alert-success text-center strong text-dark' role='alert'>
					Aluno Atualizado com sucesso
					</div>";
					echo' <hr class="hrBranco">';	
					
					echo '<div class="pl-4 pr-4 mb-2 mt-2">';
                    echo"<a class='btn btn-light form-control botõesAluno' href='../matriculas/cadastraMat.php' role='button'>Realizar matricula</a>";
                    echo "<a class='btn btn-light form-control botõesAluno' href='../aluno/controleAluno.php' role='button'>Voltar para menu</a>";
					echo '</div>';
					
                } else {
					echo' <hr class="hrBranco">';
                    $_SESSION['msg'] = "<div class='alert alert-danger text-center strong text-dark' role='alert'>Falha ao inserir o aluno</div>";
					echo' <hr class="hrBranco">';
                    header("Location: ../aluno/alterarAluno.php");
                }
            } else {
                echo $_SESSION['tipoUsuario'];
				echo' <hr class="hrBranco">';
                echo"<script class='text-center strong'>alert sem permissão de acesso</script>";
				echo' <hr class="hrBranco">';
                header("location: ../index.php");
            }
            //echo $query;
            ?>
		</div>
		 </div>
    </body>	
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>

</html>