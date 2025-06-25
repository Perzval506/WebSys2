<?php
$host = 'localhost';
$user = 'root';
$pass = 'mearns0123';
$db   = 'backup';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
