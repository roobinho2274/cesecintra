<?php
//Inciai sessão
session_start();
//Inclui os arquivos de conexáo e funções
include_once ("../conexao.php");
include_once ("../funcoes.php");

//Query para consulta no banco de todas as disciplinas
$query = "SELECT * FROM matricula ORDER BY id";
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

        <title>Lista de Matrícula</title>
    </head>
    <body>
        <div class = "container" >
            <table class="table table-sm table-striped table-bordered table-hover" >
                <h2>Lista de Matrículas</h2>
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
                        <th scope = "col">Disciplina</th>
                        <th scope = "col">Turno</th>
                        <th scope = "col">Horário</th>
                        <th scope = "col">Status</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 1</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 2</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 3</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 4</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Nota 5</th>
                        <th scope = "col" class = "d-none d-md-table-cell">Média</th>
                        <!--
                            <th scope = "col">Professor</th>
                        -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($r = mysqli_fetch_assoc($resultado)) {
                            echo"<tr>"
                            . "<th scope = 'row'>" . $r['id'] . "</th>";
                            // . "<td>" . $r['descricao'] . "</td>";
                            $queryAluno = "SELECT nome FROM aluno WHERE id =" . $r['idAluno'] . ";";
                            $resAluno = mysqli_fetch_assoc(executa($queryAluno, $con));
                            echo "<td >" . $resAluno['nome'] . "</td>";

                            $queryDisciplina = "SELECT descricao FROM disciplina WHERE id =" . $r['idDisciplina'] . ";";
                            $resDisciplina = mysqli_fetch_assoc(executa($queryDisciplina, $con));
                            echo "<td >" . $resDisciplina['descricao'] . "</td>";

                            $queryTurno = "SELECT descricao FROM turno WHERE id =" . $r['idTurno'] . ";";
                            $resTurno = mysqli_fetch_assoc(executa($queryTurno, $con));
                            echo "<td >" . $resTurno['descricao'] . "</td>";

                            echo "<td>".$r['horaAula']."</td>";

                            echo "<td>".$r['status']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota1']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota2']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota3']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota4']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['nota5']."</td>";

                            echo "<td class='d-none d-md-table-cell'>".$r['media']."</td>";

                            echo"</tr>";
                            /*
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
                            */
                        }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-primary " href="../matriculas/controleMatriculas.php" role="button">Voltar</a>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

