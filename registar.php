<?php

        session_start();

        require_once("connection.php");

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // 1- criar query para a base de dados
        $sqlQuery = "INSERT INTO utilizadores (username, email, password) VALUES (?, ?, ?)";

        // 2 - inicializar a query com a base de dados (prepare statement)
        $ps = $conn->prepare($sqlQuery);

        // 3 - associar os parametros de input
        $ps->bind_param("sss",$username, $email, $password);

        // 4 - executar a query com os parametros associados
        $ps->execute();

        //  libertar a memoria do resultado da query
        $ps->free_result();

        // encerrar a variavel
        $ps->close();

        // terminar a ligação à base de dados
        $conn->close();

        //encerrar as sessoes
        session_write_close();
        header("location:".$_SERVER['HTTP_REFERER']);
        exit();

?>