29
<?php
include 'connection.php'; 
   if (isset($_GET['user'])) {
   $user = $_GET['user'];
   $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
   $user_data = $get_user->fetch_assoc();
    } else {
    header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
 <meta charset="UTF-8">
 <title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
 <body>        <a href="index.php">Home</a> | Back to <a href="user_profile.php?user=<?php echo $user_data['username'] ?>"><?php echo $user_data['username'] ?></a>'s Profile        
 <h3>Update Profile Information</h3> 
        <form method="post" action="update-profile-action.php?user=<?php echo $user_data['username'] ?>">            
          <label>Username:</label><br> 
          <input type="text" name="fullname" value="<?php echo $user_data['username'] ?>" /><br> 
          <label>Email:</label><br>
          <input type="text" name="age" value="<?php echo $user_data['email'] ?>" /><br> 
          <label>Password:</label><br> 
          <input type="text" name="gender" value="<?php echo $user_data['password'] ?>" /><br> 
          <input type="submit" name="update_profile" value="Update Profile" />        
 </form>    
 </body>
</html>

