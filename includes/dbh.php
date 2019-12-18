<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "crud_php";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
//$dbName = "CREATE DATABASE crud-php";

if (!$conn) {
	die('error with database');
}else{
	// do something if you need
}

?>
