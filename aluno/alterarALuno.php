<?php
session_start();

//Inclui os arquvis de conexão e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

if ($_SESSION['tipoUsuario'] != 'adm') {
    echo $_SESSION['tipoUsuario'];
    $_SESSION['msg'] = "<script>alert('sem permissão de acesso');</script>";
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

        <title>Altera Aluno</title>
    </head>
    <body>
        <h2>FORMULARIO PARA CADASTRO DE ALUNO</h2>
        <div class = "container" style="background-color: #71dd8a;" >
            <?php
                if(isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                mysqli_select_db($con, $dbname);
                
                $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

                $query = sprintf("SELECT * FROM aluno WHERE id=".$id);
                $dado = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($dado)){
            ?>
            <form action="altAluno.php" method="POST">
                <br/>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*NOME :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['nome'];?>"  name="nome">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*RG :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['rg'];?>"  name="rg">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*CPF :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['cpf'];?>"  name="cpf">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*ORGÃO EXPEDIDOR :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['orgaoExpedidor'];?>"  name="orgaoexpedidor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*NOME DA MÃE :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['mae'];?>"  name="nomedamae">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NOME DO PAI :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['pai'];?>"  name="nomedopai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*TITULO DE ELEITOR :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['tituloEleitor'];?>"  name="tituloEleitor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RESERVISTA :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['reservista'];?>"  name="reservista">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">*SEXO :</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" <?php if($row['sexo'] == 'Masculino') {echo "checked";}?> value="Masculino">
                                    <label class="form-check-label" for="gridRadios1">
                                        MASCULINO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" <?php if($row['sexo'] == 'Feminino') {echo "checked";}?> value="Feminino">
                                    <label class="form-check-label" for="gridRadios2">
                                        FEMININO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" <?php if($row['sexo'] == 'Outros'){ echo "checked";}   ?> value="Outros">
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
                            <input type="text" class="form-control" value="<?php echo $row['estadoCivil'];?>"  name="estadocivil">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ENDEREÇO :</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-10">
                            <input type="text" class="form-control" value="<?php echo $row['logradouro'];?>" placeholder="LOGRADOURO" name="logradouro">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" value="<?php echo $row['numeroResidencial'];?>" placeholder="NUMERO" name="numeroResidencial">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" value="<?php echo $row['bairro'];?>" placeholder="BAIRRO" name="bairro">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="<?php echo $row['complemento'];?>" placeholder="COMPLEMENTO" name="complemento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control" value="<?php echo $row['cidade'];?>" placeholder="CIDADE" name="cidade">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" value="<?php echo $row['cep'];?>" placeholder="CEP" name="cep">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" value="<?php echo $row['estado'];?>" placeholder="UF" name="estado">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*TELEFONE :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['telefone'];?>"  name="telefone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*E-MAIL :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['email'];?>"  name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">*CELULAR :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['celular'];?>"  name="celular">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">*STATUS</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"  value="1" <?php if($row['status'] == 1){echo 'checked';} ?>>
                                    <label class="form-check-label" for="gridRadios1">
                                        ATIVO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="2" <?php if($row['status'] == 2){echo 'checked';} ?>>
                                    <label class="form-check-label" for="gridRadios2">
                                        INATIVO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">NIVEL DE ESCOLARIDADE</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="grauensino"<?php if($row['grauensino'] == 1){echo 'checked';} ?> value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        ENSINO FUNDAMENTAL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="grauensino"<?php if($row['grauensino'] == 2){echo 'checked';} ?>  value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        ENSINO MÉDIO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset> 
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">TURNO</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="turno"<?php if($row['turno'] == 1){echo 'checked';} ?> value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        MATUTINO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="turno"<?php if($row['turno'] == 2){echo 'checked';} ?>  value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        NOTURNO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <input type ="hidden" value="<?php echo $id;?>" name="id">
                    <button class="btn btn-primary" type="submit">ALTERAR</button> 
                    <button type="submit" formaction="../aluno/controleAluno.php" class="btn btn-primary">VOLTAR</button>
            </form>
            <?php
                }
            ?>
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>