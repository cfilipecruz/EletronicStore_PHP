<?php
        session_start();

        require("connection.php");

        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $descricaop = $_POST['descricaop'];

        $sqlQuery = "INSERT INTO evento (nome, data, descricaop) values (?,?,?)";

        $ps = $conn->prepare($sqlQuery);

        $ps->bind_param("sss", $nome, $data, $descricaop);

        $ps->execute();
        header("location:".$_SERVER['HTTP_REFERER']);
        exit();
?>