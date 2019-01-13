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
        <meta charset="UTF-8">
        <title>Registro de Nota</title>
        <link rel="stylesheet" href="../css/bootstrap.css" >
    </head>
    <body>
        <div class = "container" style="background-color: buttonface" >
            <h5>NOTA</h5>
            <?php
                /* Verifica se a variável global que indica falha na inserção está
                  Setada, o que indica uma falha na inserção no banco */
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
            ?>
            <form action="cadNot.php" method="POST">
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nota 1 :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nota1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nota 2 :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nota2">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nota 3 :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nota3">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nota 4 :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nota4">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nota 5 :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="nota5">
                    </div>
                </div>
                
                <button class="btn btn-primary" type="submit">CADASTRAR NOTA</button>
                <input class="btn btn-primary" type="reset" value="LIMPAR">
                
            </form> 
           
           <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>    
    </body>
</html>
