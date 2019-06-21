
<!DOCTYPE html>
<html>
    <head> 
	<title>Matricula a ser alterada</title>
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    $id_disciplina = filter_input(INPUT_POST, 'disc7', FILTER_SANITIZE_NUMBER_INT);
    $id_aluno = filter_input(INPUT_POST, 'aluno7', FILTER_SANITIZE_NUMBER_INT);
    if ($id_aluno == "" || $id_disciplina == "") {
        header("Location: ../matriculas/alteraMat.php");
    }

    //String de alteração no banco
    $query = "SELECT * FROM matricula WHERE idAluno = $id_aluno AND idDisciplina = $id_disciplina";
    //execução da estring SQL e coloca o resultado em $res

    $r = mysqli_query($con, $query);
    $res = mysqli_fetch_assoc($r);
    $_SESSION['matricula'] = $res['id'];
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
							<a class="nav-link text-light" href="controleMatriculas.php">Controle das Matriculas</a>
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
        <div class="container mt-5 mb-5">

            <form action="altMatBD.php" method="POST" class="corpoDaMatricula">
                <!--
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Turno</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="turno">
                                <?php
                                    $sql4 = 'SELECT descricao FROM turno WHERE id = '.$res['idTurno'].'';
                                    $res4 = mysqli_query($con, $sql4);
                                    $r6 = mysqli_fetch_assoc($res4);
                                ?>

                                <option value="<?php echo $res['idTurno'] ?>"><?php  echo $r6['descricao']; ?></option>

                                <?php
                                    /* Faz a busca por todos as disciplinas para preencher o select */
                                    $query = 'SELECT * FROM turno WHERE id <> '.$res['idTurno'].'';
                                    $resultado = mysqli_query($con, $query);
                                    while ($r5 = mysqli_fetch_assoc($resultado)) {
                                        echo "<option value=" . $r5['id'] . ">" . $r5['descricao'] . "</option>";    
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                -->
				<hr class="hrBranco">
				<h2 class="text-center strong">MATRÍCULAS</h2>
				<hr class="hrBranco">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-12 text-center Mensagemmatricula">Matéria concluida:</legend>
                        <div class="col-lg-12 text-center strong">

                            <?php 
                                if ($res['dataConclusao'] == NULL) {
                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="sim">
                                            <label class="form-check-label" >
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="nao" checked>
                                            <label class="form-check-label">
                                                Não
                                            </label>
                                        </div>
                                    ';
                                }else{

                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="sim" checked>
                                            <label class="form-check-label" >
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conclusao" value="nao">
                                            <label class="form-check-label">
                                                Não
                                            </label>
                                        </div>
                                    ';
                                }

                            ?>
                        </div>
                    </div>
                </fieldset>
				<hr class="hrBranco">
                 <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-12 Mensagemmatricula text-center ">Status:</legend>
                        <div class="col-lg-12 text-center strong">

                            <?php 
                                if ($res['status'] == "INATIVO") {
                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="ATIVO">
                                            <label class="form-check-label" >
                                                Ativo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="INATIVO" checked>
                                            <label class="form-check-label">
                                                Inativo
                                            </label>
                                        </div>
                                    ';
                                }else{

                                    echo '
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="ATIVO" checked>
                                            <label class="form-check-label" >
                                                Ativo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="INATIVO">
                                            <label class="form-check-label">
                                                Inativo
                                            </label>
                                        </div>
                                    ';
                                }

                            ?>
                        </div>
                    </div>
                </fieldset>
				<hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-form-label col-lg-12 text-center Mensagemmatricula">Horário</label>
                    <div class="col-lg-12 text-center pl-5 pr-5 ">
                        <input type="time" class="HorarioSize form-control mx-auto " name="horario" value="<?php echo $res['horaAula'] ?>">
                    </div>
                </div>

            <!--
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">1º Nota</label>
                    <div class="col-sm-10"> 
                        <input type="number" step="any" min="0" class="form-control" name="nota1" value="<?php //echo $res['nota1'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">2º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota2" value="<?php //echo $res['nota2'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">3º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota3" value="<?php //echo $res['nota3'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">4º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota4" value="<?php //echo $res['nota4'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">5º Nota</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="nota6" value="<?php //echo $res['nota5'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Média</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" min="0" class="form-control" name="media" value="<?php //echo $res['media'] ?>">
                    </div>
                </div>
            -->
			<?php
					
					//Verifica se a variável global que indica falha na exclusão está setada, o que indica uma falha na inserção no banco ou valor inválido 
					if (isset($_SESSION['msn'])) {
						echo'<hr class="hrBranco">';
						echo $_SESSION['msn'];
						unset($_SESSION['msn']);
						echo'<hr class="hrBranco">';
					}
					
			?>
                <div class="pl-4 pr-4">
                        <button type="submit" class="btn btn-light botõesMatricula form-control mb-2">Alterar</button>
                        <button type="submit" class="btn btn-light botõesMatricula form-control mb-2" formaction="../matriculas/alteraMat.php">Voltar</button>
                        <button type="reset" class="btn btn-light botõesMatricula form-control mb-3" formaction="../matriculas/altMat.php">Redefinir</button>
                </div>
            </form> 
		</div>
		</div>
    </body>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
      
</html>
