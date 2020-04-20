<!-- see employee's similar file-->

<?php
require_once '../connection.php';

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$jobID = mysqli_real_escape_string($link, $_REQUEST['jobID']);
$useroremployee = mysqli_real_escape_string($link, $_REQUEST['useroremployee']);

// Attempt insert query execution
$sql = "INSERT INTO Applicants (first_name, last_name, email, jobID, useroremployee) VALUES ('$first_name', '$last_name', '$email', '$jobID', '$useroremployee')";
if(mysqli_query($link, $sql)){
    echo "Application submitted successfully. Expect to hear back from us by email. Redirecting you to the home page...";
    header("refresh:4;user_home.php"); //refresh 4 second and redirect to index.php page
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connections
mysqli_close($link);
?>
