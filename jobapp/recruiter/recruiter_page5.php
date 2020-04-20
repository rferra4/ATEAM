<?php include 'inc/rheader2.php'; ?>
<center>
 <h1>Page 5</h1>

 <h3>
   <?php include 'inc/rfooter.php'; ?>
 <?php
  session_start();

  if(!isset($_SESSION['admin_login'])) //check unauthorize user not direct access in "admin_home.php" page
  {
   header("location: ../index.php");
  }

  if(isset($_SESSION['employee_login'])) //check employee login user not access in "admin_home.php" page
  {
   header("location: ../employee/employee_home.php");
  }

  if(isset($_SESSION['user_login'])) //check user login user not access in "admin_home.php" page
  {
   header("location: ../user/user_home.php");
  }

  if(isset($_SESSION['admin_login']))
  {
  ?>
   Welcome,
  <?php
   echo $_SESSION['admin_login'];
  }
  ?>
 </h3>
  <a href="../logout.php">Logout</a>
</center>
