<?php include 'inc/uheader.php'; ?>
<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<h2 class="page=header"><?php echo $job->name; ?> (**insert code for location**) </h2>

<small> Posted By **insert php code for company name** on <?php echo $job->address; ?></small>

<hr>
<br><br>
<a href = "job_app.php?id=<?php echo $job->id; ?>">Apply Here </a>
<br><br>
<medium><?php echo $job->company; ?> </medium>









<?php include '../templates/inc/footer.php'; ?>
