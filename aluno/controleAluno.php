<?php
session_start();


if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >
        
        <title>Controle de Alunos</title>

    </head>
    <body>
        
        <div class = "container" style="background-color: buttonface" >
            <h2>CONTROLE ALUNO</h2>
            <form >
                <input type="submit" class="btn btn-secondary btn-block" value="CADASTRA ALUNO" formaction="cadastroAluno.php"/><br><br>
                <input type="submit" class="btn btn-secondary btn-block" value="CONSULTA ALUNO" formaction="consultaAluno.php"/><br><br>
            </form>
            <a class="btn btn-secondary text-light strong" href="../paginaInicialAdm.php"> Voltar</a>

            
        </div>
        
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
