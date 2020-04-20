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
    <div class="button-box" style="width:100%">
        <div id="btn"></div>
              <button type="button" class="toggle-btn" onclick="user()" style="width:30%">User</button>
              <button type="button" class="toggle-btn" onclick="employee()" style="width:30%">Employee</button>
              <button type="button" class="toggle-btn" onclick="recruiter()" style="width:30%">Recruiter</button>
    </div>


      <!---------------------------------------------------------------------------------------------------->
      <!-- USER Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="USER" class="input-group" method="post"  >

      <h3 class="register-title">User Registration</h3>
        <input type="text" name="txt_firstname" class="input-field" placeholder="First Name" />
        <input type="text" name="txt_lastname" class="input-field" placeholder="Last Name" />
        <input type="text" name="txt_username" class="input-field" placeholder="Username" />
        <input type="text" name="txt_email" class="input-field" placeholder="Email" />
        <input type="password" name="txt_password" class="input-field" placeholder="Password" />
        <input type="checkbox" class="check-box-user" name = "txt_role" value = "user"><span class="terms-text">I agree to the terms & conditions</span>

        <input type="file" name="resume"class="resume-btn"  hidden="hidden">
        <button type="button"class="resume-btn">Upload Resume</button>
        <span class="resume-btn-text">No file chosen, yet.</span>

              <!--<select class="input-field" name="txt_role">
               <option value="" selected="selected"> - select role - </option>
               <option value="employee">Employee</option>
               <option value="user">User</option>
               <option value="recruiter">Recruiter</option>
             </select> -->

       <input type="submit"  name="btn_register" class="submit-btn-user" value="Register">


       <p class = "link"> Already have an account? <a href="index.php">Login Here</a></p>

      </form>


      <!---------------------------------------------------------------------------------------------------->
      <!-- EMPLOYEE Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="EMPLOYEE" class="input-group" method="post" >
      <h3 class="register-title">Employee Registration</h3>
        <input type="text" name="txt_firstname" class="input-field" placeholder="First Name" />
        <input type="text" name="txt_lastname" class="input-field" placeholder="Last Name" />
        <input type="text" name="txt_username" class="input-field" placeholder="Username" />
        <input type="text" name="txt_email" class="input-field" placeholder="Email" />
        <input type="password" name="txt_password" class="input-field" placeholder="Password" />
        <input type="text" name="txt_id" class="input-field" placeholder="Employee ID Number" />
              <!--<select class="input-field" name="txt_role">
               <option value="" selected="selected"> - select role - </option>
               <option value="employee">Employee</option>
               <option value="user">User</option>
               <option value="recruiter">Recruiter</option>
             </select> -->

       <input type="checkbox" class="check-box" name = "txt_role" value = "employee"> <span class="terms-text">I agree to the terms & conditions</span>
       <input type="submit"  name="btn_register" class="submit-btn" value="Register">

       <p class = "link"> Already have an account? <a href="index.php">Login Here</a></p>
      </form>

      <!---------------------------------------------------------------------------------------------------->
      <!-- RECRUITER Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="RECRUITER" class = "input-group" method="post" >
      <h3 class="register-title">Recruiter Registration</h3>
        <input type="text" name="txt_firstname" class="input-field" placeholder="First Name" />
        <input type="text" name="txt_lastname" class="input-field" placeholder="Last Name" />
        <input type="text" name="txt_username" class="input-field" placeholder="Username" />
        <input type="text" name="txt_email" class="input-field" placeholder="Email" />
        <input type="password" name="txt_password" class="input-field" placeholder="Password" />
              <!--<select class="input-field" name="txt_role">
               <option value="" selected="selected"> - select role - </option>
               <option value="employee">Employee</option>
               <option value="user">User</option>
               <option value="recruiter">Recruiter</option>
             </select> -->
       <input type="checkbox" class="check-box" name = "txt_role" value = "recruiter"> <span class="terms-text">I agree to the terms & conditions</span>
       <input type="submit"  name="btn_register" class="submit-btn" value="Register">

       <p class = "link"> Already have an account? <a href="index.php">Login Here</a></p>
      </form>

    </div>
</div>


<!--Script for switching between User, Employee, and Recruiter forms -->
<script>
    var w = document.getElementById("USER");
    var x = document.getElementById("EMPLOYEE");
    var y = document.getElementById("RECRUITER");
    var z = document.getElementById("btn");

    function user(){
        w.style.left = "50px";
        x.style.left = "400px";
        y.style.left = "400px";
        z.style.left = "0px";
    }
    function employee(){
        w.style.left = "-400px";
        x.style.left = "50px";
        y.style.left = "400px";
        z.style.left = "120px";
    }
    function recruiter(){
        w.style.left = "-400px";
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "240px";
    }

</script>

<!--Script for showing the chosen file for the upload resume button -->
<!--this script return the given file name without including the path-->
<script type="text/javascript">
    const resumeFile = document.getElementById("resume");
    const resumeBtn = document.getElementById("resume_button");
    const customText = document.getElementById("custom-text");

    resumeBtn.addEventListener("click", function(){
        resumeFile.click();
    });

    resumeFile.addEventListener("change", function(){
        if(resumeFile.value){
            customText.innerHTML = resumeFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        } else{
            customText.innerHTML = "No file chosen, yet."
        }
    });

</script>

</body>
</html>
