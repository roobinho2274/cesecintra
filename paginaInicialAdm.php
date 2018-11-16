<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" >

        <title>Pagina Administrador</title>

    </head>
    <body>
        <h2> PAGINA ADMINISTRADOR</h2>
        <div class = "container" style="background-color: buttonface" >
           
            <form name="delta" action="delDisc.php">
                <input type="submit" class="btn btn-primary btn-block" value="Controle Aluno" formaction="aluno/controleAluno.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block " value="Controle Professores" formaction="professor/controleProfessor.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Secretarias" formaction="secretarias/controleSecretarias.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Disciplinas" formaction="disciplina/controleDisciplinas.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Matriculas" formaction="matriculas/controleMatriculas.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Backup Banco" formaction="../cesecintra/backupBD.php"/><br><br>
             </form>

            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
