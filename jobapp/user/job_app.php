<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>

<?php
$job = new Job;

$template = new Template('apply.php');

$Opening_ID = isset($_GET['Opening_ID']) ? $_GET['Opening_ID'] : null;




$template->job = $job->getJob($Opening_ID);

echo $template;
