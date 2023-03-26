<?php
$host = "localhost";
$dbname = "benna";
$username = "root";
$pasword = "";
$mysql = new mysqli(
    hostname: $host,
    username: $username,
    password: $pasword,
    database: $dbname
);
if ($mysql->connect_errno) {
    die("connect error : " . $mysql->connect_error);
}
return $mysql;
?>