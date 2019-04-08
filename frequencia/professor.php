<?php
	
	include_once("../conexao.php");

	$id_aluno = $_REQUEST['combobox_aluno'];
	
	$sql = "SELECT d.id, d.descricao, p.nome AS prof FROM `professor` AS p 
	JOIN matricula AS m ON m.idAluno = $id_aluno 
	JOIN disciplina AS d ON d.id = m.idDisciplina
	WHERE p.id = d.idProf ORDER BY d.descricao";

	$res = mysqli_query($con, $sql);

	while ($r = mysqli_fetch_assoc($res)) {
		$result[] = array(
			'id'   => $r['id'],
			'disciplina' => $r['descricao'],
			'prof' => $r['prof'],
		);
	}
	
	echo(json_encode($result));
?>