<?php
include 'connection.php';
session_start();
if (isset($_GET['user']))
{
$user = $_GET['user'];
$get_user = $mysqli->query("SELECT * FROM masterlogin WHERE username = '$user'");
if ($get_user->num_rows == 1)
{
    $profile_data = $get_user->fetch_assoc();
           
}
       
} 
?>
<!DOCTYPE html>
<html>    
<head>        
 <meta charset="UTF-8">
         <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
    <a href="pindex.php">Home</a> | <?php echo $profile_data['username'] ?>'s Profile        
    <h3>Personal Information | <? php            $visitor = $_SESSION['username'];
           if ($user == $visitor)
{ ?>            <a href="edit-profile.php?user=<?php echo $profile_data['username'] ?>">Edit Profile</a>            <?php
}
        ?>        </h3>        
        <table>
                    <tr>                
                     <td>Username:</td><td><?php echo $profile_data['username'] ?></td>   
                    </tr>
                    <tr>                
                     <td>Email:</td><td><?php echo $profile_data['email'] ?></td> 
                    </tr> 
                    <tr>
                        <td>Password:</td><td><?php echo $profile_data['password'] ?></td>
                    </tr>    
        </table> 
    </body>
</html> 
?>