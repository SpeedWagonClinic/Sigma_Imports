<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Tailor it for your database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Website";


$dbh = 'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dbh, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
