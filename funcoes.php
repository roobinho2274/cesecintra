<?php

function validasuario($user, $pwd, $con) {
    $query = "SELECT * FROM professor WHERE professor.login LIKE '" . $user .
            "' AND professor.senha LIKE '" . $pwd . "'";

    $result = mysqli_query($con, $query);
    $r = mysqli_fetch_assoc($result);
   echo $query;
    
    return $r['tipo'];
}

function listaAlunos()
{
    $query = "SELECT * FROM alunos '";

    $result = mysqli_query($con, $query);
    
    return $result;
}
