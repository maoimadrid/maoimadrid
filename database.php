<?php
$hostname = "localhost"; 
$dbUser = "root";
$dbPass = "";
$dbName = "maomao";

$conn = mysqli_connect($hostname, $dbUser, $dbPass, $dbName); 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
?>