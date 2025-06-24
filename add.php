include('config/db.php'); //mao ni pang connect sa database

<?php 

<form method="POST">
  First Name: <input name="firstname"><br>
  Last Name: <input name="lastname"><br>
  Year Graduated: <input name="year_graduated" type="number" min="1900" max="2099"><br>
  Course Graduated: <input name="course_graduated"><br>
  Gender:
  <select name="gender">
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
  </select><br>
  Current Job: <input name="current_job"><br>
  <button type="submit">Add Alumni</button>
</form>

?>
