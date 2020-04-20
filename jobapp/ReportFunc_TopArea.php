<!-- connect to database and pull top area applied to -->


<?php

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
      echo $keys[$j] . "-" . $finCount[$keys[$j]];
      echo "<br>";
      $j++;
    }
 ?>
