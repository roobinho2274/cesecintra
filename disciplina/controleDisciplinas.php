
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
   

        <title>Pagina Administrador</title>

    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h2>DISCIPLINAS</h2>
            <form >
                 <input type="submit" class="btn btn-secondary btn-block" value="CADASTRA DISCIPLINA" formaction="cadastraDis.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block" value="CONSULTA DISCIPLINA" formaction="listaDis.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block" value="ALTERA DISCIPLINA" formaction="alteraDis.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block" value="DELETA DISCIPLINA" formaction="deletaDis.php"/><br><br>
            </form>
            <a class="btn btn-secondary text-light strong" href="../paginaInicialAdm.php"> Voltar</a>

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
