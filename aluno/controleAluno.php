<?php
session_start();

if ($_SESSION['tipoUsuario'] != 'adm') {
    $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
    header("location: /projCesec/cesecintra/index.php");
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
        <meta charset="UTF-8">
        <title>Controle de alunos</title>
    </head>
    <body>
        <?php
        echo  "Controle aluno";
        ?>
    </body>
</html>
