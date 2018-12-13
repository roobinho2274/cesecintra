<?php
//inicia a sessão
session_start();
//Inclui os arquvis de conexão e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");
//Recebe os dado de cadastraDisp.php pelo metódo POST e através de um filtro
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ensino = filter_input(INPUT_POST, 'ensino', FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST, 'prof', FILTER_SANITIZE_STRING);
//Monta a Query SQL que vai retornar o maior ID na tabela Disciplina
$query1 = "SELECT MAX(id) FROM disciplina ";
//Recebe através da Dunção executa o maior indice cadastrado em Disciplina
$idBd = mysqli_fetch_assoc(executa($query1, $con));
//Incrementa o valor recebido para realizar o novo cadastro
$id = $idBd['MAX(id)'] + 1;
//Monta a Query de inserção no Banco com os dados do POST e o ID calculado na linha anterior
$query2 = "INSERT INTO disciplina(id,descricao,idGrauEnsino,idProf)VALUES ($id,'$nome',$ensino,$professor) ";
//Executa a $query2 no banco através da função Executa
$resultado = executa($query2, $con);
/* Verifica se a inserção foi feita corretamente e direciona à outras 
 * paginas confome o resultado, também define a mensagem a ser exibida através 
 * da variável Global $_SESSION['msn']
 */
if ($resultado) {
    $_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Inserido com sucesso!</div>";
    ?><label>INSERIDA COM SUCESSO</label><br>
    <a href="controleDisciplinas.php">VOLTAT</a>
    <?php
} else {
    $_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao Inserir!</div>";
    header("Location: ../disciplina/cadastraDis.php");
}



