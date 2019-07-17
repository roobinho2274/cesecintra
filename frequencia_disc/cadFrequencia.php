<!DOCTYPE html>
<html>
    <head>
	    <title>Cadastro de frequência</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link rel="shortcut icon" href="../imagens/CesecLogo.png">
        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/Professor.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <?php
    session_start();
    include_once ("../funcoes.php");
    include_once ("../conexao.php");
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
                <h2  class="mb-3">Lançar frequência</h2>
        		<hr class="hrBranco"/>
                <div class="MensagemFrequencia mb-3">
                    Insira a matricula
                </div>

                <div class="row">
                    <div class="col-md-2 text-center">
                        <label for="input_matricula" class="control-label" style="font-weight: bold;">Matrícula</label>
                    </div>
                    <div class="col-md-8">
                        <input id="input_matricula" type="text" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button id="btn_matricula" class="btn btn-light botoesFrequencia btn-block mb-2">Buscar</button>
                    </div>
                </div>

                <div class="MensagemFrequencia mb-3">
                    - Ou -
                </div>
                <div class="MensagemFrequencia mb-3">
                    Ou Selecione o aluno
                </div>
                <form action="cadFreq.php" method="POST" class="strong text-center">
                    
                     <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Aluno:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="aluno" id="combobox_aluno" required>
                                <option value="">Selecione o aluno</option>
                                <?php
                                    $sql = "SELECT * FROM aluno ORDER BY nome";
                                    $res = mysqli_query($con, $sql);
                                    while($r = mysqli_fetch_assoc($res) ) {
                                        $sql2 = "SELECT * FROM matricula WHERE idDisciplina = ". $_SESSION['usuario_disciplina_id'] ." AND idAluno = '".$r['id']."'";
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

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Disciplina:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $_SESSION['usuario_disciplina'];?>" name="prof" required disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label MensagemDisciplina" >Carga horária:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ex: 20:00" name="horas" required>
                        </div>
                    </div>


                <?php
                if (isset($_SESSION['msn'])) {
        			echo'<hr class="hrBranco"/>';
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
        			echo'<hr class="hrBranco"/>';				
                }
                ?>
                    <div class=" pl-5 pr-5">
                        <button type="submit" class=" btn btn-light botoesFrequencia btn-block mb-2">Dar presença</button>
                        <a class="btn btn-light botoesFrequencia btn-block mb-3" href="controleFrequencia.php">Voltar</a>
                    </div>
                </form> 
        	</div>
	    </div>
        <script type="text/javascript">

            $('#btn_matricula').click(function(){

                if($('#input_matricula').val() != '') {
                    if (!isNaN($('#input_matricula').val())) {
                        var data = {
                            'acao': 'buscar_aluno',
                            'matricula': $('#input_matricula').val(),
                            'disciplina': <?php echo $_SESSION['usuario_disciplina_id'];?>
                        };

                        $.ajax({
                            method: 'POST',
                            dataType: 'json',
                            url: 'ajax.php',
                            data: data,
                            success: function (data) {
                                if (data['error']) {
                                    alert(data['error']);
                                    $("#combobox_aluno").prop("selectedIndex", 0);
                                } else {
                                    $('#combobox_aluno option[value="' + data['id'] + '"]').prop('selected', 'selected');
                                }
                            },
                            error: function (data) {
                                if(data['error']){
                                    alert(data['error']);
                                    $("#combobox_aluno").prop("selectedIndex", 0);
                                }else {
                                    alert('Erro tente reiniciar o navegador!');
                                }
                            }
                        });
                    }else{
                        alert('Insira uma matricula válida (Somente números).');
                    }
                }
            });

        </script>
    </body>
    <!--<script src="../js/jquery-3.3.1.slim.min.js"></script>-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        
</html>
