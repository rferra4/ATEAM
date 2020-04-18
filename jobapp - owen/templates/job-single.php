<?php include 'inc/header.php'; ?>
<!DOCTYPE html>
<html>
<div class="jumbotron">
  <h1 class="display-4">Job Details</h1>

</div>


<head>
<title>Upload your files</title>
</head>
<body>
<form enctype="multipart/form-data" action="upload.php" method="POST">
  <p>Upload your file</p>
  <input type="file" name="file"></input><br />
  <input type="submit" value="Upload" name = "upload"></input>
</form>
</body>
</html>



<?php echo $job->Title; ?>
<br>
<?php echo $job->Status; ?>
<br>
<?php echo $job->Description; ?>


<?php include 'inc/footer.php'; ?>
