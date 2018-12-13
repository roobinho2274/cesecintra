<?php
	session_start();
	include_once ("../funcoes.php");
	include_once ("../conexao.php");


	if (isset($_POST['sel'])) {
		foreach ($_POST['sel'] as $codigo) {

			$query = "DELETE FROM matricula WHERE id = $codigo";
    		//unset($_SESSION['sel']);
			$res = mysqli_query($con, $query); 
			
			if ($res) {
    			$_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Alterado com sucesso!</div>";
				header("Location: ../matriculas/listaMat.php");
			}else{
        		$_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao alterar!</div>";
				header("Location: ../matriculas/deletaMat.php");
			}
		}
	}else{
		header("Location: ../matriculas/deletaMat.php");
	}

					
?>
