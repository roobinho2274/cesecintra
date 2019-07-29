
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <title>Conclui matrículas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../imagens/CesecLogo.png">
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/Professor.css" >
    <script src="../js/jquery-3.3.1.min.js"></script>

    <?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
    if ($_SESSION['tipoUsuario'] != 'adm') {
        echo $_SESSION['tipoUsuario'];
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: ../index.php");
    }
    ?>

</head>
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
                    <a class="nav-link text-light " href="../aluno/controleAluno.php">Controle do Aluno</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2">
                    <a class="nav-link text-light" href="../professor/controleProfessor.php">Controle dos Usuários</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2">
                    <a class="nav-link text-light" href="../disciplina/controleDisciplinas.php">Controle das Disciplinas</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2">
                    <a class="nav-link text-light" href="controleMatriculas.php">Controle das Matriculas</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2">
                    <a class="nav-link text-light " href="../frequencia/controleFrequencia.php">Controle de Frequência</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2">
                    <a class="nav-link text-light " href="../relatorios/opcoesrelatorios.php">Menu de Relatórios</a>
                </li>

                <li class="nav-item botoesDoMenu ml-2 mr-2" style="background-color: #dc3545;">
                    <a class="nav-link text-light" href="../logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </ul>
</nav>


<div class="ml-2 mr-2">
    <div class="mt-5 container corpoDaMatricula">
        <hr class="hrBranco">
        <h3 class="text-center">Concluir Matrículas</h3>
        <hr class="hrBranco">
        <div class="Mensagemmatricula mb-3">
            Selecione o aluno e a matricula desejada para concluí-la.
        </div>
        <?php
        if (isset($_SESSION['msn'])) {
            echo $_SESSION['msn'];
            unset($_SESSION['msn']);
        }
        ?>
        <form action="concluiMatrBD.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-center Mensagemmatricula">Alunos:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="matr" id="combobox_aluno">
                        <option value="">Selecione o aluno</option>
                        <?php
                        $sql = "SELECT * FROM aluno ORDER BY nome";
                        $res = mysqli_query($con, $sql);
                        while($r = mysqli_fetch_assoc($res) ) {
                            $sql2 = "SELECT * FROM matricula WHERE idAluno = '".$r['id']."'";
                            $res2 = mysqli_query($con, $sql2);
                            $r2 = mysqli_fetch_assoc($res2);
                            if ($r2) {
                                echo '<option value="'.$r['id'].'">'.$r['nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="input-group mb-3" id="div_checkbox">
                <!-- Ajax -->
            </div>

            <hr class="hrBranco">
            <div class="form-group pl-5 pr-5">
                <div class="text-center">
                    <button type="submit" class="btn botõesDeletar text-light strong form-control rounded mb-2">Concluir</button>
                    <button type="submit" class="btn botõesDeletar text-light strong form-control rounded" formaction="../matriculas/controleMatriculas.php">Voltar</button>
                </div>
            </div>

        </form>

        <script type="text/javascript">

            $('#combobox_aluno').change(function(){
                var data = {
                    'acao' : 'buscar_matriculas_concluir',
                    'aluno' : $('#combobox_aluno').val()
                };

                if ($('#combobox_aluno').val()){
                    $.ajax({
                        method: 'POST',
                        dataType: 'json',
                        url: 'ajax.php',
                        data: data,
                        success: function(data){
                            if(data['error']){
                                alert(data['error']);
                                $('#div_checkbox').html('').hide();
                            }else{
                                $('#div_checkbox').html(data['matriculas']).show();
                            }
                        },
                        error: function(data){
                            if(data['error']){
                                alert(data['error']);
                            }else{
                                alert('Erro tente reiniciar o navegador!');
                            }
                            $('#div_checkbox').html('').hide();
                        }
                    });
                }else{
                    $('#div_checkbox').html('').hide();
                }
            });



        </script>
    </div>
</div>
</body>
<!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
