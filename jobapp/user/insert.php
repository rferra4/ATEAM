<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "project_schema");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$jobID = mysqli_real_escape_string($link, $_REQUEST['jobID']);


// Attempt insert query execution
$sql = "INSERT INTO Applicants (first_name, last_name, email, jobID) VALUES ('$first_name', '$last_name', '$email', '$jobID')";
if(mysqli_query($link, $sql)){
    echo "Application submitted successfully. Expect to hear back from us by email. Redirecting you to the home page...";
    header("refresh:4;user_home.php"); //refresh 4 second and redirect to index.php page
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connections
mysqli_close($link);
?>
