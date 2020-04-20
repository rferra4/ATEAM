<?php include 'inc/uheader.php'; ?>
<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<h2 class="page=header"><?php echo $job->name; ?> </h2>

<small> Posted By <?php echo $job->company; ?> on <?php echo $job->Date; ?></small>

<hr>
<br><br>
<a href = "job_app.php?id=<?php echo $job->id; ?>">Apply Here </a>
<br><br>
<p> Job Desciption: <?php echo $job->description ?></p>









<?php include '../templates/inc/footer.php'; ?>
