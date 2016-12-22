<?php


	$db_host = "localhost";
	$db_name = "afdentor_db";
	$db_user = "afdentor_us";
	$db_pass = "19485858";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


?>