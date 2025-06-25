<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('❌ Invalid request method.');
}

include('config.php');


$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$year_graduated = $_POST['year_graduated'] ?? '';
$course_graduated = $_POST['course_graduated'] ?? '';
$gender = $_POST['gender'] ?? '';
$current_job = $_POST['current_job'] ?? '';
$current_employer = $_POST['current_employer'] ?? '';


if (
    empty($first_name) || empty($last_name) || empty($year_graduated) ||
    empty($course_graduated) || empty($gender) || empty($current_job) || empty($current_employer)
) {
    exit('❌ Missing required fields.');
}

$qry = "
    INSERT INTO alumni (
        first_name, last_name, year_graduated, course_graduated,
        gender, current_job, current_employer, date_added
    ) VALUES (
        '$first_name', '$last_name', '$year_graduated', '$course_graduated',
        '$gender', '$current_job', '$current_employer', NOW()
    );
";


if ($conn->query($qry) === TRUE) {
    header("Location: ../views/list.php");
    exit();
} else {
    echo "MySQLi error: " . $conn->error;
}

$conn->close();
?>
