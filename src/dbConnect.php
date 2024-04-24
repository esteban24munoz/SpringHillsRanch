<?php

    require('dotenv').config();

    $connection = process.env.CONNECTION;
    $username = process.env.USERNAME;
    $password = process.env.PASSWORD;
    $database = process.env.DATABASE;

    //CONNECT TO DATABASE
    $mysqli = new mysqli($connection, $username, $password, $database);
?>