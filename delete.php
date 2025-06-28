<?php
include('C:\xampp\htdocs\alumni_tracker\config.php');

$id = $_GET['id'];
$qry = "DELETE FROM alumni WHERE id = '$id';";

if ($conn->query($qry) === TRUE) {
    echo "Alumni deleted successfully!";
    header("Location: ../views/list.php");
    exit();
} 
else 
{
    echo "MySQLi error: " . $conn->error;
}

$conn->close();
?>
