<!--unused resume file upload code -->


<?php
//require_once '../config/app_config.php';

	if ($_POST['upload'] )

	 {

	   move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);

       echo "Upload: " . $_FILES["file"]["name"] . "<br>";

       echo "Type: " . $_FILES["file"]["type"] . "<br>";

       echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

       echo "Stored in: " . $_FILES["file"]["tmp_name"];

     }

?>
