<?php

function validasuario($user, $pwd, $con) {
    $query = "SELECT * FROM professor WHERE professor.login LIKE '" . $user .
            "' AND professor.senha LIKE '" . $pwd . "'";

    $result = mysqli_query($con, $query);
    $r = mysqli_fetch_assoc($result);
    //echo $query;

    return $r['tipo'];
}

function listaAlunos($con) {
    $query = "SELECT * FROM aluno ";

    $result = mysqli_query($con, $query);
    return $result;
}

function executa($query, $con) {

    $res = mysqli_query($con, $query);
    return $res;
}
