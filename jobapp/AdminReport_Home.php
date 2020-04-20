<!--connect to database and pull all info related to the company entered-->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<div class="hero">
  <div class="form-box">
    <div class="button-box" style="width:100%">
        <div id="btn"></div>
              <button type="button" class="toggle-btn" onclick="user()" style="width:30%">Top Companies</button>
              <button type="button" class="toggle-btn" onclick="employee()" style="width:30%">Employees</button>
              <button type="button" class="toggle-btn" onclick="recruiter()" style="width:30%">Top Fields</button>
    </div>


      <!---------------------------------------------------------------------------------------------------->
      <!-- USER Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="USER" class="input-group"  method="post"  >
        <h3 class="register-title"> Company - Number of Applications</h3>
        <h3><?php

          require_once "connection.php";

          //When someone applies, the jobID will be pulled from the Applicants table and
          //matched with the id connected to the job from Job_Opening, then that id trader_will
          //be used to determine which company posted the job.


          $stmt = $db->prepare("SELECT * FROM Job_Opening
            INNER JOIN Applicants on Job_Opening.id = Applicants.jobID");
          $stmt->execute();

          $data = [];
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $datas[] = $row;
          }
          $fin = [];
          $i = 0;
          foreach($datas as $data)
          {
            $fin[$i] = $data['company'];
            //echo $fin[$i];
            //echo nl2br("\n");
            $i++;
          }
          $ArrayA = array_count_values($fin);
          arsort($ArrayA);
          $keys = [];
          $j = 0;

          foreach(array_keys($ArrayA) as $key)
          {
            $keys[$j] = $key;
            //echo $keys[$j];
            $j++;
          }
          //echo sizeof($keys, 0);
          $j=0;

          $finCount = array_count_values($fin);

          while($j < sizeof($keys,0)-1)
          {
            echo $keys[$j] . " - " . $finCount[$keys[$j]] ;
            echo "<br>";
            $j++;
          }




         ?> </h3>






      </form>


      <!---------------------------------------------------------------------------------------------------->
      <!-- EMPLOYEE Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="EMPLOYEE" class="input-group" method="post" >
        <h3 class="register-title">List of Employees That Have Applied for <?php
        require_once "connection.php";
        $companyName = $_REQUEST['cname'];
        echo $companyName;
        ?></h3>
        <h3>
            <?php
              require_once "connection.php";






              //List of Employees Applied

              $companyName = $_REQUEST['cname'];
              //echo $companyName;
              $stmt = $db->prepare("SELECT Name FROM Company");
              $stmt->execute();

              $data = [];
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $row;
              }
              $nameTrack = [];
              foreach ($datas as $data)
              {

                if($data['Name'] == $companyName)
                {
                  $stmt = $db->prepare("SELECT * FROM Job_Opening
                    INNER JOIN Applicants on Job_Opening.id = Applicants.jobID");
                  $stmt->execute();
                  $moreDatas = [];
                  //echo "1";
                  while($temp=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $moreDatas[] = $temp;
                  }
                  $nameTrack = [];
                  $i = 0;
                  foreach ($moreDatas as $moreData)
                  {
                      if($moreData['Employee?'] == "1" && $moreData['company'] ==$companyName && !(in_array($moreData['last_name'], $nameTrack)))
                      {
                          echo $moreData['first_name'];
                          print " ";
                          echo $moreData['last_name'];
                          echo nl2br("\n");
                          $nameTrack[$i] = $moreData['last_name'];
                        }
                      }




                }
              }
  ?>
  </h3>
  <input type="password" name="txt_password" class="input-field" placeholder=" " />
  <h3>
    <?php


              $companyName = $_REQUEST['cname'];
              //echo $companyName;
              $stmt = $db->prepare("SELECT Name FROM Company");
              $stmt->execute();

              $data = [];
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $row;
              }
              $nameTrack = [];
              $acceptedEmployees = 0;
              $totalEmployeesApplied = 0;
              foreach ($datas as $data)
              {


                  $stmt = $db->prepare("SELECT * FROM Job_Opening
                    INNER JOIN Applicants on Job_Opening.id = Applicants.jobID");
                  $stmt->execute();
                  $moreDatas = [];
                  //echo "1";
                  while($temp=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $moreDatas[] = $temp;
                  }
                  $nameTrack = [];
                  $i = 0;
                  foreach ($moreDatas as $moreData)
                  {
                    if($moreData['Employee?'] == 1 && $moreData['Accepted?'] == 1 && $moreData['company'] == $companyName)
                    {
                      $acceptedEmployees++;
                      $totalEmployeesApplied++;
                    }
                    if($moreData['Employee?'] == 1 && $moreData['Accepted?'] == 0 && $moreData['company'] == $companyName)
                    {
                      $totalEmployeesApplied++;
                    }
                      }
                    }
                    $percentage = ($acceptedEmployees*100)/$totalEmployeesApplied;
                    echo round($percentage) . "% of employees that applied have been hired.";









            ?>
          </h3>

      </form>

      <!---------------------------------------------------------------------------------------------------->
      <!-- RECRUITER Form Box -->
      <!---------------------------------------------------------------------------------------------------->
      <form id ="RECRUITER" class = "input-group" method="post" >
      <h3 class="register-title">Field - Number of Applications in Field</h3>
        <h3><?php

            require_once "connection.php";

            $stmt = $db->prepare("SELECT * FROM Job_Opening
            INNER JOIN Applicants on Job_Opening.id = Applicants.jobID");
            $stmt->execute();

            $data = [];
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              $datas[] = $row;
            }
            $fin = [];
            $i = 0;
            foreach($datas as $data)
            {
              $fin[$i] = $data['name'];
              //echo $fin[$i];
              //echo nl2br("\n");
              $i++;
            }
            $ArrayA = array_count_values($fin);
            arsort($ArrayA);
            $keys = [];
            $j = 0;

            foreach(array_keys($ArrayA) as $key)
            {
              $keys[$j] = $key;
              //echo $keys[$j];
              $j++;
            }
            //echo sizeof($keys, 0);
            $j=0;

            $finCount = array_count_values($fin);

            while($j < sizeof($keys,0)-1)
            {
              echo $keys[$j+1] . "-" . $finCount[$keys[$j+1]];
              echo "<br>";
              $j++;
            }
         ?></h3>
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
