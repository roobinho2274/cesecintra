<?php
	
	include_once("../conexao.php");

	$id_aluno = $_REQUEST['combobox_aluno'];

	$query = "SELECT * FROM matricula WHERE idAluno = $id_aluno";
	$res = mysqli_query($con, $query);

	while ($r = mysqli_fetch_assoc($res) ) {
			
		$idDisci = $r['idDisciplina'];

		$nomeDisc = getDisciplina($con, $idDisci);
		
			$result[] = array(
				'id'   => $r['id'],
				'nome' => $nomeDisc,
			);	
	}

	echo(json_encode($result));

	function getDisciplina($con1, $idDisc){
        
        $sql2 = "SELECT * FROM disciplina WHERE id = $idDisc";
        $res2 = mysqli_query($con1, $sql2);
        $r2 = mysqli_fetch_assoc($res2);
        
        $resp = $r2['descricao'];
        
        return $resp;
    }

?>