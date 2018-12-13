<?php
	
	include_once("../conexao.php");

	$id_aluno = $_REQUEST['combobox_aluno'];
	
	$sql = "SELECT * FROM matricula WHERE idAluno = $id_aluno ORDER BY idAluno";
	$res = mysqli_query($con, $sql);
	
	while ($r = mysqli_fetch_assoc($res) ) {
		
		$idDisciplin = $r['idDisciplina'];
			
		$nome = teste($con, $idDisciplin);
		
		$result[] = array(
			'id'   => $r['idDisciplina'],
			'nome' => $nome,
		);
	}
	
	echo(json_encode($result));
	
	function teste($con1, $idDisc){
		
		$sql2 = "SELECT * FROM disciplina WHERE id = $idDisc";
		$res2 = mysqli_query($con1, $sql2);
		$r2 = mysqli_fetch_assoc($res2);
		
		$resp = $r2['descricao'];
		
		return $resp;
		
	}
?>