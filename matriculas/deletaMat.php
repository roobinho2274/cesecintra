
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <title>Deleta matrículas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
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
		?>
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
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

                        <li class="nav-item botoesDoMenu ml-2 mr-2">
                            <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
                        </li>
					</ul>
				</div>
			</ul>	
		</nav>
	

        <div class="ml-2 mr-2">
		<div class="mt-5 container corpoDaMatricula">
		<hr class="hrBranco">
            <h3 class="text-center">Deletar Matrículas</h3>
		<hr class="hrBranco">
		<div class="Mensagemmatricula mb-3">
		Selecione o aluno para deletar suas matrículas.
		</div>
            <?php
            /* Verifica se a variável global que indica falha na exclusão está
              Setada, o que indica uma falha na inserção no banco ou valor inválido */
            if (isset($_SESSION['msn'])) {
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
            }
            ?>
            <form action="delMatrBD.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-center Mensagemmatricula">Alunos:</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" name="matr" id="combobox_aluno">
                            <option value="">Selecione o aluno</option>
                            <?php 
                                $sql = "SELECT * FROM aluno ORDER BY nome";
                                $res = mysqli_query($con, $sql);
                                while($r = mysqli_fetch_assoc($res) ) {
                                    $sql2 = "SELECT * FROM matricula WHERE idAluno = '".$r['id']."'";
                                    $res2 = mysqli_query($con, $sql2);
                                    $r2 = mysqli_fetch_assoc($res2);
                                    if ($r2) {
                                        echo '<option value="'.$r['id'].'">'.$r['nome'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
		
                <div class="input-group mb-3">
                    <div class="input-group-prepend strong mx-auto" id="div_checkbox"></div>
                </div>
				<hr class="hrBranco">
				<div class="form-group pl-5 pr-5">
                    <div class="text-center">
                        <button type="submit" class="btn botõesDeletar text-light strong form-control rounded mb-2">Excluir</button>
                        <button type="submit" class="btn botõesDeletar text-light strong form-control rounded" formaction="../matriculas/controleMatriculas.php">Voltar</button>
                    </div>
                </div>
				
            </form> 

            <script type="text/javascript">
                $(function(){
                    $('#combobox_aluno').change(function(){
                        //alert("asdas");
                        if( $(this).val() ) {
                            $.getJSON('matriculasD.php?search=',{combobox_aluno: $(this).val(), ajax: 'true'}, function(j){
                                var checkbox = ''; 
                                for (var i = 0; i < j.length; i++) {
                                    checkbox += '<div class="input-group-text ml-1"><input type="checkbox" aria-label="Checkbox for following text input" value="' + j[i].id + '" name="sel[]">' + j[i].nome + '</div>';
                                }   
                                $('#div_checkbox').html('').show();
                                $('#div_checkbox').html(checkbox).show();
                            });
                        } else {
                            $('#div_checkbox').html('').show();
                        }
                    });
                });
            </script>
			</div>
           </div>
    </body> 
           <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
       
</html>
