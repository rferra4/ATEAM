<!-- see employee's similar file-->

<?php include 'inc/uheader2.php'; ?>
<center>
 <h1>Read a PM</h1>

 <h3>
   <?php include 'inc/ufooter.php'; ?>
 <?php
 require_once "../connection.php";
 session_start();

 if(!isset($_SESSION['user_login'])) //check unauthorize user not direct access in "user_home.php" page
 {
  header("location: ../index.php");
 }

 if(isset($_SESSION['admin_login'])) //check admin login user not access in "user_home.php" page
 {
  header("location: ../admin/admin_home.php");
 }

 if(isset($_SESSION['employee_login'])) //check employee login user not access in "employee_home.php" page
 {
  header("location: ../employee/employee_home.php");
 }

 if(isset($_SESSION['user_login']))
 {
 ?>
  Welcome,
 <?php
  echo $_SESSION['user_login'];
  //We check if the ID of the discussion is defined
if(isset($_GET['dmid']))
{
$id = intval($_GET['dmid']);
//We get the title and the narators of the discussion
$sql="SELECT title, user1, user2 from dm where dmid=:uid";
$req1=$db->prepare($sql); // sql select query
$req1->bindParam(':uid',$id);      //bind parameters
$req1->execute();
$dn1 = $req1->fetch(PDO::FETCH_OBJ);
//We check if the discussion exists
if($req1->rowCount()==1)
{
//We check if the user have the right to read this discussion
if($dn1->user1==$_SESSION['user_login'] or $dn1->user2==$_SESSION['user_login'])
{
//The discussion will be placed in read messages
if($dn1->user1==$_SESSION['user_login'])
{
        $sql="UPDATE dm SET user1read=1 WHERE dmid=:uid";
        $req1=$db->prepare($sql); // sql select query
        $req1->bindParam(':uid',$id);      //bind parameters
        $req1->execute();
        $user_partic = 2;
}
else
{
        $sql="UPDATE dm SET user2read=1 WHERE dmid=:uid";
        $req1=$db->prepare($sql); // sql select query
        $req1->bindParam(':uid',$id);      //bind parameters
        $req1->execute();
        $user_partic = 1;
}
//We get the list of the messages
$sql="SELECT * FROM `dm` WHERE `user2` = :uid ORDER BY `timestamp` desc";
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
        $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
        //We send the message and we change the status of the discussion to unread for the recipient
        if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
        {
?>
<div class="message">Your message has successfully been sent.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
        }
        else
        {
?>
<div class="message">An error occurred while sending the message.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
        }
}
else
{
//We display the messages
?>
<div class="content">
<h1><?php echo $dn1->title; ?></h1>
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
        <td class="author center"><?php
if($dn2['avatar']!='')
{
        echo '<img src="'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}
?><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['username']; ?></a></td>
        <td class="left"><div class="date">Sent: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
        <?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="read_pm.php?id=<?php echo $id; ?>" method="post">
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
                <div class="foot"><a href="user_message.php">Go to my Personal messages</a></div>
        </body>
</html>
