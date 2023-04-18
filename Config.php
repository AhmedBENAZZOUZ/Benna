<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "benna";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}

mysqli_close($con);