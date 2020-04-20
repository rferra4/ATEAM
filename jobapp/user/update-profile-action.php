<!-- see employee's similar file-->

<?php
  include 'connection.php';
    if (isset($_POST['update_profile'])) {
 $user = $_GET['user'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $update_profile = $mysqli->query("UPDATE masterlogin SET email = '$email',
                      username = '$username', password = $password
                      WHERE username = '$user'");
     if ($update_profile) {
    header("Location: user_profile.php?user=$user");
     } else {
   echo $mysqli->error;
     }
 }
?>
