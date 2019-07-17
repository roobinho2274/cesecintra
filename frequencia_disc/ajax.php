<?php

require '../conexao.php';

$data = $_POST;

if($data['acao'] == 'buscar_aluno'){
    $query = "SELECT a.nome, a.id  AS id_aluno FROM matricula AS m JOIN aluno AS a ON a.id = m.idAluno WHERE m.id = ".$data['matricula']." AND m.idDisciplina = ".$data['disciplina'];
    $resultado = mysqli_query($con,$query);

    if (mysqli_num_rows($resultado)){
        $dados = mysqli_fetch_array($resultado);

        $response['id'] = $dados['id_aluno'];
        $response['error'] = "";
    }else{
        $response['error'] = "Não foi possível encontrar o aluno.";
    }

    echo json_encode($response);

}else{
    $response['error'] = "Ação desconhecida.";
    echo json_encode($response);
}