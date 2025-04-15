<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "universe_db";
    $connection = "";

    try{
        $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }

    catch(mysqli_sql_exception){
        echo("Could not connect");
    }
    if($connection){
        echo("You are connected");
    }
?>