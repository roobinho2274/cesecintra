<!DOCTYPE html>
<html>
    <head>
	    <title>Alterar frequência</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/Professor.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    if ($_SESSION['tipoUsuario'] !='adm' && $_SESSION['tipoUsuario'] !='professor') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }

    if (isset($_SESSION['msn'])) {
		echo '<hr class="hrBranco">';
        echo $_SESSION['msn'];
        unset($_SESSION['msn']);
		echo '<hr class="hrBranco">';
    }

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    $query = "SELECT f.*, a.nome AS aluno, d.descricao AS disciplina FROM frequencia AS f
			JOIN disciplina AS d ON f.idDisciplina = d.id
			JOIN aluno AS a ON a.id = f.idAluno WHERE f.id='$id'";
    $dado = mysqli_query($con, $query);

    while ($r = mysqli_fetch_assoc($dado)){

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
							<a class="nav-link text-light " href="controleFrequencia.php">Controle de Frequência</a>
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
            <div class="mt-5 mb-3 container corpoFrequencia">
        		<hr class="hrBranco"/>
                <h2  class="mb-3">Alterar frequência</h2>
        		<hr class="hrBranco"/>
        		<form action="altFreq.php" method="POST" class="strong text-center">    
                    
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Aluno:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="aluno" id="combobox_aluno" required>
                                <option value="<?php echo $r['idAluno']; ?>"><?php echo $r['aluno']; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Disciplina:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="disciplina" id="combobox_professor" required>
                                <option value="<?php echo $r['isDisciplina'];?>"><?php echo $r['disciplina'];?></option>
                            </select>
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Carga horária:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $r['horas'];?>" placeholder="Ex: 20:00" name="horas" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 row">
                            <label class="col-lg-2 col-form-label MensagemDisciplina text-center">Mês: </label>
                            <div class="col-lg-4">
                                <select name="mes" class="form-control">
                                    <?php
                                    $meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

                                    foreach ($meses as $mes){
                                        if($mes == $r['mes']) $selected = 'selected'; else $selected = '';
                                        echo '<option value="'.$mes.'" '.$selected.'>'.$mes.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 row">
                            <label class="col-lg-3 col-form-label MensagemDisciplina text-center">Ano:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" value="<?php echo $r['ano'];?>" name="ano" disabled>
                            </div>
                        </div>
                    </div>
	                <?php
	                if (isset($_SESSION['msn'])) {
	        			echo'<hr class="hrBranco"/>';
	                    echo $_SESSION['msn'];
	                    unset($_SESSION['msn']);
	        			echo'<hr class="hrBranco"/>';				
	                }
	                ?>
                    <input type="hidden" value="<?php echo $r['id']?>" name="idFreq">
                    <div class=" pl-5 pr-5">
                        <button type="submit" class="btn btn-light botoesFrequencia btn-block mb-2">Alterar</button>
                        <a class="btn btn-light botoesFrequencia btn-block mb-3" href="listaFrequencia.php">Voltar</a>
                    </div>
                </form> 
        	</div>
	    </div>
    </body>
    <?php
    }
    ?>
    <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>