<?php

function connect()
{
    $connect = mysqli_connect("localhost", "root", '', "db_mesport");
    

    if ($connect) {
        return $connect;
    } else {
        die('Connection Failed');
    }
}

?>