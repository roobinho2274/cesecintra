<?php
session_start();
if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            <h2>FREQUÊNCIA</h2>
            <form >
                <input type="submit" class="btn btn-secondary btn-block" value="LANÇA FREQUÊNCIA" formaction="cadFrequencia.php"/><br><br>
                <input type="submit" class="btn btn-secondary btn-block" value="CONSULTA FREQUÊNCIA" formaction="listaFrequencia.php"/><br><br>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" formaction="../paginaInicialAdm.php">Voltar</button>
                    </div>
                </div>
            </form>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>