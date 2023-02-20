<?php 

$dbhost = 'localhost';      // Host de MYSQL.
$dbuser = 'root';   // Usuario de HOST.
$dbpass = '';  //Password del HOST.
$dbname = 'test_inv';       // Base de datos de HOST
    

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	set_exception_handler(function($e) {
	error_log($e->getMessage());
	exit('Error connecting to database'); //Should be a message a typical user could understand
	});
   
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	
	$mysqli->set_charset("utf8mb4"); 













