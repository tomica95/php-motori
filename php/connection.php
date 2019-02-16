<?php

# 2 - Kreiranje konekcije sa bazom

// Ukljucivanje fajla u kome se nalaze parametri za konekciju sa bazom
require_once "config.php";

try {
	// Kreiranje konekcije sa bazom
    
	$connection = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DBNAME.";charset=utf8", MYSQL_USERNAME, MYSQL_PASSWORD);
	
	// Ukljucivanje Error reporting
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Promena DEFAULT moda vracanja podataka iz baze - objekti
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo $e->getMessage();
}






