<?php

require '../conexao.php';
    
$data = $_POST;

if($data['acao'] == 'buscar_matriculas_concluir'){

    $query = "SELECT m.id AS id_mat, d.descricao AS disciplina FROM matricula AS m 
              JOIN disciplina AS d ON d.id = m.idDisciplina 
              WHERE m.dataConclusao IS NULL AND m.idAluno = ". $data['aluno'];

    $res = mysqli_query($con, $query);

    if (mysqli_num_rows($res) > 0){
        $response['error'] = '';
        $response['matriculas'] = '';
        while ($r = mysqli_fetch_assoc($res)) {
            $response['matriculas'] .= '<div class="col-md-3 input-group-text ml-1"><input type="checkbox" value="'.$r['id_mat'].'" name="sel[]">'.$r['disciplina'].'</div>';
        }
    }else{
        $response['error'] = 'Não há matrículas disponíveis para o aluno selecionado!';
    }

    echo(json_encode($response));
}else{
    $response['error'] = "Ação desconhecida.";
    echo json_encode($response);
}