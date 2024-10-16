<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dreamjobs_php_database";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn,$user,$password);
$pdo->exec("SET time_zone = '+08:00';");


// Check Connection
if(mysqli_connect_error()){
    echo 'error';
}
?>