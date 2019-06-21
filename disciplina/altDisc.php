<!DOCTYPE html>
<html>
    <head>
		<title>Disciplina a ser alterada</title>
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

    //Recebe o código da disciplina a ser alterada
    $cod = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_NUMBER_INT);
    //String de alteração no banco
    $query = "SELECT * FROM disciplina WHERE id = $cod";
    //execução da estring SQL e coloca o resultado em $res

    $r = mysqli_query($con, $query);
    $res = mysqli_fetch_assoc($r);
    $_SESSION['disciplina'] = $res['id'];
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
	
        <div class="container mt-5 mb-3 corpoDaDisciplina">
		
			<hr class="hrBranco">
				<h2>Alterar disciplina</h2>
			<hr class="hrBranco">
			
			<div class="MensagemDisciplina mb-3">
				Preencha os campos a serem alterados.
			</div>
			
            <form action="altDisBD.php" method="POST" class="text-center pl-2 pr-2">
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label MensagemDisciplina">Nome</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control " placeholder="Nome" name="nome" value="<?php echo $res['descricao'] ?>">
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-12 mt-2 MensagemDisciplina">Modalidade</legend>
                        <div class="col-sm-12 strong">
                            <?php
                            if ($res['idGrauEnsino'] == 1) {
                                echo "<div class='form-check'>
                                          <input class='form-check-input' type='radio' name='ensino' value='1' checked>
                                            <label class='form-check-label' >
                                                Ensino Fundamental
                                            </label>
                                    </div>
                                    <div class = 'form-check'>
                                          <input class = 'form-check-input' type = 'radio' name = 'ensino' value = '2'>
                                            <label class = 'form-check-label'>
                                                Ensino Medio
                                            </label>
                                    </div>";
                            } elseif ($res['idGrauEnsino'] == 2) {
                                echo "<div class='form-check'>
                                          <input class='form-check-input' type='radio' name='ensino' value='1'>
                                            <label class='form-check-label' >
                                                Ensino Fundamental
                                            </label>
                                    </div>
                                    <div class = 'form-check'>
                                          <input class = 'form-check-input' type = 'radio' name = 'ensino' value = '2' checked>
                                            <label class = 'form-check-label'>
                                                Ensino Medio
                                            </label>
                                    </div>";
                            }
                            ?> 
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-12 mt-2 MensagemDisciplina">Modalidade</legend>
                        <div class="col-sm-12 strong">
                            <?php
                            if ($res['turno'] == 1) {
                                echo "<div class='form-check'>
                                          <input class='form-check-input' type='radio' name='turno' value='1' checked>
                                            <label class='form-check-label' >
                                                Matutino
                                            </label>
                                    </div>
                                    <div class = 'form-check'>
                                          <input class = 'form-check-input' type = 'radio' name = 'turno' value = '2'>
                                            <label class = 'form-check-label'>
                                                Noturno
                                            </label>
                                    </div>";
                            } elseif ($res['turno'] == 2) {
                                echo "<div class='form-check'>
                                          <input class='form-check-input' type='radio' name='turno' value='1'>
                                            <label class='form-check-label' >
                                                Matutino
                                            </label>
                                    </div>
                                    <div class = 'form-check'>
                                          <input class = 'form-check-input' type = 'radio' name = 'turno' value = '2' checked>
                                            <label class = 'form-check-label'>
                                                Noturno
                                            </label>
                                    </div>";
                            }
                            ?> 
                        </div>
                    </div>
                </fieldset>
                <?php ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label mt-2 MensagemDisciplina">Professor</label>
                    <div class="col-sm-12 strong">

                        <select class="form-control" name="prof">
                            <?php
                            /* Faz a busca por todos os usuários do tipo porfessor no banco
                              e preenche um select */
                            $query2 = "SELECT * FROM professor WHERE professor.tipo = 'professor'";
                            $resultado = executa($query2, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                if ($r['id'] == $res['idProf']) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                } else {
                                    $str .= "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                }
                            }
                            echo $str;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-sm-12 col-form-label mt-2 MensagemDisciplina">Horário</label>
                    <div class="col-sm-12">
                        <input type="time" class="form-control HorarioSizeDis mx-auto" name="horario" value="<?php echo $res['horario'] ?>">
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
                <div class="pl-4 pr-4">
                        <button type="submit" class="btn btn-light botõesDisciplina form-control mt-2">Alterar</button>
                        <button type="submit" class="btn btn-light botõesDisciplina form-control mt-2 mb-3" formaction="../disciplina/controleDisciplinas.php">Voltar</button>
                </div>
            </form> 
		</div>
	</div>
    </body>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
      
</html>
