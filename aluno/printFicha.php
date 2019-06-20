<!DOCTYPE html>
<html>
	<head>
		<title>Consulta de alunos cadastrados</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="../imagens/CesecLogo.png">
	
        <style type="text/css">
        	
        	div{
        		margin-top:30vh;	
        		/*padding: 100px;*/
        		border: 2px solid black;
        	}
        	#foto{
        		float: right;
        	}

        </style>
	</head>
	<?php
	/*
	session_start();

	include_once ("../conexao.php");
	include_once ("../funcoes.php");

	if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
              

	$sql = "SELECT * FROM aluno WHERE id = '$id'";
	$res = mysql_query($con, $sql)
	*/
	?>

	<body>
		<?php
		//while($r = mysqli_fetch_assoc($res)){
		?>
			<div>
				<div id="foto">
				</div>
			</div>
		<?php
		//}
		?>
	</body>
</html>
