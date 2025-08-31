<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mahasiswa";

$conn = new mysqli("localhost", "root", "", "your_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

