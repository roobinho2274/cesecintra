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
        <link rel="stylesheet" href="../css/bootstrap.css" >


        <title>Pagina matricula</title>

    </head>
    <body>
        <h2>MATRICULAS</h2>
        <div class = "container" style="background-color: buttonface" >
            <form >
                <input type="submit" class="btn btn-secondary btn-block" value="REALIZAR MATRICULA" formaction="cadastraMat.php"/><br><br>
                <input type="submit" class="btn btn-secondary btn-block" value="CONSULTA MATRICULA" formaction="listaMat.php"/><br><br>
                <input type="submit" class="btn btn-secondary btn-block" value="ALTERA MATRICULA" formaction="alteraMat.php"/><br><br>
                <input type="submit" class="btn btn-secondary btn-block" value="DELETA MATRICULA" formaction="deletaMat.php"/><br><br>
            </form>
            <a class="btn btn-secondary text-light strong" href="../paginaInicialAdm.php"> Voltar</a>

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
