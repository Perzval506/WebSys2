<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$id = $_GET['id'] ?? null;
if (!$id) exit('Missing ID.');
require __DIR__ . '/../config.php';

$res = $conn->query("SELECT * FROM alumni WHERE id=$id")
     or die('SQL error: ' . $conn->error);
$alumni = $res->fetch_assoc() ?: exit('Alumni not found');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Alumni</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
  <link rel="stylesheet" href="/simple/assets/css/style.css">
</head>
<body>
  <div class="container-max">
    <div class="card-liquid">
      <h2>Edit Alumni</h2>
      <form class="row gy-4" method="POST" action="../update.php">
        <input type="hidden" name="id" value="<?= $alumni['id'] ?>">
        <div class="col-md-6">
          <input name="first_name" class="form-control"
                 value="<?= $alumni['first_name'] ?>" required>
        </div>
        <div class="col-md-6">
          <input name="last_name" class="form-control"
                 value="<?= $alumni['last_name'] ?>" required>
        </div>
        <div class="col-md-3">
          <input name="year_graduated" class="form-control" type="number"
                 value="<?= $alumni['year_graduated'] ?>" required>
        </div>
        <div class="col-md-4">
          <input name="course_graduated" class="form-control"
                 value="<?= $alumni['course_graduated'] ?>" required>
        </div>
        <div class="col-md-2">
          <select name="gender" class="form-select" required>
            <?php foreach (['Male','Female','Other'] as $g): ?>
              <option <?= $g===$alumni['gender']?'selected':'' ?>><?= $g ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-5">
          <input name="current_job" class="form-control"
                 value="<?= $alumni['current_job'] ?>" required>
        </div>
        <div class="col-md-5">
          <input name="current_employer" class="form-control"
                 value="<?= $alumni['current_employer'] ?>" required>
        </div>
        <div class="col-12">
          <button class="btn-add w-100">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
