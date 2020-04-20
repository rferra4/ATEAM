<!-- gets info from the Job_Opening table to be displayed on the page thats loaded from the view button on
the job listing page -->

<?php include 'inc/eheader2.php'; ?>
<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<h2 class="page=header"><?php echo $job->name; ?> </h2>

<small> Posted By <?php echo $job->company; ?> on <?php echo $job->Date; ?></small>

<hr>
<br><br>
<a href = "job_app.php?id=<?php echo $job->id; ?>">Apply Here </a>
<br><br>
<p> Job Desciption: <?php echo $job->description ?></p>









<?php include '../templates/inc/efooter.php'; ?>
