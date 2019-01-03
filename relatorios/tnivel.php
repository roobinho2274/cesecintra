<?php
	
	include_once("../conexao.php");

	$nivel = $_REQUEST['combobox_nivel'];

	$sql = "SELECT * FROM matricula";
	$res = mysqli_query($con, $sql);
	
	while ($r = mysqli_fetch_assoc($res) ) {
		$idAluno = $r['idAluno'];

		if (isValido($con, $idAluno, $nivel)) {
			
			$nome = getNome($con, $idAluno);
			
			$idDisciplin = $r['idDisciplina'];
				
			$disciplina = getDisciplina($con, $idDisciplin);
			
			if ($r['nota1'] == null) {
				$nota1 = '';
			}else{
				$nota1 = $r['nota1'];
			}

			if ($r['nota2'] == null) {
				$nota2 = '';
			}else{
				$nota2 = $r['nota2'];
			}

			if ($r['nota3'] == null) {
				$nota3 = '';
			}else{
				$nota3 = $r['nota3'];
			}

			if ($r['nota4'] == null) {
				$nota4 = '';
			}else{
				$nota4 = $r['nota4'];
			}

			if ($r['nota5'] == null) {
				$nota5 = '';
			}else{
				$nota5 = $r['nota5'];
			}

			if ($r['media'] == null) {
				$media = '';
			}else{
				$media = $r['media'];
			}

			$result[] = array(
				'id'   => $r['id'],
				'nome' => $nome,
				'disciplina' => $disciplina,
				'horaAula' => $r['horaAula'],
				'status' => $r['status'],
				'dataMatricula' => $r['dataMatricula'],
				'nota1' => $nota1,
				'nota2' => $nota2,
				'nota3' => $nota3,
				'nota4' => $nota4,
				'nota5' => $nota5,
				'media' => $media,
			);
		}
	}
	
	echo(json_encode($result));
	
	function getDisciplina($con1, $idDisc){
		
		$sql2 = "SELECT * FROM disciplina WHERE id = $idDisc";
		$res2 = mysqli_query($con1, $sql2);
		$r2 = mysqli_fetch_assoc($res2);
		
		$resp = $r2['descricao'];
		
		return $resp;
	}

	function getNome($con2, $idAluno1){
		
		$sql3 = "SELECT * FROM aluno WHERE id = $idAluno1";
		$res3 = mysqli_query($con2, $sql3);
		$r3 = mysqli_fetch_assoc($res3);
		
		$resp1 = $r3['nome'];
		
		return $resp1;
		
	}

	function isValido($con3, $idAluno2, $nivel1){

		$query = "SELECT * FROM aluno WHERE id = $idAluno2";
		$res4 = mysqli_query($con3,$query);
		$r4 = mysqli_fetch_assoc($res4);


		switch ($nivel1) {
			case 'fundamental':
				if ($r4['grauensino'] == '1') {
					$resp = true;
				}else{
					$resp = false;
				}
				
			break;
			case 'medio':
				if ($r4['grauensino'] == '2') {
					$resp = true;
				}else{
					$resp = false;
				}
				
			break;
			case 'matutino':
				if ($r4['turno'] == '1') {
					$resp = true;
				}else{
					$resp = false;
				}
			
			break;
			case 'noturno':
				if ($r4['turno'] == '2') {
					$resp = true;
				}else{
					$resp = false;
				}
			
			break;
		}

		return $resp;

	}


?>