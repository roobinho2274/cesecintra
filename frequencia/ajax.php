<?php

require '../conexao.php';

$data = $_POST;

if($data['acao'] == 'buscar_aluno'){
    $query = "SELECT a.id AS id_aluno, m.*, d.descricao AS disciplina, d.id AS id_disciplina FROM matricula AS m 
                JOIN aluno AS a ON m.idAluno = a.id
                JOIN disciplina AS d ON d.id= idDisciplina
                WHERE m.id = ".$data['matricula'];
    $resultado = mysqli_query($con,$query);

    if ($resultado){
        $dados = mysqli_fetch_array($resultado);

        $response['id'] = $dados['id_aluno'];
        $response['disciplina'] = '<option value="'.$dados['id_disciplina'].'" selected> '. $dados['disciplina'] .' </option>';
        $response['error'] = "";
    }else{
        $response['error'] = "Não foi possível encontrar o aluno.";
    }


    echo json_encode($response);
}else{
    $response['error'] = "Ação desconhecida.";
    echo json_encode($response);
}