<?php include 'inc/uheader.php'; ?>
<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<h2 class="page=header"><?php echo $job->Title; ?> (**insert code for location**) </h2>

<small> Posted By **insert php code for company name** on <?php echo $job->Date; ?></small>

<hr>
<br><br>
<a href = "job_app.php?Opening_ID=<?php echo $job->Opening_ID;
?>">Apply Here </a>
<br><br>
<medium><?php echo $job->Description; ?> </medium>









<?php include '../templates/inc/footer.php'; ?>
