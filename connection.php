<?php

    $dbHost = 'localhost';
    $dbName = 'tw';
    $dbUser = 'root';
    $dbPass = '';

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);

    if ($conn->connect_errno) {

        die('Error: ' . $conn->connect_error);

    } else {
    }

?>