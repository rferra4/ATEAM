<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>

<?php
$job = new Job;

$template = new Template('recruiter/view_applicants.php');




    $template->title = 'Latest Jobs ';
    $template->Job_Opening = $job->getAllJobs();




echo $template;
