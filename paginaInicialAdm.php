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
        <meta charset="UTF-8">
        <title>Pagina Inicial</title>
    </head>
    <body>
        <form name="direciona" action="paginaInicialAdm.php">
            <input type="submit" value="Controle Aluno" formaction="aluno/controleAluno.php"/>
            <input type="submit" value="Controle Professore" formaction="professor/controleProfessor.php"/>
            <input type="submit" value="Controle Secretarias" formaction="secretarias/controleSecretarias.php"/>
            <input type="submit" value="Controle Disciplinas" formaction="disciplinas/controleDisciplinas.php"/>
            <input type="submit" value="Controle Matriculas" formaction="matriculas/controleMatriculas.php"/>
        </form>
    </body>
</html>
