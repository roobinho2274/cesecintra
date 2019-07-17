<?php

require '../conexao.php';

$data = $_POST;

if($data['acao'] == 'buscar_aluno'){
    $query = "SELECT a.id AS id_aluno, m.*, d.descricao AS disciplina, d.id AS id_disciplina FROM matricula AS m 
                JOIN aluno AS a ON m.idAluno = a.id
                JOIN disciplina AS d ON d.id= idDisciplina
                WHERE m.id = ".$data['matricula'];
    $resultado = mysqli_query($con,$query);

    if (mysqli_num_rows($resultado)){
        $dados = mysqli_fetch_array($resultado);

        $response['id'] = $dados['id_aluno'];
        $response['disciplina'] = '<option value="'.$dados['id_disciplina'].'" selected> '. $dados['disciplina'] .' </option>';
        $response['error'] = "";
    }else{
        $response['error'] = "Não foi possível encontrar o aluno.";
        $response['aluno'] = '<option value="">Selecione o aluno</option>';
        $query = "SELECT * FROM aluno ORDER BY nome";
        $resultado = mysqli_query($con, $query);
        while($r = mysqli_fetch_assoc($resultado)) {
            $sql2 = "SELECT * FROM matricula WHERE idAluno = '".$r['id']."'";
            $res2 = mysqli_query($con, $sql2);
            $r2 = mysqli_fetch_assoc($res2);
            if ($r2) {
                $response['aluno'] .= '<option value="'.$r['id'].'">'.$r['nome'].'</option>';

            }
        }
    }

    echo json_encode($response);

}else if($data['acao'] == 'buscar_matriculas'){
    $query = "SELECT d.id, d.descricao FROM matricula AS m 
  	JOIN disciplina AS d ON d.id = m.idDisciplina
	WHERE  m.idAluno = '". $data['aluno'] ."' ORDER BY d.descricao";

    $res = mysqli_query($con, $query);

    if($res){
        $response['error'] = '';
        $response['matricula'] = '<option value="">Selecione a disciplina</option>';
        while ($r = mysqli_fetch_assoc($res)) {
            $response['matricula'] .= '<option value="'. $r['id'] .'">'. $r['descricao'] .'</option>';
        }
    }else{
        $response['error'] = 'Não foram encontradas matriculas para o aluno.';
    }

    echo json_encode($response);
}else{
    $response['error'] = "Ação desconhecida.";
    echo json_encode($response);
}