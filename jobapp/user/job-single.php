<?php include 'inc/uheader.php'; ?>
<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<!DOCTYPE html>
<html>
<div class="jumbotron">
  <h1 class="display-4">Job Details</h1>

</div>


<div class = "col-md-2">
        <a class = "btn btn-default" href = "job_app.php?Opening_ID=<?php echo $job->Opening_ID;
        ?>">Apply</a>
</div>


<?php echo $job->Title; ?>
<br>
<?php echo $job->Status; ?>
<br>
<?php echo $job->Description; ?>


<?php include 'inc/footer.php'; ?>
