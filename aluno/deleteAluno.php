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
                if(isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                mysqli_select_db($con, $dbname );
                
                $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

                $query = sprintf('DELETE FROM aluno WHERE id= "'.$id.'" ');
                
                $resultado = executa($query, $con);
                
            