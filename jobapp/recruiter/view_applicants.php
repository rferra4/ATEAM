<?php include_once '../config/init.php';?>
<?php include_once '../lib/Job.php'; ?>
<?php include 'inc/rheader.php'; ?>

      <div class="jumbotron">
        <h1 class="display-4">Find Your Dream Job</h1>
        <form>

            <h4><?php echo $job->company; ?></h4>
            <p><?php echo $job->name; ?></p>
            <p><?php echo $job->address; ?></p>
