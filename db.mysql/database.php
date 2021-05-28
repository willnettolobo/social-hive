<?php

function connect()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "follow";

    $connect = mysqli_connect($server, $user, $password, $db);

    if (mysqli_errno($connect)) {
        die("Erro ao conectar " . mysqli_errno($connect));
    }
    return $connect;
}

?>