<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
    $dsn = 'mysql:localhost=$servername;dbname=althealthdb';
	try{
		$db = new PDO($dsn, $username, $password);
		//	set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
		
		}
		catch (PDOException $e){
			echo 'Connection failed: ' .$e->getMessage();
			exit();
		}
 
