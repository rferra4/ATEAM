<link rel="stylesheet" href="css/style.css"/>

<?php
require_once 'connection.php';

session_start();

if(isset($_SESSION["admin_login"])) //check condition admin login not direct back to index.php page
{
 header("location: recruiter/recruiter_home.php");
}
if(isset($_SESSION["employee_login"])) //check condition employee login not direct back to index.php page
{
 header("location: employee/employee_verify.php");
}
if(isset($_SESSION["user_login"])) //check condition user login not direct back to index.php page
{
 header("location: user/user_home.php");
}

if(isset($_REQUEST['btn_login'])) //login button name is "btn_login" and set this
{
 $email  =$_REQUEST["txt_email"]; //textbox name "txt_email"
 $password =$_REQUEST["txt_password"]; //textbox name "txt_password"
 $role  =$_REQUEST["txt_role"];  //select option name "txt_role"

 if(empty($email)){
  $errorMsg[]="please enter email"; //check email textbox not empty or null
 }
 else if(empty($password)){
  $errorMsg[]="please enter password"; //check passowrd textbox not empty or null
 }
 else if(empty($role)){
  $errorMsg[]="please select role"; //check select option not empty or null
 }
 else if($email AND $password AND $role)
 {
  try
  {
   $select_stmt=$db->prepare("SELECT email,password,role FROM masterlogin
          WHERE
          email=:uemail AND password=:upassword AND role=:urole"); //sql select query
   $select_stmt->bindParam(":uemail",$email);
   $select_stmt->bindParam(":upassword",$password); //bind all parameter
   $select_stmt->bindParam(":urole",$role);
   $select_stmt->execute(); //execute query

   while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) //fetch record from MySQL database
   {
    $dbemail =$row["email"];
    $dbpassword =$row["password"];  //fetchable record store new variable they are "$dbemail","$dbpassword","$dbrole"
    $dbrole  =$row["role"];
   }
   if($email!=null AND $password!=null AND $role!=null) //check taken fields not null after countinue
   {
    if($select_stmt->rowCount()>0) //check row greater than "0" after continue
    {
     if($email==$dbemail AND $password==$dbpassword AND $role==$dbrole) //check type textbox email,password,role and fetchable record new variables are true after continue
     {
      switch($dbrole)  //role base user login start
      {
       case "recruiter":
        $_SESSION["admin_login"]=$email;   //session name is "admin_login" and store in "$email" variable
        $loginMsg="Admin... Successfully Login..."; //admin login success message
        header("refresh:0; recruiter/recruiter_home.php"); //refresh 3 second after redirect to "admin_home.php" page
        break;

       case "employee":
        $_SESSION["employee_login"]=$email;    //session name is "employee_login" and store in "$email" variable
        $loginMsg="Employee... Successfully Login...";  //employee login success message
        header("refresh:0; employee/employee_home.php"); //refresh 3 second after redirect to "employee_home.php" page
        break;

       case "user":
        $_SESSION["user_login"]=$email;    //session name is "user_login" and store in "$email" variable
        $loginMsg="User... Successfully Login..."; //user login success message
        header("refresh:0; user/user_home.php");  //refresh 3 second after redirect to "user_home.php" page
        break;

       default:
        $errorMsg[]="wrong email or password or role";
      }
     }
     else
     {
      $errorMsg[]="wrong email or password or role";
     }
    }
    else
    {
     $errorMsg[]="wrong email or password or role";
    }
   }
   else
   {
    $errorMsg[]="wrong email or password or role";
   }
  }
  catch(PDOException $e)
  {
   $e->getMessage();
  }
 }
 else
 {
  $errorMsg[]="wrong email or password or role";
 }
}
?>

<form class="form" method="post" name="login">
  <h1 class="login-title">Login</h1>
  <input type="text" class="login-input" name="txt_email" placeholder="enter email" autofocus="true"/>
  <input type="password" class="login-input" name="txt_password" placeholder="enter password" autofocus="true"/>
  <select class="login-input" name="txt_role">
   <option value="" selected="selected"> - select role - </option>
   <option value="recruiter">Recruiter</option>
   <option value="employee">Employee</option>
   <option value="user">User</option>
  </select>


 <input type="submit" name="btn_login" class="login-button" value="Login">
 <p class="link"> Don't have an account? <a href="register.php">Sign Up</a></p>


</form>
