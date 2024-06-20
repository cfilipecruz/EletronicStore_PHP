<?php

    require_once("connection.php");

    session_start();

    $target_dir = "image";
    $target_file = $target_dir .'/'. basename($_FILES["Upload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $nome=$_POST['nome'];
    $preco=$_POST['preco'];
    $descricaon=$_POST['descricaon'];
    $descricaop=$_POST['descricaop'];
    $stock=$_POST['stock'];
    $type=$_POST['type'];

    if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {

    }
        $sqlQuery = "INSERT INTO produto (nome, preco, descricaon, descricaop, stock, type, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $ps = $conn->prepare($sqlQuery);
        $ps->bind_param("sississ",$nome, $preco, $descricaon, $descricaop, $stock, $type, $target_file);
        $ps->execute();
        $result = $ps->get_result();
        header("location:admin.php");
?>