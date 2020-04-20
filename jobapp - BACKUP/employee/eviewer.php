<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>

<?php
$job = new Job;

$template = new Template('employee/employee_listings.php');
$field = isset($_GET['field']) ? $_GET['field'] : null;
$state = isset($_GET['state']) ? $_GET['state'] : null;
$education = isset($_GET['education']) ? $_GET['education'] : null;

if($field != "" || $state != "" || $education != ""){
  $template->Job_Opening = $job->getComboResults($field, $state, $education);
}
else{
  $template->Job_Opening = $job->getAllJobs();
}

echo $template;
