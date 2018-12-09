<?php
	session_start();
	include_once ("../funcoes.php");
	include_once ("../conexao.php");

	foreach ($_POST['sel'] as $codigo) {
		$query = "DELETE FROM matricula WHERE id = $codigo";
		$res = mysqli_query($con, $query); 
		if ($res) {
			header("Location: ../matriculas/controleMatriculas.php");
		}else{
			header("Location: ../matriculas/delMatr.php");
		}
	}

?>
