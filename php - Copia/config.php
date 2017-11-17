<?php 

	$dsn = "mysql:dbname=twitter;host=localhost;charset=utf8mb4";
	$dbuser = "root";
	$dbpass = "";
	try {
		$pdo = new PDO($dsn, $dbuser, $dbpass);
	} catch (PDOException $e) {
		echo "Falhou:".$e->getMessage();
	}
?>