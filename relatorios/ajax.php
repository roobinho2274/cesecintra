<?php

require '../conexao.php';

$data = $_POST;	

if($data['acao'] == 'aluno_matricula'){
    
	$id_aluno = $data['idAluno'];
	
	$query = "SELECT m.id AS id, 
				a.nome AS aluno, 
				d.descricao AS disciplina,
				m.horaAula AS horaAula,
				m.status AS status,
				m.dataMatricula AS dataMatricula,
				m.dataConclusao AS dataConclusao,
				m.media AS media
			FROM matricula AS m
			JOIN aluno AS a ON a.id = m.idAluno
			JOIN disciplina AS d ON d.id = m.idDisciplina
			WHERE m.idAluno = $id_aluno ORDER BY m.idAluno";
	$resultado = mysqli_query($con, $query);
	
	if(mysqli_num_rows($resultado) > 0){

		while ($dados = mysqli_fetch_assoc($resultado) ) {
				
			//$nota1 = '';$nota2 = '';$nota3 = '';$nota4 = '';$nota5 = '';

			$media = $dados['media'] == null ? '' : $dados['media'];

	        $data_mat = str_replace("-", "/", $dados['dataMatricula']);
	        $data_mat = date('d/m/Y', strtotime($data_mat));
	        $data_conc = '';

	        if($dados['dataConclusao']){
	            $data_conc = str_replace("-", "/", $dados['dataConclusao']);
	            $data_conc = date('d/m/Y', strtotime($data_conc));
	        }

	        $result[] = array(
				'id'   => $dados['id'],
				'nome' => $dados['aluno'],
				'disciplina' => $dados['disciplina'],
				'horaAula' => $dados['horaAula'],
				'status' => $dados['status'],
				'dataMatricula' => $data_mat,
				'dataConclusao' => $data_conc,
				'media' => $media
			);
		}

		$response['matriculas'] = $result;

	}else{
		$response['error'] = "Não foram encontradas matriculas";	
	}

    echo json_encode($response);

}else if($data['acao'] == 'aluno_disciplina'){
    
	$id_disciplina = $data['idDisciplina'];
	
	$query = "SELECT m.id AS id, 
				a.nome AS aluno, 
				d.descricao AS disciplina,
				m.horaAula AS horaAula,
				m.status AS status,
				m.dataMatricula AS dataMatricula,
				m.dataConclusao AS dataConclusao,
				m.media AS media
			FROM matricula AS m
			JOIN aluno AS a ON a.id = m.idAluno
			JOIN disciplina AS d ON d.id = m.idDisciplina
			WHERE m.idDisciplina = $id_disciplina ORDER BY m.idDisciplina";
	$resultado = mysqli_query($con, $query);
	
	if(mysqli_num_rows($resultado) > 0){

		while ($dados = mysqli_fetch_assoc($resultado) ) {
				
			//$nota1 = '';$nota2 = '';$nota3 = '';$nota4 = '';$nota5 = '';

			$media = $dados['media'] == null ? '' : $dados['media'];

	        $data_mat = str_replace("-", "/", $dados['dataMatricula']);
	        $data_mat = date('d/m/Y', strtotime($data_mat));
	        $data_conc = '';

	        $data_conc = '';

	        if($dados['dataConclusao']){
	            $data_conc = str_replace("-", "/", $dados['dataConclusao']);
	            $data_conc = date('d/m/Y', strtotime($data_conc));
	        }

	        $result[] = array(
				'id'   => $dados['id'],
				'nome' => $dados['aluno'],
				'disciplina' => $dados['disciplina'],
				'horaAula' => $dados['horaAula'],
				'status' => $dados['status'],
				'dataMatricula' => $data_mat,
				'dataConclusao' => $data_conc,
				'media' => $media
			);
		}

		$response['disciplinas'] = $result;

	}else{
		$response['error'] = "Não foram encontradas matriculas";	
	}

    echo json_encode($response);
}else if($data['acao'] == 'aluno_nivel'){
    
    $nivel = $data['nivel'];
	
    if($nivel == 'matutino'){
    	$where = "turno = 1";
    } else if($nivel == 'noturno'){
		$where = "turno = 2";
    } else if($nivel == 'fundamental'){
		$where = "grauensino = 1";
    } else if($nivel == 'medio'){
		$where = "grauensino = 2";
    } 

	$query = "SELECT *
			FROM aluno
			WHERE $where ORDER BY id";
	$resultado = mysqli_query($con, $query);
	
	if(mysqli_num_rows($resultado) > 0){

		while ($dados = mysqli_fetch_assoc($resultado) ) {

			$acoes = '<div style="display: flex; margin: 0 auto; width: fit-content;">
						<form method="post" action="../aluno/alterarAluno.php"><input type="hidden" value="'. $dados['id'] .'" name="id"><input type="submit" value="Alterar" class="form-control btn btn-light botõesAluno"></form>
						<form style="margin: 0 10px" method="post" action="../aluno/printFicha.php"><input type="hidden" value="'. $dados['id'] .'" name="id"><input type="submit" value="Imprimir" class="form-control btn btn-light botõesAluno"></form>
						<form method="post" action="../aluno/deleteAluno.php"><input type="hidden" value="'. $dados['id'] .'" name="id"><input type="submit" value="Deletar" class="form-control btn btn-light botõesAluno"></form>
					</div>';

	        $result[] = array(
				'id'   => $dados['id'],
				'nome' => $dados['nome'],
				'whatsapp' => $dados['telefone'] == 0 ? '' : $dados['telefone'],
				'rg' => $dados['rg'],
				'status' => $dados['status'] == 1 ? 'ATIVO' : 'INATIVO',
				'acoes' => $acoes
			);
		}

		$response['alunos'] = $result;

	}else{
		$response['error'] = "Não foram encontradas alunos";	
	}

    echo json_encode($response);
}else if($data['acao'] == 'aluno_concluintes'){
    
    $id_aluno = $data['idAluno'];
	
	$query = "SELECT m.id AS id, 
				a.nome AS aluno, 
				d.descricao AS disciplina,
				m.horaAula AS horaAula,
				m.status AS status,
				m.dataMatricula AS dataMatricula,
				m.dataConclusao AS dataConclusao,
				m.media AS media
			FROM matricula AS m
			JOIN aluno AS a ON a.id = m.idAluno
			JOIN disciplina AS d ON d.id = m.idDisciplina
			WHERE m.idAluno = $id_aluno AND m.dataConclusao IS NOT NULL ORDER BY m.idAluno";
	$resultado = mysqli_query($con, $query);
	
	if(mysqli_num_rows($resultado) > 0){

		while ($dados = mysqli_fetch_assoc($resultado) ) {
				
			//$nota1 = '';$nota2 = '';$nota3 = '';$nota4 = '';$nota5 = '';

			$media = $dados['media'] == null ? '' : $dados['media'];

	        $data_mat = str_replace("-", "/", $dados['dataMatricula']);
	        $data_mat = date('d/m/Y', strtotime($data_mat));
	        $data_conc = '';

	        if($dados['dataConclusao']){
	            $data_conc = str_replace("-", "/", $dados['dataConclusao']);
	            $data_conc = date('d/m/Y', strtotime($data_conc));
	        }

	        $result[] = array(
				'id'   => $dados['id'],
				'nome' => $dados['aluno'],
				'disciplina' => $dados['disciplina'],
				'horaAula' => $dados['horaAula'],
				'status' => $dados['status'],
				'dataMatricula' => $data_mat,
				'dataConclusao' => $data_conc,
				'media' => $media
			);
		}

		$response['matriculas'] = $result;

	}else{
		$response['error'] = "Não foram encontradas matriculas";	
	}


    echo json_encode($response);
}else if($data['acao'] == 'frequencia'){
    

    echo json_encode($response);
}else{
    $response['error'] = "Ação desconhecida.";
    echo json_encode($response);
}
