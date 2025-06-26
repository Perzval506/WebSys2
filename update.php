<?php
include('C:\xampp\htdocs\alumni_tracker\config.php');

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$year_graduated = $_POST['year_graduated'];
$course_graduated = $_POST['course_graduated'];
$gender = $_POST['gender'];
$current_job = $_POST['current_job'];
$current_employer = $_POST['current_employer'];

$qry = "
UPDATE alumni
SET 
    first_name='$first_name',
    last_name='$last_name',
    year_graduated='$year_graduated',
    course_graduated='$course_graduated',
    gender='$gender',
    current_job='$current_job',
    current_employer='$current_employer'
WHERE id = '$id';
";

if ($conn->query($qry) === TRUE) {
    echo "Update successful!";
    header("Location: ../views/list.php");
    exit();
} else {
    echo "MySQLi error: " . $conn->error;
}

$conn->close();
?>
