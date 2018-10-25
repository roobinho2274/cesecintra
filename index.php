<!--Verificar as variaveis de sessão-->
<?php
session_start();
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);

}
//Codigo que desctroi a variável de sessão que controla o acesso
if (isset($_SESSION['tipoUsuario'])) {
    unset($_SESSION['tipoUsuario']);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGIN</title>
    </head>
    <body>
        <form name="inicio" action="login.php" method="POST">
            <script>alert(Email enviado com Sucesso!);</script>
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
