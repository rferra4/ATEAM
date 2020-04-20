<?php include_once '../config/init.php';?>
<?php include_once '../lib/Job.php'; ?>
<?php include 'inc/uheader.php';?>

<html>
  <div class="jumbotron">
    <h1 class="display-4">Search Job Listings</h1>
    <br>
    <p class="lead">Start connecting today!</p>
    <form method = "GET" action = "viewer.php">

      <select name= "field" class = "form-control">
      <option value = "" > Choose Job Field </option>
      <option value="Technology"> Technology </option>
      <option value="Engineering"> Engineering </option>
      <option value="Environment"> Environment </option>
      <option value="Arts"> Arts </option>
      <option value="Business"> Business </option>
      <option value="Education"> Education </option>
      <option value="Social Sciences"> Social Sciences </option>
      <option value="Communications"> Communications </option>
      <option value="Life Science"> Life Science </option>
      <option value="Other"> Other </option>
      </select>
      <br>


      <select name= "state" class = "form-control">
      <option value = "" > Choose Location </option>
      <option value="AL"> AL </option>
      <option value="AK"> AK </option>
      <option value="AZ"> AZ </option>
      <option value="AR"> AR </option>
      <option value="CA"> CA </option>
      <option value="CO"> CO </option>
      <option value="CT"> CT </option>
      <option value="DE"> DE </option>
      <option value="FL"> FL </option>
      <option value="GA"> GA </option>
      <option value="HI"> HI </option>
      <option value="ID"> ID </option>
      <option value="IL"> IL </option>
      <option value="IN"> IN </option>
      <option value="IA"> IA </option>
      <option value="KS"> KS </option>
      <option value="KY"> KY </option>
      <option value="LA"> LA </option>
      <option value="ME"> ME </option>
      <option value="MD"> MD </option>
      <option value="MA"> MA </option>
      <option value="MI"> MI </option>
      <option value="MN"> MN </option>
      <option value="MS"> MS </option>
      <option value="MO"> MO </option>
      <option value="MT"> MT </option>
      <option value="NE"> NE </option>
      <option value="NV"> NV </option>
      <option value="NH"> NH </option>
      <option value="NJ"> NJ </option>
      <option value="NM"> NM </option>
      <option value="NY"> NY </option>
      <option value="NC"> NC </option>
      <option value="ND"> ND </option>
      <option value="OH"> OH </option>
      <option value="OK"> OK </option>
      <option value="OR"> OR </option>
      <option value="PA"> PA </option>
      <option value="RI"> RI </option>
      <option value="SC"> SC </option>
      <option value="SD"> SD </option>
      <option value="TN"> TN </option>
      <option value="TX"> TX </option>
      <option value="UT"> UT </option>
      <option value="VT"> VT </option>
      <option value="VA"> VA </option>
      <option value="WA"> WA </option>
      <option value="WV"> WV </option>
      <option value="WI"> WI </option>
      <option value="WY"> WY </option>
      </select>
      <br>

      <select name= "education" class = "form-control">
      <option value = "" > Choose Education Requirement </option>
      <option value="No Education"> No Education Required </option>
      <option value="High School"> High School Education </option>
      <option value="Associate"> Associate Degree </option>
      <option value="Bachelor"> Bachelor's Degree </option>
      <option value="Master"> Master's Degree </option>
      <option value="Doctoral"> Doctoral Degree </option>
      </select>

      <br><br><br>

      <input type = "submit" class ="btn btn-lg btn-success" value = "Find">

    </form>
  </div>

  <?php foreach($Job_Opening as $job): ?>
  <div class="row marketing">
      <div class="col-md-10">
        <h4><?php echo $job->c_name; ?></h4>
        <p><?php echo $job->Title; ?></p>
        <p><?php echo $job->Field; ?></p>
        <p><?php echo $job->Salary; ?></p>
        <p><?php echo $job->c_add; ?></p>


      </div>
      <div class = "col-md-2">
              <a class = "btn btn-default" href = "job.php?id=<?php echo $job->id;
              ?>">View</a>
      </div>
  </div>
  <?php endforeach; ?>

</html>

  <?php include 'inc/ufooter.php'; ?>

    <?php

    session_start();

    if(!isset($_SESSION['user_login'])) //check unauthorize user not direct access in "employee_home.php" page
    {
     header("location: ../index.php");
    }

    if(isset($_SESSION['admin_login'])) //check admin login user not access in "employee_home.php" page
    {
     header("location: ../admin/admin_home.php");
    }

    if(isset($_SESSION['employee_login'])) //check user login user not access in "employee_home.php" page
    {
     header("location: ../employee/employee_home.php");
    }

    if(isset($_SESSION['user_login']))
    {
    ?>
     
    <?php
     echo $_SESSION['employee_login'];
    }
    ?>
    </h3>
     <a href="../logout.php">Logout</a>
   </center>



<?php}?>
