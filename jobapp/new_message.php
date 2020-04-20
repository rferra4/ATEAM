<center>
 <h1>Read a PM</h1>

 <h3>
 <?php
 require_once "connection.php";
 session_start();

 if(!isset($_SESSION['user_login'])) //check unauthorize user not direct access in "user_home.php" page
 {
  header("location: index.php");
 }

 if(isset($_SESSION['admin_login'])) //check admin login user not access in "user_home.php" page
 {
  header("location: /admin/admin_home.php");
 }

 if(isset($_SESSION['employee_login'])) //check employee login user not access in "employee_home.php" page
 {
  include 'employee/inc/eheader.php';
 }

 if(isset($_SESSION['user_login']))
 {
   include 'user/inc/uheader.php';
  $form = true;
//We check if the form has been sent
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{

        $otitle = $_POST['title'];
        $orecip = $_POST['recip'];
        $omessage = $_POST['message'];
        //We check if all the fields are filled
        if($otitle!='' and $orecip!='' and $omessage!='')
        {
                //We protect the variables
                $title = $db->quote($otitle);
                $recip = $db->quote($orecip);
                $message = $db->quote(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
                //We check if the recipient exists
                try{
                  $sql="SELECT email, id FROM masterlogin WHERE email=:uemail";
                  $select_stmt=$db->prepare($sql); // sql select query
                  $select_stmt->bindParam(':uemail',$orecip);      //bind parameters
                  $select_stmt->execute();
                  $row=$select_stmt->fetch(PDO::FETCH_OBJ); //execute query and fetch record store in "$row" variable
                  //Is the email in the database?
                  if($row->email!=$orecip){
                   $errorMsg[]="\nSorry that email doesn't seem to be in our database."; //check new user type email already exists or not in email textbox
                   echo $errorMsg[0];
                  }
                  //Is this the current user's email?
                  else if($row->email==$_SESSION['user_login']){
                    $errorMsg[]="\nSorry, messaging yourself is not allowed.";
                    echo $errorMsg[0];
                  }
                  //If the email is in the database and it's not the current user's email, we should create the message
                  else if(!isset($errorMsg))
                  {
                    /*
                    DM has nine fields. This is the message entity.
                    The User gives us three fields: Title, Recipient(user2), and Message
                    Additionally, we need to store the current user(user1) (session[user_id]),
                    We need to add a timestamp and read values for each user.
                    */
                     $title = str_replace("'","",$title);
                     $message = str_replace("'","",$message);
                     $date = date("Y-m-d H:i:s");
                     $u2r = FALSE;
                     //'SELECT `Title`, `Sender`, `Recipient`, `Message`, `Timestamp`, `Id`, `RecipientRead` FROM `Messages` WHERE Recipient = :CurrentUser AND RecipientRead=0';
                     $insert_stmt=$db->prepare("INSERT INTO Messages(Title, Sender, Recipient, Message, Timestamp, RecipientRead) VALUES(:uTitle,:uSender,:uRecipient,:uMessage,:uTimestamp,:uRecipientRead)"); //sql insert query
                     $insert_stmt->bindParam(':uTitle',$title);
                     $insert_stmt->bindParam(':uSender',$_SESSION['user_login']);     //bind all parameter
                     $insert_stmt->bindParam(':uRecipient',$row->email);
                     $insert_stmt->bindParam(':uMessage',$message);
                     echo "--date=".$date;
                     $insert_stmt->bindParam(':uTimestamp', $date);
                     $insert_stmt->bindParam(':uRecipientRead', intval($u2r));
                     echo "--title=".$title;
                     echo "--user1=".$_SESSION['user_login'];
                     echo "--user2=".$row->email;
                     echo "--message=".$message;
                     echo "--u2r=".intval($u2r);
                     if($insert_stmt->execute())
                     {
                      $registerMsg= "Message Sent!....View Messages is Loading..."; //execute query success message
                      ?>
                      <div class="message">The message has successfully been sent.<br />
                      <a href="messages.php">List of my Personal messages</a></div>
                      <?php
                     }
                  }
                }
                catch(PDOException $e)
                {
                 echo $e->getMessage();
                }
}}
if($form)
{
//We display a message if necessary
if(isset($error))
{
        echo '<div class="message">'.$error.'</div>';
}
//We display the form
?>
<div class="content">
        <h1>New Personal Message</h1>
    <form action="new_message.php" method="post">
                Please fill the following form to send a Personal message.<br />
        <label for="title">Title</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip">Recipient<span class="small">(Username)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
<?php
}
}
else
{
        echo '<div class="message">You must be logged to access this page.</div>';
}
?>
                <div class="foot"><a href="messages.php">Go to my messages</a></div>
        </body>
</html>
