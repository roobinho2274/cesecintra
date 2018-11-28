<?php
session_start();

//Inclui os arquvis de conexão e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

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
                mysqli_select_db($con, $dbname );

                $query = sprintf('SELECT rg,cpf,nome,orgaoExpedidor,mae,pai,tituloEleitor,"
                        . "reservista,sexo,estadoCivil,logradouro,bairro,complemento,numeroResidencial,"
                        . "cidade,cep,estado,telefone,email,celular,status,grauensino FROM aluno');
                
                $dado = mysqli_query($con, $query) or die (mysqli_error());

                $linha = mysqli_fetch_assoc($dado);
                $total = mysqli_num_rows($dado);
                
                while ($row = $dado->fetch_assoc()) {
                    
                    echo '<form action="altAluno.php" method="POST">'
                            . 'RG : <input type="text" class="form-control" id="inputEmail3" value="'.$row['rg'].'" name="RG">'
                            . 'CPF : <input type="text" class="form-control" id="inputEmail3" value="'.$row['cpf'].'" name="CPF">'
                            . 'Nome : <input type="text" class="form-control" id="inputEmail3" value="'.$row['nome'].'"  name="Nome">'
                            . 'Orgão Expedidor : <input type="text" class="form-control" id="inputEmail3" value="'.$row['orgaoExpedidor'].'" name="orgaoExpedidor">'
                            . 'Nome da Mãe : <input type="text" class="form-control" id="inputEmail3" value="'.$row['mae'].'" name="nomeMae">'
                            . 'Nome do Pai : <input type="text" class="form-control" id="inputEmail3" value="'.$row['pai'].'" name="nomePai">'
                            . 'Titulo de Eleitor : <input type="text" class="form-control" id="inputEmail3" value="'.$row['tituloEleitor'].'" name="tituloEleitor">'
                            . 'N° Reservista : <input type="text" class="form-control" id="inputEmail3" value="'.$row['reservista'].'" name="numReservista">'
                            . 'Sexo : <input type="text" class="form-control" id="inputEmail3"  name="Sexo">'
                            . 'Estado Civil : <input type="text" class="form-control" id="inputEmail3"  name="estadoSolteiro">'
                            . 'Logradouro : <input type="text" class="form-control" id="inputEmail3"  name="Logradouro">'
                            . 'Bairro : <input type="text" class="form-control" id="inputEmail3"  name="Bairro">'
                            . 'Complemento : <input type="text" class="form-control" id="inputEmail3"  name="Complemento">'
                            . 'Nº Residêncial : <input type="text" class="form-control" id="inputEmail3"  name="numResidencial">'
                            . 'Cidade : <input type="text" class="form-control" id="inputEmail3"  name="Cidade">'
                            . 'CEP : <input type="text" class="form-control" id="inputEmail3"  name="CEP">'
                            . 'Estado : <input type="text" class="form-control" id="inputEmail3"  name="Estado">'
                            . 'Telefone : <input type="text" class="form-control" id="inputEmail3"  name="Telefone">'
                            . 'E-mail : <input type="text" class="form-control" id="inputEmail3"  name="email">'
                            . 'Celular : <input type="text" class="form-control" id="inputEmail3"  name="celular">'
                            . 'Status : <input type="text" class="form-control" id="inputEmail3"  name="Status">'
                            . 'Grau de Ensino : <input type="text" class="form-control" id="inputEmail3"  name="grauEnsino">'
                        . '</form>'
                            ;
                }   
            ?>
            
            
            
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
    </body>
</html>