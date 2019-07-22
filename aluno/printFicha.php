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
                width: 450px;
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
                margin: 0;
                text-align: center;
            }
            #dados{
                margin-top: 15px;
                width: 75%;
                padding-left: 10px;
            }
            #dados p{
                margin: 0 0 5px 5px;
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

	$sql = "SELECT * FROM aluno WHERE id = '$id'";



	$res = mysqli_query($con, $sql);

    $dados = mysqli_fetch_array($res);
	$nome = $dados['nome'];
	$rg = $dados['rg'];
	$turno = $dados['turno'] == 1 ? 'Matutino' : 'Noturno';
	$ano = date('Y');
	$nivel = $dados['grauensino'] == 1 ? 'Fundamental' : 'Médio';
	$numero = $dados['id'];
	$orgao_expeditor = $dados['orgaoExpedidor'];
	$cpf = $dados['cpf'];
	$nome_mae = $dados['mae'];
	$nome_pai = $dados['pai'];
    $titulo_eleitor = $dados['tituloEleitor'];
    $reservista = $dados['reservista'];
    $sexo = $dados['sexo'];
    $estado_civil = $dados['estadoCivil'];
    $logradouro = $dados['logradouro'];
    $numero_casa = $dados['numeroResidencial'];
    $bairro = $dados['bairro'];
    $complemento = $dados['complemento'];
    $cidade = $dados['cidade'];
    $cep = $dados['cep'];
    $whatsapp = $dados['telefone'];
    $celular = $dados['celular'];
    $email = $dados['email'];
    $status = $dados['email'] == 1 ? 'Ativo' : 'Inativo';

    echo "<script>document.title = 'Ficha de $nome'</script>";
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

        <div id="div_carteirinha">
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



	</body>

    <script>
        function imprimir(){
            var btn_imprimir = document.getElementById('imprimir');
            btn_imprimir.style.display = 'none';
            window.print();
        }
    </script>
</html>
