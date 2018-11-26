<?php
//Inciai sessão
session_start();
//Inclui os arquivos de conexáo e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

//Query para consulta no banco de todas as disciplinas
$query = "SELECT * FROM disciplina";
//Recebe o resultad da execução da query anterios pela função executa
$resultado = mysqli_query($con, $query);
//Mostra o resultado na tela
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css" >

        <title>Login</title>
    </head>
    <body>
        <div class = "container" >
            <table class="table table-sm table-striped table-bordered table-hover" >
                <h2>Lista de Disciplinas</h2>
                <?php
                //Verifica se a variável global de mensagem está setada, a exibe e depois limpa
                if (isset($_SESSION['msn'])) {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
                }
                ?>
                <thead class = "table-dark">
                    <tr>
                        <th scope = "col">ID</th>
                        <th scope = "col">Nome</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Curso</th>
                        <th scope = "col">Professor</th>
                    </tr>
                </thead>
                <tbody><?php
                    while ($r = mysqli_fetch_assoc($resultado)) {
                        echo"<tr>"
                        . "<th scope = 'row'>" . $r['id'] . "</th>"
                        . "<td>" . $r['descricao'] . "</td>";

                        if ($r['idGrauEnsino'] == 1) {
                            echo "<td class='d-none d-md-table-cell'>Ensino Médio</td>";
                        } elseif ($r['idGrauEnsino'] == 2) {
                            echo "<td class='d-none d-md-table-cell'>Ensino Fundamental</td>";
                        } else {
                            echo "<td class='d-none d-md-table-cell'>Não encontrado</td>";
                        }
                        $queryProf = "SELECT professor.nome FROM professor WHERE professor.id =" . $r['idProf'] . ";";
                        $resProf = mysqli_fetch_assoc(executa($queryProf, $con));
                        echo "<td >" . $resProf['nome'] . "</td>";
                        echo"</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-primary " href="../disciplina/controleDisciplinas.php" role="button">Voltar</a>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

