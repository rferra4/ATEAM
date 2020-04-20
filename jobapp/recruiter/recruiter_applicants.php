
<!-- UNUSED?-->

<?php include 'inc/rheader2.php'; ?>

<html>
<body>
<?php
require_once '../config/app_config.php';


$query = "SELECT * FROM Applicants";





if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Applicants_ID"];
        $field2name = $row["Name"];
        $field3name = $row["Last_Name"];
        $field4name = $row["Resume"];
        $field5name = $row["StatusOfApplication"];

?>
<head>
<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
</style>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Applicants</title>
    <link rel="stylesheet" href="rstyle.css"/>

<div class="hero">
  <div class="applicant-box">
    <div class="app-title" style="width:100%">
              <h5>'.$field3name.', '.$field2name.'</h5>
    </div>

    <div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h3>Interview Reminder</h3>

    <label for="email"><b>Applicant: '.$field3name.', '.$field2name.'</b></label>
    <label for="email"><b>Email: *get email from db*</b></label>

    <label for="psw"><b>Date of Interview:</b></label>
    <input type="date" placeholder="Enter Date of Interview:" name="psw" required>

    <label for="psw"><b>Time of Interview:</b></label>
    <input type="time" placeholder="Enter Date of Interview:" name="psw" required>

    <button type="submit" class="btn">Send Reminder</button>
    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

      <table class="app-table" style="width:100%">
      <tr>
          <th>ID</th>
          <th>Resume</th>
          <th>Status of Application</th>
      </tr>
      <tr>
          <td>'.$field1name.'</td>
          <td>'.$field4name.'</td>
          <td>'.$field5name.'</td>
      </tr>
      </table>
      <button class="reminder-btn" onclick="openForm()">Send Reminder About Interview</button>

      <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>';
    }
    $result->free();
}
?>

</body>
</html>
