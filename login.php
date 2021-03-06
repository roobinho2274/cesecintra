<?php
session_start();
//Inclui os arquivos que contém as conexões e as funções em PHP
include_once ("funcoes.php");
include_once ("conexao.php");
//Pega dos dados que vem de index.php atráves do metódo post usando filtro
$usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
//Chama função que verifica usuário no banco e retorna o tipo de usuário
$tipo = validasuario($usuario, $senha, $con);
//verifica se a variável global de sessão que contém o tipo de usuário está setada
if (isset($_SESSION['tipoUsuario'])) {
    unset($_SESSION['tipoUsuario']);
}
//atribui valor a variável global de sessão
$_SESSION['tipoUsuario'] = $tipo;
//Verifica o tipo de usuário que fez o login e e encaminha para pagina específica
if ($tipo == "adm") {
    header('location: paginaInicialAdm.php');
} else if ($tipo == "disciplina") {

    $query = "SELECT p.*, d.descricao as nome_disc FROM professor AS p JOIN disciplina AS d ON d.id = p.idDisc WHERE p.login LIKE '$usuario' AND p.senha LIKE '$senha'";
    $result = mysqli_query($con, $query);
    $r = mysqli_fetch_assoc($result);

    $_SESSION['usuario_disciplina'] = $r['nome_disc'];
    $_SESSION['usuario_disciplina_id'] = $r['idDisc'];

    header('location: frequencia_disc/controleFrequencia.php');
}else{
    //Variável global de sessão que informa erro de Login quando a senha ou usuário é inválido
    $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'>Usuário inválido!</div> ";
    header('location: index.php');
}

