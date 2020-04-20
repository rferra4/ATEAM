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

      foreach ($moreDatas as $moreData)
      {
        //echo "2";
          if($moreData['Employee?'] == "1" && $moreData['company'] == $companyName)
          {
              echo $moreData['first_name'];
              print " ";
              echo $moreData['last_name'];
              echo nl2br("\n");
            }
          }




    }
  }



//  Percentage of Employees Accepted
 $stmt = $db->prepare("SELECT * FROM Applicants");
 $stmt->execute();
 $uglyArray = [];
 while($temp=$stmt->fetch(PDO::FETCH_ASSOC)){
   $uglyArray[] = $temp;
 }

  $acceptedEmployees = 0;
  $totalEmployeesApplied = 0;
  foreach ($uglyArray as $niceArray)
  {
    if($niceArray['Employee?'] == 1 && $niceArray['Accepted?'] == 1)
    {
      $acceptedEmployees = $acceptedEmployees + 1;
      $totalEmployeesApplied = $totalEmployeesApplied + 1;
    }
    if($niceArray['Employee?'] == 1 && $niceArray['Accepted?'] == 0)
    {
      $totalEmployeesApplied = $totalEmployeesApplied + 1;
    }
  }

  //echo $acceptedEmployees;
  //echo nl2br("\n");
  //echo $totalEmployeesApplied;
  $percentage = ($acceptedEmployees*100)/$totalEmployeesApplied;
  echo $percentage."%"











?>
