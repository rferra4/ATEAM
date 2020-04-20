<!-- employee letter Recommendation page (UNUSED)-->
<?php include 'inc/eheader2.php'; ?>
      <<h1 class="display-4">Employee Request Recommendation Letter Page</h1>

<?php include 'inc/efooter.php'; ?>

 <?php

 session_start();

 if(!isset($_SESSION['employee_login'])) //check unauthorize user not direct access in "employee_home.php" page
 {
  header("location: ../index.php");
 }

 if(isset($_SESSION['admin_login'])) //check admin login user not access in "employee_home.php" page
 {
  header("location: ../admin/admin_home.php");
 }

 if(isset($_SESSION['user_login'])) //check user login user not access in "employee_home.php" page
 {
  header("location: ../user/user_home.php");
 }

 if(isset($_SESSION['employee_login']))
 {
 ?>
  Welcome,
 <?php
  echo $_SESSION['employee_login'];
 }
 ?>
 </h3>
  <a href="../logout.php">Logout</a>
</center>
