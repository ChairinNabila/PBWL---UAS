<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan_telur";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
