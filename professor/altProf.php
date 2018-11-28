<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de professores</title>
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
    <body>
		<?php
			session_start();
			include_once ("../funcoes.php");
			include_once ("../conexao.php");
         ?>
		 <form action="altDisc.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Professor</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="nome">
                            <?php
                            /* Faz a busca por todos as disciplinas para preencher o select */
                            $query = "SELECT * FROM professor";
                            $resultado = executa($query, $con);
                            while ($r = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value=" . $r['id'] . ">" . $r['nome'] . "</option>";
                                
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary ">Alterar dados</button>
                        <button type="submit" class="btn btn-primary" formaction="../professor/controleProfessor.php">Voltar</button>

                    </div>
                </div>
            </form> 
 
    </body> 
	<script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
