<!DOCTYPE html>
<?php
    session_start();
    //Inclui os arquvis de conexão e funções
    include_once ("../conexao.php");
    include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] == 'adm' || $_SESSION['tipoUsuario'] == 'secretaria') {
}else{
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
    header("location: /PROJETOCESEC/cesecintra/index.php");
}
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >
        
        <title>Registra/Alterar Notas</title>

    </head>
    <body>
        
        <div class = "container" style="background-color: buttonface" >
            <h2>Registrar/Alterar Notas</h2>
            <form action="cadNot.php">
                
            </form>
            <a class="btn btn-secondary text-light strong" href="../paginaInicialAdm.php"> Voltar</a>

            
        </div>
        
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
