<?php
	
	include_once("../conexao.php");

	$id_aluno = $_REQUEST['combobox_aluno'];
	
	$sql = "SELECT * FROM disciplina ORDER BY descricao";
	$res = mysqli_query($con, $sql);

	$modalidade = getModalidade($con, $id_aluno);
	
	while ($r = mysqli_fetch_assoc($res) ) {
		
		$grau = $r['idGrauEnsino'];
		$disciplina = $r['id'];
		$matricula = isMatricula($con, $id_aluno, $disciplina);

		if ($grau == $modalidade && !$matricula) {
			$result[] = array(
				'id'   => $r['id'],
				'nome' => $r['descricao'],
			);	
		}
			
	}
	
	echo(json_encode($result));
	
	function getModalidade($con1, $idAluno){
		
		$sql2 = "SELECT * FROM aluno WHERE id = $idAluno";
		$res2 = mysqli_query($con1, $sql2);
		$r2 = mysqli_fetch_assoc($res2);
		
		$resp = $r2['grauensino'];
		
		return $resp;
	}

	function isMatricula($con2, $idAluno1, $idDisciplina){

		$sql3 = "SELECT * FROM matricula WHERE idAluno = $idAluno1 AND idDisciplina = $idDisciplina";
		$res3 = mysqli_query($con2, $sql3);
		$r3 = mysqli_fetch_assoc($res3);


		if ($r3) {
			return true;
		}else{
			return false;
		}
	}
?>