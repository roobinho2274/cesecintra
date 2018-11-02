<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script>
    function direciona()
    {}
</script>
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
        <div class = "container" style="background-color: buttonface" >
            <h2>Opções do administrador</h2>
            <form name="direciona" action="paginaInicialAdm.php">
                <input type="submit" class="btn btn-primary btn-block" value="Controle Aluno" formaction="aluno/controleAluno.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block " value="Controle Professores" formaction="professor/controleProfessor.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Secretarias" formaction="secretarias/controleSecretarias.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Disciplinas" formaction="disciplinas/controleDisciplinas.php"/><br><br>
                <input type="submit" class="btn btn-primary btn-block" value="Controle Matriculas" formaction="matriculas/controleMatriculas.php"/><br><br>
            </form>

            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
