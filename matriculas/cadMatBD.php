<?php
	session_start();
	include_once ("../funcoes.php");
	include_once ("../conexao.php");

	//Recebe o código da pessoa referente a matricula a ser alterada
	$cod = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_NUMBER_INT);
	if ($cod == ""){
		header("Location: ../matriculas/cadastraMat.php");
	}

	if (isset($_POST['sel'])) {

		$idAluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);

		/*
			$idTurno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
			$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
			$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_STRING);
			$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_STRING);
			$nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_STRING);
			$nota4 = filter_input(INPUT_POST, 'nota4', FILTER_SANITIZE_STRING);
			$nota5 = filter_input(INPUT_POST, 'nota5', FILTER_SANITIZE_STRING);
			$media = filter_input(INPUT_POST, 'media', FILTER_SANITIZE_STRING);
			$horaAula = filter_input(INPUT_POST, 'horaAula', FILTER_SANITIZE_STRING);
		*/

		foreach ($_POST['sel'] as $codigo) {
		
			//Monta a Query SQL que vai retornar o maior ID na tabela matricula
	        $queryid = "SELECT MAX(id) FROM matricula";
	        //Recebe através da Dunção executa o maior indice cadastrado em matricula
	        $idBd = mysqli_fetch_assoc(executa($queryid, $con));
	        //Incrementa o valor recebido para realizar o novo cadastro
	        $id = $idBd['MAX(id)'] + 1;

			$idDisciplina = $codigo;

			//$query = "INSERT INTO matricula(id,idAluno,idDisciplina,idTurno,dataMatricula,dataConclusao,status,nota1,nota2,nota3,nota4,nota5,media,horaAula) VALUES ('$id','$idAluno','$idDisciplina','$idTurno',NOW(),'$dataConclusao','$status','$nota1','$nota2','$nota3','$nota4','$nota5','$media','$horaAula')";
    		//unset($_SESSION['sel']);

			// $sql = "SELECT * FROM aluno WHERE id = '$idAluno'";
			// $resTurno = mysqli_query($con, $sql);
			// $r = mysqli_fetch_assoc($resTurno);
			// $turno = $r['turno'];

    		$query = "INSERT INTO matricula(id, idAluno, idDisciplina, dataMatricula) VALUES ('$id', '$idAluno', '$idDisciplina', NOW())";
			$res = mysqli_query($con, $query); 
			
			if ($res) {
    			$_SESSION['msn'] = "<div class='alert alert-success' role='alert'> Cadastrado com sucesso!</div>";
				header("Location: ../matriculas/listaMat.php");
			}else{
        		$_SESSION['msn'] = "<div class='alert alert-danger' role='alert'> Falha ao cadastrar!</div>";
				header("Location: ../matriculas/cadastraMat.php");
			}
		}
	}else{
		header("Location: ../matriculas/cadastraMat.php");
	}

?>