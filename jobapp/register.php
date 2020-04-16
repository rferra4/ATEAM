<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<?php
require_once "connection.php";

if(isset($_REQUEST['btn_register'])) //check button name "btn_register" and set this
{
 $username = $_REQUEST['txt_username']; //textbox name "txt_username"
 $email  = $_REQUEST['txt_email']; //textbox name "txt_email"
 $password = $_REQUEST['txt_password']; //textbox name "txt_password"
 $role  = $_REQUEST['txt_role']; //select option name "txt_role"

 if(empty($username)){
  $errorMsg[]="Please enter username"; //check username textbox not empty or null
 }
 else if(empty($email)){
  $errorMsg[]="Please enter email"; //check email textbox not empty or null
 }
 else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errorMsg[]="Please enter a valid email address"; //check proper email format
 }
 else if(empty($password)){
  $errorMsg[]="Please enter password"; //check passowrd textbox not empty or null
 }
 else if(strlen($password) < 6){
  $errorMsg[] = "Password must be atleast 6 characters"; //check passowrd must be 6 characters
 }
 else if(empty($role)){
  $errorMsg[]="Please select role"; //check not select role
 }
 else
 {
  try
  {
   $select_stmt=$db->prepare("SELECT username, email FROM masterlogin
          WHERE username=:uname OR email=:uemail"); // sql select query
   $select_stmt->bindParam(":uname",$username);
   $select_stmt->bindParam(":uemail",$email);      //bind parameters
   $select_stmt->execute();
   $row=$select_stmt->fetch(PDO::FETCH_ASSOC); //execute query and fetch record store in "$row" variable

   if($row["username"]==$username){
    $errorMsg[]="Sorry username already exists"; //check new user type username already exists or not in username textbox
   }
   else if($row["email"]==$email){
    $errorMsg[]="Sorry email already exists"; //check new user type email already exists or not in email textbox
   }

   else if(!isset($errorMsg))
   {
    $insert_stmt=$db->prepare("INSERT INTO masterlogin(username,email,password,role) VALUES(:uname,:uemail,:upassword,:urole)"); //sql insert query
    $insert_stmt->bindParam(":uname",$username);
    $insert_stmt->bindParam(":uemail",$email);     //bind all parameter
    $insert_stmt->bindParam(":upassword",$password);
    $insert_stmt->bindParam(":urole",$role);

    if($insert_stmt->execute())
    {
     $registerMsg="Register Successfully.....Wait Login page"; //execute query success message
     header("refresh:4;index.php"); //refresh 4 second and redirect to index.php page
    }
   }
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
  }
 }
}
?>
<div class="hero">
  <div class="form-box">
    <div class="button-box">
                <div id="btn"></div>

            </div>

<form id = "LOGIN" class = "input-group" method="post" >
<h3 class="input-field-title">Register</h3>
 <input type="text" name="txt_username" class="input-field" placeholder="enter username" />


 <input type="text" name="txt_email" class="input-field" placeholder="enter email" />

 <input type="password" name="txt_password" class="input-field" placeholder="enter passowrd" />

  <select class="input-field" name="txt_role">
   <option value="" selected="selected"> - select role - </option>
   <option value="employee">Employee</option>
   <option value="user">User</option>
  </select>
  <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>


 <input type="submit"  name="btn_register" class="submit-btn" value="Register">

 <p class = "link"> Already have an account? <a href="index.php">Login Here</a></p>
</div>
</div>

</form>
</body>
</html>
