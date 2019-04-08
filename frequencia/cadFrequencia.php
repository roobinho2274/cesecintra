<!DOCTYPE html>
<html>
    <head>
	    <title>Cadastro de frequência</title>
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
							<a class="nav-link text-light" href="../matriculas/controleMatriculas.php">Controle das Matriculas</a>
						</li>					

						<li class="nav-item botoesDoMenu ml-2 mr-2">
							<a class="nav-link text-light " href="controleFrequencia.php">Controle de Frequência</a>
						</li>

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
                        </li>
					</ul>
				</div>
			</ul>	
		</nav>
		<div class="pl-2 pr-2">
            <div class="mt-5 mb-3 container corpoFrequencia">
        		<hr class="hrBranco"/>
                <h2  class="mb-3">Lançar frequência</h2>
        		<hr class="hrBranco"/>
        		<div class="MensagemFrequencia mb-3">
        			Selecione o aluno e o professor para lançar a frequência.
        		</div>
                <form action="cadFreq.php" method="POST" class="strong text-center">
                    
                     <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Aluno:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="aluno" id="combobox_aluno" required>
                                <option value="">Selecione o aluno</option>
                                <?php
                                /*Faz a busca por todos os usuários do tipo porfessor no banco
                                e preenche um select*/
                                $query = "SELECT * FROM aluno ORDER BY nome";
                                $resultado = executa($query, $con);
                                while ($r = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- 
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-lg-2 pt-0">Modalidade:</legend>
                            <div class="col-lg-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ensino" value="1" checked>
                                    <label class="form-check-label" >
                                        Ensino Medio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ensino" value="2">
                                    <label class="form-check-label">
                                        Ensino Fundamental
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    -->

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Disciplina:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="prof" id="combobox_professor" required>
                                <option value="" >Selecione a disciplina</option>
                                <!-- ajax preenche -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Carga horária:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ex: 20:00" name="horas" required>
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
                    <div class=" pl-5 pr-5">
                        <button type="submit" class=" btn btn-light botoesFrequencia btn-block mb-2">Dar presença</button>
                        <a class="btn btn-light botoesFrequencia btn-block mb-3" href="controleFrequencia.php">Voltar</a>
                    </div>
                </form> 
        	</div>
	    </div>
        <script type="text/javascript">
            $(function(){
                $('#combobox_aluno').change(function(){
                    if( $(this).val() ) {
                        $.getJSON('professor.php?search=',{combobox_aluno: $(this).val(), ajax: 'true'}, function(j){
                            var options = '<option value="">Selecione a disciplina</option>'; 
                            for (var i = 0; i < j.length; i++) {
                                options += '<option value="' + j[i].id + '">' + j[i].disciplina + ' - ' + j[i].prof + '</option>';
                            }   
                            $('#combobox_professor').html(options).show();
                        });
                    } else {
                        $('#combobox_professor').html('<option value="">Selecione a disciplina</option>');
                    }
                });
            });
        </script>
    </body>
    <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        
</html>
