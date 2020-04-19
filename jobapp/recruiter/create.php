<?php include_once '../config/init.php'; ?>
<?php include_once '../lib/Job.php'; ?>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "project_schema");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$Company_Name = mysqli_real_escape_string($link, $_REQUEST['Company_Name']);
$Title = mysqli_real_escape_string($link, $_REQUEST['Title']);
$Description = mysqli_real_escape_string($link, $_REQUEST['Description']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$recruiter_email = mysqli_real_escape_string($link, $_REQUEST['recruiter_email']);


// Attempt insert query execution
$sql = "INSERT INTO Job_Opening (Company_Name, Title, Description,
location, salary, recruiter_email) VALUES ('$Company_Name', '$Title', '$Description', '$location','$salary', '$recruiter_email' )";
if(mysqli_query($link, $sql)){
    echo "Job posted successfully. Redirecting you to the home page...";
    header("refresh:3;recruiter_home.php"); //refresh 4 second and redirect to index.php page
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    header("refresh:3;recruiter_home.php"); //refresh 4 second and redirect to index.php page

}

// Close connections
mysqli_close($link);
?>
