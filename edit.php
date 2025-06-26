<?php
include('C:\xampp\htdocs\alumni_tracker\config.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM alumni WHERE id = $id");
$alumni = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Edit Alumni</h2>
    <form method="POST" action="../actions/update.php">
        <input type="hidden" name="id" value="<?= $alumni['id'] ?>">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="first_name" class="form-control" value="<?= $alumni['first_name'] ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="last_name" class="form-control" value="<?= $alumni['last_name'] ?>" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="year_graduated" class="form-control" value="<?= $alumni['year_graduated'] ?>" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="course_graduated" class="form-control" value="<?= $alumni['course_graduated'] ?>" required>
            </div>
            <div class="col-md-3">
                <select name="gender" class="form-select" required>
                    <option value="Male" <?= $alumni['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $alumni['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="current_job" class="form-control" value="<?= $alumni['current_job'] ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="current_employer" class="form-control" value="<?= $alumni['current_employer'] ?>" required>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="list.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
