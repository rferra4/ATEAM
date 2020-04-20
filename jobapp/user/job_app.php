<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>

<?php
$job = new Job;

$template = new Template('apply.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

$company = isset()


$template->job = $job->getJob($id);

echo $template;
