<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina Inicial</title>
    </head>
    <body>
        <?php
        if ($_SESSION['tipoUsuario'] == "adm") {
            echo "Administrador";
        } else if ($_SESSION['tipoUsuario'] == "secretaria") {
            echo "Secretaria";
        } else if ($_SESSION['tipoUsuario'] == "professor") {
            echo "Professor";
        }
        ?>
    </body>
</html>
