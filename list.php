<?php
// views/list.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/../config.php';

$result = $conn->query("SELECT * FROM alumni ORDER BY date_added DESC")
           or die('❌ SQL error: ' . $conn->error);

$alumni = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Alumni List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h2>Alumni Tracer System</h2>

    <!-- Add form -->
    <form class="row g-3 my-4" method="POST" action="../actions/add.php">
      <div class="col-md-6">
        <input name="first_name"      type="text"  class="form-control" placeholder="First Name"      required>
      </div>
      <div class="col-md-6">
        <input name="last_name"       type="text"  class="form-control" placeholder="Last Name"       required>
      </div>
      <div class="col-md-3">
        <input name="year_graduated"  type="number"class="form-control" placeholder="Year Graduated"  required>
      </div>
      <div class="col-md-3">
        <input name="course_graduated"type="text"  class="form-control" placeholder="Course"          required>
      </div>
      <div class="col-md-3">
        <select name="gender" class="form-select" required>
          <option selected disabled>Gender</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="col-md-3">
        <input name="current_job"     type="text"  class="form-control" placeholder="Current Job"     required>
      </div>
      <div class="col-md-6">
        <input name="current_employer"type="text"  class="form-control" placeholder="Current Employer"required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success">Add Alumni</button>
      </div>
    </form>

    <!-- Alumni table -->
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Graduation</th>
          <th>Gender</th>
          <th>Job</th>
          <th>Employer</th>
          <th>Date Added</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($alumni): ?>
          <?php foreach ($alumni as $a): ?>
            <tr>
              <td><?= htmlspecialchars($a['first_name'].' '.$a['last_name']) ?></td>
              <td><?= htmlspecialchars($a['course_graduated'].' ('.$a['year_graduated'].')') ?></td>
              <td><?= htmlspecialchars($a['gender']) ?></td>
              <td><?= htmlspecialchars($a['current_job']) ?></td>
              <td><?= htmlspecialchars($a['current_employer']) ?></td>
              <td><?= htmlspecialchars($a['date_added']) ?></td>
              <td>
                <a href="edit.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="../actions/delete.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this alumni?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center">No records found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
