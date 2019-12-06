<?php

function connect()
{
    $connect = mysqli_connect("localhost", "root", '', "mesport");
    

    if ($connect) {
        return $connect;
    } else {
        die('Connection Failed');
    }
}

?>