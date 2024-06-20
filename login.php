<?php
// iniciar sessao php
	session_start();

	// validar se o login já existe
	if(isset($_SESSION['user'])){
        //  utilizador já está com login feito
        header("location:".$_SERVER['HTTP_REFERER']);
        exit();
    }

	// importar ligação à base de dados do ficheiro connection.php
	require_once("connection.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	// 1- criar query para a base de dados
	$sqlQuery = "SELECT * FROM utilizadores WHERE email=? && password=?";

	// 2 - inicializar a query com a base de dados (prepare statement)
    $ps = $conn->prepare($sqlQuery);

	// 3 - associar os parametros de input
	$ps->bind_param("ss", $email, $password);

	// 4 - executar a query com os parametros associados
	$ps->execute();

	// 5 - apanhar os resultados
	$result = $ps->get_result();

	//6 - vamos interpretar o numero de resultados
	$numberOfRows = $result->num_rows;

	if($numberOfRows == 1){
        // login valido, o email existe e a password corresponde
        $_SESSION['user'] = $email;
        while($row = $result->fetch_assoc()) {
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['username'] = $row['username'];
        }
        header("location:".$_SERVER['HTTP_REFERER']);
        exit();
    }

	//  libertar a memoria do resultado da query
	$ps->free_result();

	// encerrar a variavel
	$ps->close();

	// terminar a ligação à base de dados
	$conn->close();

	//encerrar as sessoes
	session_write_close();
    header("location:".$_SERVER['HTTP_REFERER']);
?>