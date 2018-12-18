<?php
	
	include_once("../conexao.php");

	$id_aluno = $_REQUEST['combobox_aluno'];
	
	$sql = "SELECT * FROM disciplina ORDER BY descricao";
	$res = mysqli_query($con, $sql);

	$modalidade = getModalidade($con, $id_aluno);
	$turno = getTurno($con, $id_aluno);	
	
	while ($r = mysqli_fetch_assoc($res) ) {
		
		$grau = $r['idGrauEnsino'];
		$disciplina = $r['id'];
		$matricula = isMatricula($con, $id_aluno, $disciplina);
		$turnoDisc = $r['turno'];

		if ($grau == $modalidade && $turno == $turnoDisc && !$matricula) {
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

	function getTurno($con3, $idAluno2){
		
		$sql4 = "SELECT * FROM aluno WHERE id = $idAluno2";
		$res3 = mysqli_query($con3, $sql4);
		$r4 = mysqli_fetch_assoc($res3);
		
		$resp1 = $r4['turno'];
		
		return $resp1;
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