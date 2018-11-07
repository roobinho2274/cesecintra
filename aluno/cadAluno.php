<?php
    session_start();

    //verifica se o usuario pode estar aqui
    if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {
    
        //Inclui os arquvis de conexão e funções
        include_once ("../conexao.php");
        include_once ("../funcoes.php");
        //Atribuindo valor recebido por POST aos variaveis
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $nomedamae = filter_input(INPUT_POST, 'nomedamae', FILTER_SANITIZE_STRING);
        $nomedopai = filter_input(INPUT_POST, 'nomedopai', FILTER_SANITIZE_STRING);
        $tituloeleitor = filter_input(INPUT_POST, 'tituloeleitor', FILTER_SANITIZE_STRING);
        $reservista = filter_input(INPUT_POST, 'reservista', FILTER_SANITIZE_STRING);
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
        $estadocivil = filter_input(INPUT_POST, 'estadocivil', FILTER_SANITIZE_STRING);
        $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
        $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
        $numeroresidencia = filter_input(INPUT_POST, 'numeroresidencia', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $grauensino = filter_input(INPUT_POST, 'grauensino', FILTER_SANITIZE_STRING);
        $orgaoexpedidor = filter_input(INPUT_POST, 'orgaoexpedidor', FILTER_SANITIZE_STRING);
        //Monta a Query SQL que vai retornar o maior ID na tabela Aluno
        $queryid = "SELECT MAX(id) FROM aluno";
        //Recebe através da Dunção executa o maior indice cadastrado em Disciplina
        $idBd = mysqli_fetch_assoc(executa($queryid, $con));
        //Incrementa o valor recebido para realizar o novo cadastro
        $id = $idBd['MAX(id)'] + 1;
        //Monta a Query de inserção no Banco com os dados do POST e o ID calculado na linha anterior
        $query = "INSERT INTO aluno(rg,cpf,nome,orgaoExpedidor,mae,pai,tituloEleitor,reservista,sexo,estadoCivil,logradouro,bairro,complemento,numeroResidencial,cidade,cep,estado,telefone,email,celular,status,datacadastro,grauensino)VALUES ('$rg',$cpf,'$nome','$orgaoexpedidor','$nomedamae','$nomedopai',$tituloeleitor,$reservista,'$sexo','$estadocivil','$logradouro','$bairro','$complemento',$numeroresidencia,'$cidade',$cep,'$estado',$telefone,'$email',$celular,'$status',NOW(),'$grauensino') ";
        //Executa a $query2 no banco através da função Executa
        $resultado = executa($query, $con);
        /*Verifica se a inserção foi feita corretamente e direciona à outras 
        * paginas confome o resultado, também define a mensagem a ser exibida através 
        * da variável Global $_SESSION['msn']
        */
        if ($resultado) {
            $_SESSION['msn'] = "<span style= color: gren>Inserido com sucesso!</span>";
            header("Location: ../aluno/controleAluno.php");
        } else {
            $_SESSION['msn'] = "<span style= color: red>Falha ao inserir!</span>";
            echo $query;
           // header("Location: ../aluno/cadastroAluno.php");
}


    }else{
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
        header("location: /PROJETOCESEC/cesecintra/index.php");
    }    