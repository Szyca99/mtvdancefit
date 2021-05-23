<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "mtvdancefit";
$servername = "localhost";


$conn = mysqli_connect($servername, $user, $pass, $dbname);

if(!$conn) {
    die( "<script>alert('Connection Failed')</script>");
}