<!--Verificar as variaveis de sessão-->

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" >

        <title>Login</title>
    </head>
	<?php
	session_start();
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	//Codigo que destroi a variável de sessão que controla o acesso
	if (isset($_SESSION['tipoUsuario'])) {
		unset($_SESSION['tipoUsuario']);
	}
	?>
    <body>

        <div class = "container" >
            <h2 style="align-content: center">Login</h2>
            <form action="login.php" method="POST">
                <div class="form-group" >
                    <label >Usuário</label>
                    <input type="text" class="form-control" placeholder="Login" name = "user">
                    <small id="usurHelp" class="form-text text-muted">Atenção aos caracteres maiúsculos e minúsculos</small>
                </div>
                <div class="form-group">
                    <label >Senha</label>
                    <input type="password" class="form-control" placeholder="Password" name = "pwd">
                </div>
                <input type="submit" class="btn btn-success" value="ENTRAR">
            </form>
            <!-- <form name="inicio" action="login.php" method="POST">
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
             </form>-->
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
