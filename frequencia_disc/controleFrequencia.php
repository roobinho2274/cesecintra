<!DOCTYPE html>
<html>
    <head>
        <title>Controle de frequência </title>	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
		<link rel="stylesheet" href="../css/Professor.css" >
    </head>
<?php
session_start();
if ( $_SESSION['tipoUsuario'] !='disciplina') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
    header("location: ../index.php");
}
?>
	<body style="background-color:#65AFB2;">
		<nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
            <div class="navbar-brand w-100 d-flex">
                <a class="navbar-btn mx-auto"  href="controleFrequencia.php">
                    <img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
                </a>
                <div class="nav-item botoesDoMenu ml-2 mr-2 position-absolute" style="right: 1%;background-color: #dc3545;">
                    <a class="nav-link text-light"  href="../logout.php">Sair</a>
                </div>
            </div>
		</nav>
        <h2 class="mt-2" style="font-weight: bold; color: white;"><?php echo $_SESSION['usuario_disciplina']?></h2>
        <div class="pl-2 pr-2">
            <div class="mt-3 mb-3 container corpoFrequencia">
                <hr class="hrBranco"/>
                <h2 class="mb-3">Controle da frequência</h2>
                <hr class="hrBranco"/>
                <form action="" class="pl-2 pr-2">
                    <input type="submit" class="btn btn-light botoesFrequencia btn-block mb-3" value="Lançar frequência" formaction="cadFrequencia.php"/>
                    <input type="submit" class="btn btn-light botoesFrequencia btn-block mb-3" value="Consultar frequência" formaction="listaFrequencia.php"/>
                </form>
            </div>
        </div>
    </body>			
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</html>