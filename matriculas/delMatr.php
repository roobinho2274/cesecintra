<?php
session_start();
include_once ("../funcoes.php");
include_once ("../conexao.php");

//Recebe o código da pessoa referente a matricula a ser alterada
$cod = filter_input(INPUT_POST, 'matr', FILTER_SANITIZE_NUMBER_INT);
if ($cod == ""){
	header("Location: ../matriculas/deletaMat.php");
}
//String de alteração no banco
$query = "SELECT * FROM matricula WHERE idAluno = $cod";
//execução da estring SQL e coloca o resultado em $res
$r = mysqli_query($con, $query);
//$res = mysqli_fetch_assoc($r);
//$_SESSION['verify'] = "Ok";
 
$queryNome = "SELECT nome FROM aluno WHERE id = $cod ORDER BY nome";
$result = mysqli_query($con, $queryNome);
$resu = mysqli_fetch_assoc($result);

$nome = $resu['nome'];

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" >
	<title>Deletar matriculas</title>
</head>
<body>
    <div class = "container" style="background-color: buttonface" >
    	<center><h3>Matrículas do <?php echo "$nome";?></h3></center>
    	    <?php
	            /* Verifica se a variável global que indica falha na inserção está
	              Setada, o que indica uma falha na inserção no banco */
	            if (isset($_SESSION['msn'])) {
	                echo $_SESSION['msn'];
	                unset($_SESSION['msn']);
	            }
            ?>
		<form action="delMatrBD.php" method="POST">
					
			<?php

	            while ($res = mysqli_fetch_assoc($r)) {
	                
					$id = $res['idDisciplina'];
					$query2 = "SELECT * FROM disciplina WHERE id = $id ORDER BY descricao";
					$rs = mysqli_query($con, $query2);
					$res2 = mysqli_fetch_assoc($rs);
	                    
	                echo  '<div class="input-group-text">
	                            <input type="checkbox" aria-label="Checkbox for following text input" value="'.$res['id'].'" name="sel[]" >'.$res2['descricao'].'
	                       </div>';
	            }            
            ?>		

            <br/>
		    <div class="form-group row">
	            <div class="col-sm-10">
	                <button type="submit" class="btn btn-primary">Deletar</button>
	                <button type="submit" class="btn btn-primary" formaction="../matriculas	/deletaMat.php">Voltar</button>
	            </div>
	        </div>
		</form>
	</div>

	<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>