<?php
$host="localhost";
$username="root";
$pass="";
$dbname="dbms_project";

$connection=mysqli_connect($host,$username, $pass, $dbname);

if(mysqli_connect_errno()){
	die("database failed to connect: " . mysqli_connect_error() . "  (". mysqli_connect_error() . ");");
}

?>