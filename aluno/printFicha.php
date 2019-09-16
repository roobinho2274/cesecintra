<!DOCTYPE html>
<html>
	<head>
		<title>Ficha e Carteirinha</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="../imagens/CesecLogo.png">
	
        <style type="text/css">

            *{
                font-family: sans-serif;
            }
            .imprimir{
                margin: 10px 10px 0 0;
                padding: 15px;
                background-color: #6781ff;
                font-weight: bold;
                border-radius: 10px;
                border: 1px solid white;
                color: white;
                float: right;
            }
            #div_ficha{
                width: 75vw;
                padding: 10px;
                border: 2px solid black;
                margin: 40px auto;
            }
            #dados_ficha p{
                margin: 0 0 7px 0;
            }
            #div_carteirinha{
                border: 2px solid black;
                padding: 10px;
                display: flex;
                width: fit-content;
                margin: 0 auto;
            }
            #div_carteirinha_frente{
                border: 2px solid black;
                padding: 10px;
                width: 430px;
                margin: 0 auto;
            }
            #div_carteirinha_verso{
                border: 2px solid black;
                padding: 10px;
                width: 430px;
                margin: 0 auto;
            }
            .foto{
                margin-top: 15px;
                margin-left: 10px;
                height: 150px;
                width: 25%;
                border: 2px solid black;
                text-align: center;
            }
            #header p{
                font-size: 15px;
                margin: 0;
                text-align: center;
            }
            #header h4{
                margin: 5px 0;
                text-align: center;
                font-weight: bold;
                text-decoration: underline;
            }
            #dados{
                margin-top: 15px;
                width: 75%;
                padding-left: 10px;
            }
            #dados p{
                margin: 0 0 5px 5px;
            }
            #matriculas span{
                float: right;
            }
            #matriculas p{
                margin: 5px 0;
            }
            #div_assinaturas{
                margin: 0 auto 50px;
                width: fit-content;
                max-width: max-content;
            }
        </style>
	</head>
	<?php

	session_start();

	include_once ("../conexao.php");
	include_once ("../funcoes.php");

    if ($_SESSION['tipoUsuario'] != 'adm') {
        $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Para acessar o sistema faça login!</div>";
        header("location: index.php");
    }

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM aluno WHERE id = $id";

    $default = '';

	$res = mysqli_query($con, $sql);

    $dados = mysqli_fetch_array($res);
	$nome = $dados['nome'];
	$rg = $dados['rg'];
	$turno = $dados['turno'] == 1 ? 'Matutino' : 'Noturno';
	$ano = date('Y');
	$nivel = $dados['grauensino'] == 1 ? 'Fundamental' : 'Médio';
	$numero = $dados['id'];
	$orgao_expeditor = $dados['orgaoExpedidor'] ? $dados['orgaoExpedidor'] : $default;
	$cpf = $dados['cpf'] ? $dados['cpf'] : $default;
	$nome_mae = $dados['mae'] ? $dados['mae'] : $default;
	$nome_pai = $dados['pai'] ? $dados['pai'] : $default;
    $titulo_eleitor = $dados['tituloEleitor'] ? $dados['tituloEleitor'] : $default;
    $reservista = $dados['reservista'] ? $dados['reservista'] : $default;
    $sexo = $dados['sexo'];
    $estado_civil = $dados['estadoCivil'] ? $dados['estadoCivil'] : $default;
    $logradouro = $dados['logradouro'] ? $dados['logradouro'] : $default;
    $numero_casa = $dados['numeroResidencial'] ? $dados['numeroResidencial'] : $default;
    $bairro = $dados['bairro'] ? $dados['bairro'] : $default;
    $complemento = $dados['complemento'] ? $dados['complemento'] : $default;
    $cidade = $dados['cidade'] ? $dados['cidade'] : $default;
    $cep = $dados['cep'] ? $dados['cep'] : $default;
    $whatsapp = $dados['telefone'] ? $dados['telefone'] : $default;
    $celular = $dados['celular'] ? $dados['celular'] : $default;
    $email = $dados['email'] ? $dados['email'] : $default;
    $status = $dados['status'] == 1 ? 'Ativo' : 'Inativo';

    echo "<script>document.title = 'Ficha de $nome'</script>";

    $query = "SELECT 
                m.dataMatricula AS dataMatricula, 
                d.descricao AS disciplina, 
                t.descricao AS turno, 
                IF(d.idGrauEnsino = 1, 'Fundamental', 'Ensino Médio') AS grauEnsino 
              FROM matricula as m 
              JOIN disciplina AS d ON d.id = m.idDisciplina 
              JOIN turno AS t ON t.id = d.turno 
              WHERE m.idAluno = $id"; //Não listar concluidas: AND dataConclusao IS NULL;


    $resultado = mysqli_query($con, $query);

    if(mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_assoc($resultado)){
            $matriculas[] = $dados; 
        }
    }else{
        $matriculas = [];
    }
    

    ?>

	<body>
        <div id="imprimir">
            <button class="imprimir" onclick="imprimir();">Imprimir</button>
        </div>
        <div id="div_ficha">
            <div id="header">
                <p>CESEC - PADRE MÁRIO PENNOCK</p>
                <p style="font-weight: bold;">Ficha de matrícula do aluno</p>
            </div>
            <div id="dados_ficha">
                <p></p>
                <p><strong>Ano:</strong> <?php echo $ano;?></p>
                <p><strong>Número:</strong> <?php echo $numero;?></p>
                <p><strong>Nome:</strong> <?php echo $nome;?></p>
                <p><strong>RG:</strong> <?php echo $rg;?></p>
                <p><strong>Órgão expeditor:</strong> <?php echo $orgao_expeditor;?></p>
                <p><strong>CPF:</strong> <?php echo $cpf;?></p>
                <p><strong>Mãe:</strong> <?php echo $nome_mae;?></p>
                <p><strong>Pai:</strong> <?php echo $nome_pai;?></p>
                <p><strong>Titulo de Eleitor:</strong> <?php echo $titulo_eleitor;?></p>
                <p><strong>Reservista:</strong> <?php echo $reservista;?></p>
                <p><strong>Sexo:</strong> <?php echo $sexo;?></p>
                <p><strong>Estado civil:</strong> <?php echo $estado_civil;?></p>
                <p><strong>Logradouro:</strong> <?php echo $logradouro;?></p>
                <p><strong>Nº:</strong> <?php echo $numero_casa;?></p>
                <p><strong>Bairro:</strong> <?php echo $bairro;?></p>
                <p><strong>Complemento:</strong> <?php echo $complemento;?></p>
                <p><strong>Cidade:</strong> <?php echo $cidade;?></p>
                <p><strong>CEP:</strong> <?php echo $cep;?></p>
                <p><strong>WhatsApp:</strong> <?php echo $whatsapp;?></p>
                <p><strong>Celular:</strong> <?php echo $celular;?></p>
                <p><strong>E-mail:</strong> <?php echo $email;?></p>
                <p><strong>Status:</strong> <?php echo $status;?></p>
                <p><strong>Nível:</strong> <?php echo $nivel;?></p>
                <p><strong>Turno:</strong> <?php echo $turno;?></p>
            </div>
        </div>

        <div id="div_assinaturas">
            <p>
                <strong>Assinatura:</strong><span style="padding: 0 200px; border-bottom:2px solid black"></span>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Data:</strong><span style="padding: 0 100px; border-bottom:2px solid black"></span>
            </p>
            <p><strong>Funcionário(a):</strong><span style="padding: 0 186px; border-bottom:2px solid black"></span></p>
            <p><strong>Secretário(a):</strong><span style="padding: 0 193px; border-bottom:2px solid black"></span></p>
            <p><strong>Diretor(a):</strong><span style="padding: 0 206px; border-bottom:2px solid black"></span></p>
        </div>

        <div id="div_carteirinha">
            <div id="div_carteirinha_frente">
                <div id="header">
                    <p>CESEC - PADRE MÁRIO PENNOCK</p>
                    <p style="">CENTRO ESTADUAL DE EDUCAÇÃO CONTINUADA</p>
                    <p style="font-size: 14px;">Av. Xavier Lisboa, 308, bairro Varginha, Itajubá - MG / 3623-6695</p>
                </div>
                <div style="display:flex;">
                    <div class="foto">
                        <p style="margin-top:65px;">Foto</p>
                    </div>
                    <div id="dados">
                        <p style="font-weight: bold;">DOCUMENTO DO ESTUDANTE</p>
                        <p><strong>Nome:</strong> <?php echo $nome;?></p>
                        <p><strong>RG:</strong> <?php echo $rg;?></p>
                        <p><strong>Turno:</strong> <?php echo $turno;?></p>
                        <p><strong>Ano:</strong> <?php echo $ano;?></p>
                        <p><strong>Nível:</strong> <?php echo $nivel;?></p>
                        <p><strong>Nº:</strong> <?php echo $numero;?></p>
                    </div>
                </div>
                <p style="margin: 0 0 0 10px; font-weight: bold;">Diretor: </p>
            </div>

            <div style="padding: 4px"></div>

            <div id="div_carteirinha_verso">
                <div id="header">
                   <h4>Válida em todo Território Nacional</h4>
                </div>
                <div>
                    <div id="matriculas">
                        <?php
                        foreach ($matriculas as $matricula){

                            $disciplina = trim(ucfirst(mb_strtolower($matricula['disciplina'], 'UTF-8')));

                            $style_p = strlen($disciplina) > 27 ? 'style="text-align: center; "' : '';
                            $style_span = strlen($disciplina) > 27 ? 'style="text-align: center; width: 100%;"' : '';

                            $grauEnsino = $matricula['grauEnsino'];
                            $turno = $matricula['turno'] == 'NOTURNO' ? 'Not' : 'Mat';
                            $data = str_replace("-", "/", $matricula['dataMatricula']);
                            $dataMatricula = date('d/m/Y', strtotime($data));

                            echo "<p $style_p>$disciplina <span $style_span> $grauEnsino &nbsp&nbsp $turno &nbsp&nbsp $dataMatricula</span></p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</body>

    <script>
        function imprimir(){
            var btn_imprimir = document.getElementById('imprimir');
            btn_imprimir.style.display = 'none';
            window.print();
        }
    </script>
</html>
