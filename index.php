<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="inicio" action="login.php" method="POST">
            <table border="1">
                <tbody>
                    <tr>
                        <td><label>Usuário: </label></td>
                        <td><input type="text" name="user" value="" /></td>
                    </tr>
                    <tr>
                        <td><label>Senha: </label></td>
                        <td><input type="text" name="pwd" value="" /></td>
                    </tr>
                </tbody>

            </table>
            <input type="submit" value="ENTRAR" name="enviar" />
            <input type="reset" value="LIMPAR" name="limp" />
        </form>
    </body>
</html>
