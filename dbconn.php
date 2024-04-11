<?php

$servername = "192.168.100.17";
$dbusername = "sige";
$dbpassword = ""; 
$database = "dbcapstones";

try{	
	$conn = new PDO("mysql:host=$servername; dbname=$database", $dbusername);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}

?>