<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de usuários</title>
        <link rel="shortcut icon" href="../imagens/CesecLogo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
   <script type="text/javascript">
       function show_div(){
           document.getElementById("select_disc").style.display = "block";
       }

       function hide_div(){
           document.getElementById("select_disc").style.display = "none";
       }

   </script>
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
		
		<div class="container">
             <form class="text-center mt-4 mb-3 p-2 corpoDoCadastro" action="CadProf.php" method="POST">
				<h2 class="text-center strong  mt-2 mb-2">Cadastro dos Usuários</h2>
				
				<hr class="hrBranco"/>
				<h5 class="text-center tamanhoDaMensagem mt-2 mb-2"> Preencha todos os campos para efetuar o cadastro dos usuários. </h5>
				<hr class="hrBranco"/>
				
                <h5 class="mt-2">Nome do usuário: </h5>
                <input type="text" class="form-control"  placeholder="Entre com o nome do usuário" name="nome" required> <br/>
				
				<h5> Login: </h5>
                <input type="text" class="form-control"  placeholder="Entre com o nome para login" name="login"  required> <br/> 
				
				<h5> Senha: </h5>
                <input type="password" class="form-control"  placeholder="Entre com a senha" name="senha" required> <br/>
				
				
				<fieldset id="grupoTipo"> 
				<h5>Ocupação:</h5>				
					<div class="tamanhoDoRadioOpçoes">
						<div class="pl-2 pr-2 strong" required>
							<input type="radio" onclick="show_div();" id="radio_disc" name="tipo" value="disciplina" >Disciplina </br>
                            <input type="radio" onclick="hide_div();" id="radio_adm" name="tipo" value="adm" required>Administrador(a)
                        </div>
					</div>
				</fieldset>

                 <div id="select_disc" style="display: none;">
                     <h5> Disciplina: </h5>
                     <select class="form-control" name="disciplina">
                         <option value="">Selecione a disciplina</option>

                         <?php
                         $query = "SELECT * FROM disciplina";
                         $resultado = mysqli_query($con, $query);
                         while($dados = mysqli_fetch_assoc($resultado)){
                             echo '<option value="'. $dados['id'] .'" >'. $dados['descricao'] .'</option>';
                         }
                         ?>

                     </select>

                 </div>

				
                <?php
                    echo '<div class="strong">';
                    if (isset($_SESSION['msn'])) {
                        echo $_SESSION['msn'];
                        unset($_SESSION['msn']);
                    }
                    echo '</div>';
                ?>

				<hr class="hrBranco"/>		
						
				<div class="form-group pl-5 pr-5">
                    <div class="text-center">
                        <button type="submit" class=" btn btn-light botaoPagCadastro strong form-control rounded mt-2 mb-2" >Cadastrar</button> 
                        <a class=" btn btn-light botaoPagCadastro strong form-control rounded " href="controleProfessor.php">Voltar</a>
                    </div>
                </div>
				
            </form>
        </div>
    </body>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
