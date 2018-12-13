<?php
    session_start();
    //Inclui os arquvis de conexão e funções
    include_once ("../conexao.php");
    include_once ("../funcoes.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Cadastro Aluno</title>

    </head>
    <body>
        <div class = "container" style="background-color: #71dd8a" >
            <h5>CADASTRO DE ALUNOS</h5>
            <?php
            //verifica se o usuario pode estar aqui
            if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {


                //Atribuindo valor recebido por POST aos variaveis
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
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
                $numeroresidencia = filter_input(INPUT_POST, 'numeroResidencial', FILTER_SANITIZE_STRING);
                $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
                $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
                $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
                $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
                $grauensino = filter_input(INPUT_POST, 'grauensino', FILTER_SANITIZE_STRING);
                $orgaoexpedidor = filter_input(INPUT_POST, 'orgaoexpedidor', FILTER_SANITIZE_STRING);
                $query = "UPDATE aluno set rg = '$rg',cpf = '$cpf',nome = '$nome',orgaoExpedidor = '$orgaoexpedidor',mae = '$nomedamae',"
                        . "pai = '$nomedopai',tituloEleitor = '$tituloeleitor', reservista = '$reservista',sexo = '$sexo',"
                        . "estadoCivil = '$estadocivil',logradouro = '$logradouro',bairro = '$bairro',complemento = '$complemento',numeroResidencial = '$numeroresidencia',"
                        . "cidade = '$cidade',cep = '$cep',estado = '$estado',telefone = '$telefone',email = '$email',celular = '$celular',status = '$status',grauensino = '$grauensino' where id = '$id'";
                //Executa a $query2 no banco através da função Executa
                $resultado = executa($query, $con);
                /* Verifica se a inserção foi feita corretamente e direciona à outras 
                 * paginas confome o resultado, também define a mensagem a ser exibida através 
                 * da variável Global $_SESSION['msn']
                 */
                
                if ($resultado) {
                    Echo "<div class='alert alert-success' role='alert'>Aluno Atualizado com sucesso</div>";
                    echo
                    "<div class='row'>"
                    . "<div class='col-sm'>"
                    . "<a class='btn btn-primary btn-block' href='../matriculas/cadastraMat.php?cod'" . $id . " role='button'>REALIZAR MATRICULAS</a>"
                    . "</div>";
                    echo ""
                    . "<div class='col-sm'>"
                    . "<a class='btn btn-primary btn-block' href='../aluno/controleAluno.php' role='button'>VOLTAR</a>"
                    . "</div>"
                    . "</div>";
                } else {
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao inserir o aluno</div>";
                    header("Location: ../aluno/cadastroAluno.php");
                }
            } else {
                echo $_SESSION['tipoUsuario'];
                echo"<script>alert sem permissão de acesso</script>";
                header("location: /PROJETOCESEC/cesecintra/index.php");
            }
            ?>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>