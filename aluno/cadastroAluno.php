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

        <title>Cadastro Aluno</title>

    </head>
    <body>
        <h2>FORMULARIO PARA CADASTRO DE ALUNO</H2>
        <div class = "container" style="background-color: #71dd8a" >
            <?PHP
            if(isset($_SESSION['msg']))
                {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
            <form action="cadAluno.php" method="POST">
                <br/>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*NOME :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required  name="nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*RG :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required  name="rg">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*CPF :</label>
                    <div class="col-sm-10">
                        <input type="number" minlength="11" maxlength="11" placeholder="Somente números!" class="form-control" required  name="cpf">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*ORGÃO EXPEDIDOR :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required  name="orgaoexpedidor">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*NOME DA MÃE :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required  name="nomedamae">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NOME DO PAI :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomedopai">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*TITULO DE ELEITOR :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="tituloeleitor">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RESERVISTA :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="reservista">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">SEXO</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="Masculino">
                                <label class="form-check-label" for="gridRadios1">
                                    MASCULINO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="Feminino">
                                <label class="form-check-label" for="gridRadios2">
                                    FEMININO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="Outros">
                                <label class="form-check-label" for="gridRadios2">
                                    OUTROS
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ESTADO CÍVIL :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="estadocivil">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ENDEREÇO</label>
                </div>
                <div class="form-group row">
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="LOGRADOURO" name="logradouro">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="NUMERO" name="numeroresidencia">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="BAIRRO" name="bairro">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="COMPLEMENTO" name="complemento">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="CIDADE" name="cidade">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="CEP" name="cep">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="UF" name="estado">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*TELEFONE :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="telefone">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*E-MAIL :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" required name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">*CELULAR :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="celular">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">*STATUS</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" checked value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    ATIVO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    INATIVO
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">*NIVEL DE ESCOLARIDADE</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="grauensino" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    ENSINO FUNDAMENTAL
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grauensino" value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    ENSINO MÉDIO
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">*TURNO EM QUE DESEJA ESTUDAR</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" checked value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    MATUTINO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    NOTURNO
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-primary" type="submit">CADASTRAR</button>
                <input class="btn btn-primary" type="reset" value="LIMPAR">
                
            </form>
            <a href="../aluno/controleAluno.php"><button class="btn btn-primary">VOLTAR</button></a>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>