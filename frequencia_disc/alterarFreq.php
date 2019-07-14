<!DOCTYPE html>
<html>
    <head>
	    <title>Alterar frequência</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/Professor.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    if ( $_SESSION['tipoUsuario'] !='disciplina') {
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }

    if (isset($_SESSION['msn'])) {
		echo '<hr class="hrBranco">';
        echo $_SESSION['msn'];
        unset($_SESSION['msn']);
		echo '<hr class="hrBranco">';
    }

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    $query = "SELECT f.*, a.nome AS aluno, d.descricao AS disciplina FROM frequencia AS f
			JOIN disciplina AS d ON f.idDisciplina = d.id
			JOIN aluno AS a ON a.id = f.idAluno WHERE f.id='$id'";
    $dado = mysqli_query($con, $query);

    while ($r = mysqli_fetch_assoc($dado)){

    ?>	
	<body style="background-color:#65AFB2;">
		<nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
            <div class="navbar-brand w-100 d-flex">
                <a class="navbar-btn mx-auto"  href="controleFrequencia.php">
                    <img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
                </a>
                <div class="nav-item botoesDoMenu ml-2 mr-2 position-absolute" style="right: 1%;background-color: #dc3545;">
                    <a class="nav-link text-light"  href="../logout.php">Sair</a>
                </div>
            </div>
		</nav>
		 <h2 class="mt-2" style="font-weight: bold; color: white;"><?php echo $_SESSION['usuario_disciplina']?></h2>  <div class="pl-2 pr-2">
            <div class="mt-3 mb-3 container corpoFrequencia">
        		<hr class="hrBranco"/>
                <h2  class="mb-3">Alterar frequência</h2>
        		<hr class="hrBranco"/>
        		<form action="altFreq.php" method="POST" class="strong text-center">    
                    
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Aluno:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="aluno" id="combobox_aluno" required>
                                <option value="<?php echo $r['idAluno']; ?>"><?php echo $r['aluno']; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Disciplina:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $_SESSION['usuario_disciplina'];?>" name="disciplina" required disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Carga horária:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $r['horas'];?>" placeholder="Ex: 20:00" name="horas" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 row">
                            <label class="col-lg-3 col-form-label MensagemDisciplina">Mês: </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" value="<?php echo $r['mes'];?>" name="mes">
                            </div>
                        </div>
                        <div class="col-lg-6 row">
                            <label class="col-lg-3 col-form-label MensagemDisciplina">Ano:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" value="<?php echo $r['ano'];?>" name="ano" disabled>
                            </div>
                        </div>
                    </div>
	                <?php
	                if (isset($_SESSION['msn'])) {
	        			echo'<hr class="hrBranco"/>';
	                    echo $_SESSION['msn'];
	                    unset($_SESSION['msn']);
	        			echo'<hr class="hrBranco"/>';				
	                }
	                ?>
                    <input type="hidden" value="<?php echo $r['id']?>" name="idFreq">
                    <div class=" pl-5 pr-5">
                        <button type="submit" class="btn btn-light botoesFrequencia btn-block mb-2">Alterar</button>
                        <a class="btn btn-light botoesFrequencia btn-block mb-3" href="listaFrequencia.php">Voltar</a>
                    </div>
                </form> 
        	</div>
	    </div>
    </body>
    <?php
    }
    ?>
    <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>