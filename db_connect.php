<?php
$server = "localhost";
$username = "titi";
$password = "titi";
$db = "stock";
$conn = mysqli_connect($server,$username,$password,$db);

$request_method = $_SERVER["REQUEST_METHOD"];
?>