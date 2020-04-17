<?php include 'inc/header.php'; ?>
<!DOCTYPE html>
<html>
<div class="jumbotron">
  <h1 class="display-4">Job Details</h1>

</div>


<div class = "col-md-2">
        <a class = "btn btn-default" href = "templates/apply.php">APPLY HERE</a>
</div>


<?php echo $job->Title; ?>
<br>
<?php echo $job->Status; ?>
<br>
<?php echo $job->Description; ?>


<?php include 'inc/footer.php'; ?>
