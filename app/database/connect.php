<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "blog";


$conn = new MySQLI($host, $user, $pass, $db_name);

if($conn->connect_error){
	die("CONNECTION ERROR")  . $conn->connect_error;

}
// else{
// 	echo "CONTECTED";
// }