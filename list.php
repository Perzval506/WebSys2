<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require __DIR__ . '/../config.php';

$res = $conn->query("SELECT * FROM alumni ORDER BY date_added DESC")
     or die('SQL error: ' . $conn->error);
$alumni = $res->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Alumni Directory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
  <link rel="stylesheet" href="/simple/assets/css/style.css">
</head>
<body>
  <div class="container-max">

   
    <div class="card-liquid mb-5">
      <h2>Add Alumni</h2>
      <form class="row gy-4" method="POST" action="../add.php">
        <div class="col-md-6">
          <input name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="col-md-6">
          <input name="last_name"  class="form-control" placeholder="Last Name" required>
        </div>
        <div class="col-md-3">
          <input name="year_graduated" class="form-control" type="number"
                 placeholder="Year Graduated" required>
        </div>
        <div class="col-md-4">
          <input name="course_graduated" class="form-control" placeholder="Course" required>
        </div>
        <div class="col-md-2">
          <select name="gender" class="form-select" required>
            <option value="" disabled selected>Gender</option>
            <option>Male</option><option>Female</option><option>Other</option>
          </select>
        </div>
        <div class="col-md-5">
          <input name="current_job" class="form-control" placeholder="Current Job" required>
        </div>
        <div class="col-md-5">
          <input name="current_employer" class="form-control" placeholder="Employer" required>
        </div>
        <div class="col-12">
          <button class="btn-add w-100">Add Alumni</button>
        </div>
      </form>
    </div>

   
    <div class="card-liquid">
      <h2>Alumni Directory</h2>
      <table class="table-liquid">
        <thead>
          <tr>
            <th>#</th><th>Name</th><th>Year</th><th>Course</th><th>Gender</th>
            <th>Job</th><th>Employer</th><th>Date Added</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alumni as $a): ?>
          <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['first_name'].' '.$a['last_name']) ?></td>
            <td><?= $a['year_graduated'] ?></td>
            <td><?= $a['course_graduated']) ?></td>
            <td><?= $a['gender'] ?></td>
            <td><?= $a['current_job']) ?></td>
            <td><?= $a['current_employer']) ?></td>
            <td><?= $a['date_added'] ?></td>
            <td class="actions">
              <a href="edit.php?id=<?= $a['id'] ?>" class="btn-ghost btn-sm mb-1">Edit</a>
              <a href="../delete.php?id=<?= $a['id'] ?>" class="btn-ghost btn-sm"
                 onclick="return confirm('Delete this alumni?')">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</body>
</html>
