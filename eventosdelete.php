<?php

    session_start();

    require("connection.php");

    $id = $_GET['id'];


    $sqlQuery = "DELETE FROM evento WHERE id=?";

    $ps = $conn->prepare($sqlQuery);

    $ps->bind_param("i", $id);

    $ps->execute();

    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
?>