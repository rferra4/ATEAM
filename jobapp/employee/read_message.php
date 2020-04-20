<!-- page where employee can view/read selectd message -->

<?php include 'inc/eheader2.php'; ?>
      <h1 class="display-4">Read a message</h1>

<?php include 'inc/efooter.php'; ?>

 <?php
require_once "../connection.php";
 session_start();

 if(!isset($_SESSION['employee_login'])) //check unauthorize user not direct access in "employee_home.php" page
 {
  header("location: ../index.php");
 }

 if(isset($_SESSION['admin_login'])) //check admin login user not access in "employee_home.php" page
 {
  header("location: ../admin/admin_home.php");
 }

 if(isset($_SESSION['user_login'])) //check user login user not access in "employee_home.php" page
 {
  header("location: ../user/user_home.php");
 }

 if(isset($_SESSION['employee_login']))
 {
 ?>
  Welcome,
 <?php
  echo $_SESSION['employee_login'];
  //We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$sql="SELECT Title, Sender, Recipient from Messages where id=:uid";
$req1=$db->prepare($sql); // sql select query
$req1->bindParam(':uid',$id);      //bind parameters
$req1->execute();
$dn1 = $req1->fetch(PDO::FETCH_OBJ);
//We check if the discussion exists
if($req1->rowCount()==1)
{
//We check if the user have the right to read this discussion
if($dn1->Sender==$_SESSION['user_login'] or $dn1->Recipient==$_SESSION['user_login'])
{
//The discussion will be placed in read messages
if($dn1->Sender==$_SESSION['user_login'])
{
        $sql="UPDATE Messages SET RecipientRead=1 WHERE id=:uid";
        $req1=$db->prepare($sql); // sql select query
        $req1->bindParam(':uid',$id);      //bind parameters
        $req1->execute();
        $user_partic = 2;
}
else
{
        $sql="UPDATE Messages SET RecipientRead=1 WHERE id=:uid";
        $req1=$db->prepare($sql); // sql select query
        $req1->bindParam(':uid',$id);      //bind parameters
        $req1->execute();
        $user_partic = 1;
}
//We get the list of the messages
$sql="SELECT * FROM `Messages` WHERE `Recipient` = :uid ORDER BY `Timestamp` desc";
$req2=$db->prepare($sql); // sql select query
$req2->bindParam(':uid',$id);      //bind parameters
$req2->execute();
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
        $message = $_POST['message'];
        //We remove slashes depending on the configuration
        if(get_magic_quotes_gpc())
        {
                $message = stripslashes($message);
        }
        //We protect the variables
        $title = $dn1->Title;
        $recipient = $dn1->Sender;
        $date = date("Y-m-d H:i:s");
        $u2r = FALSE;
        //'SELECT `Title`, `Sender`, `Recipient`, `Message`, `Timestamp`, `Id`, `RecipientRead` FROM `Messages` WHERE Recipient = :CurrentUser AND RecipientRead=0';
        $insert_stmt=$db->prepare("INSERT INTO Messages(Title, Sender, Recipient, Message, Timestamp, RecipientRead) VALUES(:uTitle,:uSender,:uRecipient,:uMessage,:uTimestamp,:uRecipientRead)"); //sql insert query
        $insert_stmt->bindParam(':uTitle',$title);
        $insert_stmt->bindParam(':uSender',$_SESSION['user_login']);     //bind all parameter
        $insert_stmt->bindParam(':uRecipient',$recipient);
        $insert_stmt->bindParam(':uMessage',$message);
        echo "--date=".$date;
        $insert_stmt->bindParam(':uTimestamp', $date);
        $insert_stmt->bindParam(':uRecipientRead', intval($u2r));
        //We send the message and we change the status of the discussion to unread for the recipient
        if($insert_stmt->execute())
        {
?>
<div class="message">Your message has successfully been sent.<br />
<a href="messages.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
        }
        else
        {
?>
<div class="message">An error occurred while sending the message.<br />
<a href="read_message.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
        }
}
else
{
//We display the messages
?>
<div class="content">
<h1><?php echo $dn1->Title; ?></h1>
<table class="messages_table">
        <tr>
        <th class="author">User</th>
        <th>Message</th>
    </tr>
<?php
while($dn2 = $req2->fetch(PDO::FETCH_OBJ))
{
?>
        <tr>
        <td class="author center"><br /><a href="profile.php?id=<?php echo $dn2->userid; ?>"><?php echo $dn2->username; ?></a></td>
        <td class="left"><div class="date">Sent: <?php echo date('m/d/Y H:i:s' ,$dn2->timestamp); ?></div>
        <?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="read_message.php?id=<?php echo $id; ?>" method="post">
        <label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
<?php
}
}
else
{
        echo '<div class="message">You dont have the rights to access this page.</div>';
}
}
else
{
        echo '<div class="message">This discussion does not exists.</div>';
}
}
else
{
        echo '<div class="message">The discussion ID is not defined.</div>';
}
}
else
{
        echo '<div class="message">You must be logged to access this page.</div>';
}
?>
                <div class="foot"><a href="messages.php">Go to my Personal messages</a></div>
        </body>
</html>
