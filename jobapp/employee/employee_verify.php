
<form class="form" method="post" name="login">
    <h1 class="login-title">Enter Employee ID Number to access</h1>
    <input type="text" class="login-input" name="username" placeholder="ID Number" autofocus="true"/>
    <input type="submit" value="Login" name="submit" class="login-button"/>
    <p class="link">Don't have an account? <a href="registration.php">Sign Up</a></p>
</form>



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
