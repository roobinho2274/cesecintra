<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dados do funcionario a ser editado</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
	<?php
		session_start();
		include_once ("../funcoes.php");
		include_once ("../conexao.php");
		if ($_SESSION['tipoUsuario'] != 'adm') {
            echo $_SESSION['tipoUsuario'];
        	$_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
            header("location: ../index.php");
        }
		//Recebe o código da disciplina a ser alterada
		$cod = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_NUMBER_INT);
		//String de alteração no banco
		$query = "SELECT * FROM professor WHERE id = $cod";
		//execução da estring SQL e coloca o resultado em $res

		$r = mysqli_query($con, $query);
		$res = mysqli_fetch_assoc($r);
		$_SESSION['funcionario'] = $res['id'];
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

		 <div class="container mt-5 mb-3">
		 <form action="altProfBD.php" method="POST" class="corpoDoAlterar pr-3 pl-3 mx-auto">
			
			<div class="text-center">
			<hr class="hrBranco"/>
			<h2> Dados do funcionario </h2>
			<hr class="hrBranco"/>
			</div>
			
                <div class="form-group row mx-auto">
                    <label class="col-sm-12 col-form-label LabelAlterar">Nome do Usuário:</label>
                    <div class="col-lg-10 mx-auto">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $res['nome'] ?>">
                    </div>
                </div>
				
                <div class="form-group row mx-auto">
                    <label class="col-sm-12 col-form-label LabelAlterar">Login:</label>
                    <div class="col-lg-10 mx-auto">
                        <input type="text" class="form-control" placeholder="Usuário" name="login" value="<?php echo $res['login'] ?>">
                    </div>
                </div>
				
                <div class="form-group row mx-auto">
                    <label class="col-sm-12 col-form-label LabelAlterar">Senha:</label>
                    <div class="col-lg-10 mx-auto">
                        <input type="text" class="form-control" placeholder="Senha" name="senha" value="<?php echo $res['senha'] ?>">
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <label class="col-sm-12 col-form-label LabelAlterar">Função:</label>
                    <select name="tipo" class="col-lg-10 mx-auto form-control">
                        <option value=""></option>
                        <option value="adm" <?php if ($res['tipo'] == 'adm') echo 'selected'; ?>>Administrador</option>
                        <option value="disciplina" <?php if ($res['tipo'] == 'disciplina') echo 'selected'; ?>>Disciplina</option>
                    </select>
                </div>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-light botões strong form-control rounded mt-2 mb-3">Alterar dados</button>
                    <button type="submit" class="btn btn-light botões strong form-control rounded mb-3" formaction="../professor/alteraProf.php">Voltar</button>

                </div>
            </form> 
 </div>
    </body> 
	<script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
