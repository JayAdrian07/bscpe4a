<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbbscpe4a";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
?>