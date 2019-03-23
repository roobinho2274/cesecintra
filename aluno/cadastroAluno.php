<!DOCTYPE html>
<html>
    <head>
    <title>Cadastro Aluno</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/Professor.css" >

    </head>
  <?php
  session_start();
    if ($_SESSION['tipoUsuario'] != 'adm') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }
  ?>
    <body style="background-color:#65AFB2;">
    
    <nav class="container-fluid mx-auto navbar navbar-expand-lg corpoMenu main-nav navbar-dark sticky-top " style="font-weight:bold; ">
        <!-- Brand/logo -->
      <ul class="nav navbar-nav mx-auto">    
        <div class="navbar-brand">
          <a class="navbar-btn mx-auto"  href="../paginaInicialAdm.php">
            <img src="../imagens/LogoProMenu.png" alt="logo" style="width:60px;">
          </a>  
            
          <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>    
        </div>  
        
        
        <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">

          <ul class="navbar-nav">
            
            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light " href="controleAluno.php">Controle do Aluno</a>
            </li>

            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light" href="../professor/controleProfessor.php">Controle do Funcionário</a>
            </li>

            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light" href="../disciplina/controleDisciplinas.php">Controle das Disciplinas</a>
            </li>

            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light" href="../matriculas/controleMatriculas.php">Controle das Matriculas</a>
            </li>          

            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light " href="../frequencia/controleFrequencia.php">Controle de Frequência</a>
            </li>
            
            <li class="nav-item botoesDoMenu ml-2 mr-2">
              <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
            </li>
          </ul>
        </div>
      </ul>  
    </nav>
    
    <div class="pl-2 pr-2">

        <div class = "container mt-5 mb-5 corpoDoAluno">
            <?php
            if(isset($_SESSION['msg'])){
                echo'<hr class="hrBranco">';
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
      <hr class="hrBranco">
      <h2 class="text-light strong">Formulário de Cadastro</h2>
      <hr class="hrBranco">
    <div class="Mensagemmatricula mb-3">
      Prencha todos os campos obrigatórios(*) do formulário para cadastrar um novo aluno.
    </div>
            <form action="cadAluno.php" method="POST" class="text-center strong">
                <br/>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">*Nome do Aluno:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" required  name="nome">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">*RG:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" required maxlength="13" name="rg">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">CPF:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" maxlength="14" name="cpf">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Orgão expedidor:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="orgaoexpedidor">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nome da Mãe:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="nomedamae">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nome do Pai:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="nomedopai">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Título de eleitor:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="tituloeleitor">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Reservista:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control"  name="reservista">
                    </div>
                </div>
        <hr class="hrBranco">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-2 pt-0">*Sexo:</legend>
                        <div class="col-lg-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" required value="Masculino">
                                <label class="form-check-label" for="gridRadios1">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="Feminino">
                                <label class="form-check-label" for="gridRadios2">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" value="Outros">
                                <label class="form-check-label" for="gridRadios2">
                                    Outros
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Estado civil:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control"  name="estadocivil">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Endereço:</label>
                </div>
        
                <div class="form-group row">
                    <div class="col-lg-10 mb-1">
                        <input type="text" class="form-control" placeholder="LOGRADOURO" name="logradouro">
                    </div>
                    <div class="col-lg-2 mb-1">
                        <input type="text" class="form-control" placeholder="NUMERO" name="numeroresidencia">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg mb-1">
                        <input type="text" class="form-control" placeholder="BAIRRO" name="bairro">
                    </div> 
                    <div class="col-lg mb-1">
                        <input type="text" class="form-control" placeholder="COMPLEMENTO" name="complemento">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-1">
                        <input type="text" class="form-control" placeholder="CIDADE" name="cidade">
                    </div>
                    <div class="col-lg-4 mb-1">
                        <input type="text" class="form-control" placeholder="CEP" name="cep">
                    </div>
                    <div class="col-lg-2 mb-1">
                        <input type="text" class="form-control" placeholder="UF" name="estado">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Whatsapp:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="telefone">
                    </div>
                </div>
        <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Celular:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="celular">
                    </div>
                </div>
                <hr class="hrBranco">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">E-mail:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
              <hr class="hrBranco">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-2 pt-0">*Status:</legend>
                        <div class="col-lg-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" required value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Ativo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    Inativo
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
        <hr class="hrBranco">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-2 pt-0">*Nivel de escolaridade:</legend>
                        <div class="col-lg-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grauensino" required value="1">
                                <label class="form-check-label" for="gridRadios2">
                                    Ensino fundamental
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grauensino" value="2">
                                <label class="form-check-label" for="gridRadios1">
                                    Ensino médio
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
        <hr class="hrBranco">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-2 pt-0">*Turno desejado:</legend>
                        <div class="col-lg-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" required value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Matutino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="turno" value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    Noturno
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
        <hr class="hrBranco">
      <?php
            if(isset($_SESSION['msg']))  
                {
        echo'<hr class="hrBranco">';
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
        echo'<hr class="hrBranco">';
                }
            ?>
                <div class="pl-4 pr-4 mb-2 mt-2">  
          <button class="btn btn-light form-control botõesAluno" type="submit">Cadastrar novo aluno</button>
          <input class="btn btn-light form-control botõesAluno" type="reset" value="Limpar todos campos">
          <a href="../aluno/controleAluno.php" class="btn btn-light form-control botõesAluno">Voltar</a>
        </div>  
            </form>
      </div>
      </div>
    </body>

            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
      
</html>