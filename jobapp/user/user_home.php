<?php include_once '../config/init.php'; ?>

<?php include '../templates/inc/user_page.php'; ?>
<center>
 <h1>User Page</h1>
<h3>
<?php

 session_start();

 if(!isset($_SESSION['user_login'])) //check unauthorize user not direct access in "user_home.php" page
 {
  header("location: ../index.php");
 }

 if(isset($_SESSION['admin_login'])) //check admin login user not access in "user_home.php" page
 {
  header("location: ../admin/admin_home.php");
 }

 if(isset($_SESSION['employee_login'])) //check employee login user not access in "employee_home.php" page
 {
  header("location: ../employee/employee_home.php");
 }

 if(isset($_SESSION['user_login']))
 {
 ?>

  Welcome,
 <?php
  echo $_SESSION['user_login'];

 }

 ?>

 </h3>
</center>
