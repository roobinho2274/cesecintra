
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		
		<link rel="shortcut icon" href="imagens/CesecLogo.png">
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/Professor.css" >
        <title>Login</title>
    </head>
    <body style="background-color:#65AFB2;">
		<!--Verificar as variaveis de sessão-->

        <div class="container">
            <form action="login.php" method="POST" class="mt-5 corpoDoLogin">
			<div class="text-center mt-2 mb-1">
            <img src="imagens/CesecLogo.png" class="imageLogin">
			</div>
			<div class="MensagemLogin pl-2 pr-2">
			Bem-vindo ao Sistema do Cesec, insira os dados para efetuar o login.
			</div>
			<hr class="hrBranco"/>
			<div class="pl-3 pr-3">
                <div class="form-group">
                    <h5 class="">Usuário</h5>
                    <input type="text" class="form-control" placeholder="Login" name = "user">
                    <small id="usurHelp" class="form-text  text-light">Atenção aos caracteres maiúsculos e minúsculos</small>
                </div>
                <div class="form-group">
                    <h5 class="">Senha</h5>
                    <input type="password" class="form-control" placeholder="Password" name = "pwd">
                </div>
						<?php
				session_start();
				if (isset($_SESSION['msg'])) {
					echo'<hr class="hrBranco"/>';
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
					echo'<hr class="hrBranco"/>';
				}
				//Codigo que destroi a variável de sessão que controla o acesso
				if (isset($_SESSION['tipoUsuario'])) {
					unset($_SESSION['tipoUsuario']);
				}
				?>
				<div class="mb-3 mt-2 pl-4 pr-4">
                <input type="submit" class="btn btn-success botaoEntrar form-control" value="ENTRAR">
				</div>
			</div>
            </form>
		</div>
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>
