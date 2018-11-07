<?php
session_start();


if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<script>alert sem permissão de acesso</script>";
    header("location: /PROJETOCESEC/cesecintra/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" >

        <title>Cadastro Aluno</title>

    </head>
    <body>
        <form action="cadAluno.php" method="POST">
            <table>
                <tr><td>Nome : </td><td><input type="text" name="nome"></td></tr>
                <tr><td>RG : </td><td><input type="text" name="rg"></td></tr>
                <tr><td>CPF : </td><td><input type="text" name="cpf"></td></tr>
                <tr><td>Orgão Expedidor : </td><td><input type="text" name="orgaoexpedidor"></td></tr>
                <tr><td>Nome da Mãe : </td><td><input type="text" name="nomedamae"></td></tr>
                <tr><td>Nome do Pai : </td><td><input type="text" name="nomedopai"></td></tr>
                <tr><td>Titulo de Eleitor : </td><td><input type="text" name="tituloeleitor"></td></tr>
                <tr><td>Reservista : </td><td><input type="text" name="reservista"></td></tr>
                <tr><td>Sexo : </td><td><input type="text" name="sexo"></td></tr>
                <tr><td>EstadoCivil : </td><td><input type="text" name="estadocivil"></td></tr>
                <tr><td>Logradouro : </td><td><input type="text" name="logradouro"></td></tr>
                <tr><td>Bairro : </td><td><input type="text" name="bairro"></td></tr>
                <tr><td>Complemento : </td><td><input type="text" name="complemento"></td></tr>
                <tr><td>Numero da residencia : </td><td><input type="text" name="numeroresidencia"></td></tr>
                <tr><td>Cidade : </td><td><input type="text" name="cidade"></td></tr>
                <tr><td>CEP : </td><td><input type="text" name="cep"></td></tr>
                <tr><td>Estado : </td><td><input type="text" name="estado"></td></tr>
                <tr><td>Telefone : </td><td><input type="text" name="telefone"></td></tr>
                <tr><td>E-mail : </td><td><input type="text" name="email"></td></tr>
                <tr><td>Celular : </td><td><input type="text" name="celular"></td></tr>
                <tr><td>Status : </td><td><input type="text" name="status"></td></tr>
                <tr><td>Grau de Ensino : </td><td><input type="text" name="grauensino"></td></tr>
                <tr><td><br/><input type="submit" value = "Enviar"></td></tr>
            </table>
        </form>
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>