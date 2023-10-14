<?php
$host="localhost";
$user="root";
$pass="";
$dbname="loginsystem";

$conn=mysqli_connect($host,$user, $pass, $dbname);

/*if(mysqli_connect_errno()){
	die("database failed to connect: " . mysqli_connect_error() . "  (". mysqli_connect_error() . ");");
}*/

?>