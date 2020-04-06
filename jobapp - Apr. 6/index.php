<?php include_once 'config/init.php'; ?>

<?php
$template = new Template('templates/frontpage.php');
echo $template;
/*
$job = new Job;



$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
    $template->jobs = $job->getByCategory($category);


}else{
    $template->title = 'Latest Jobs ';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();


