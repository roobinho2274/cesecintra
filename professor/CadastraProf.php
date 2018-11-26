<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de professores</title>
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
    <body>
		<?php
			session_start();
			include_once ("../funcoes.php");
			include_once ("../conexao.php");
			

         ?>
		<div class = "container ">
            <h2 class="text-center strong mt-2 mb-2">Professores</h2>
            <form class="text-center mt-3 bg-danger p-2" action="CadProf.php" method="POST">
			
				<label class="mt-2"><b>Nome completo</b></label>
                <input type="text" class="form-control"  placeholder="Entre com o nome completo" name="nome" required > <br/> 
				
				<label class=""><b>Login</b></label>
                <input type="text" class="form-control"  placeholder="Entre com o nome para login" name="login"  required> <br/> 
				
				<label class=""><b>Senha</b></label>
                <input type="password" class="form-control"  placeholder="Entre com a senha" name="senha" required  > <br/> 
				<?php
				echo '<div class="strong">';
				if (isset($_SESSION['msn'])) {
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);
				}
				echo '</div>';
				?>
				<div class="form-group ">
                    <div class="col-12 ">
                        <button type="submit" class="btn ">Cadastrar</button>
						<a   type="submit"  class="btn " href="controleProfessor.php">Voltar</a> 
                        
                    </div>
                </div>
					
            </form>
	
	
			
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
		
    </body>
</html>
