<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de professores</title>
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
	<?php
	//Inciai sessão
	session_start();
	//Inclui os arquivos de conexáo e funções
	include_once ("../conexao.php");
	include_once ("../funcoes.php");

	//Query para consulta no banco de todas as disciplinas
	$query = "SELECT * FROM professor";
	//Recebe o resultad da execução da query anterios pela função executa
	$resultado = mysqli_query($con, $query);
	//Mostra o resultado na tela
	?>
    <body>
		<div class = "container" >
            <table class="table table-sm table-striped table-bordered table-hover" >
                <h2>Lista de Disciplinas</h2>
                <?php
                //Verifica se a variável global de mensagem está setada, a exibe e depois limpa
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
                ?>
                <thead class = "table-dark text-center">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col">Login</th>
                        <th scope = "col">Senha</th>
						<th scope = "col">Função</th>
                    </tr>
                </thead>
                <tbody><?php
                    while ($r = mysqli_fetch_assoc($resultado)) {
                        echo'<tr class="text-center">'
                        . "<th scope = 'row'>" . $r['id'] . "</th>"
                        . "<td>" . $r['nome'] . "</td>"
						. "<td>" . $r['login'] . "</td>"
						. "<td>" . $r['senha'] . "</td>"
						. "<td>" . $r['tipo'] . "</td>";
                        echo"</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-secondary strong form-control" href="../professor/controleProfessor.php" role="button">Voltar</a>
        </div>
			
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        
		
    </body>
</html>
