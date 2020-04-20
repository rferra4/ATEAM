<!-- Employee messaging page -->

<?php include 'inc/eheader2.php'; ?>
      <h1 class="display-4">Employee Message Platform</h1>

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
    //We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$sql1 = 'SELECT `title`, `user1`, `user2`, `message`, `timestamp`, `user2read` FROM `dm` WHERE user2 = :user AND user2read=0';
$req1 = $db->prepare($sql1);
$req1->bindParam(':user', $_SESSION['user_login']);
$req1->execute();
$sql2 = 'SELECT `title`, `user1`, `user2`, `message`, `timestamp`, `user2read` FROM `dm` WHERE user2 = :user AND user2read=1';
$req2 = $db->prepare($sql2);
$req2->bindParam(':user', $_SESSION['user_login']);
$req2->execute();
?>
<br />This is the list of your messages:<br />
<a href="new_pm.php" class="link_new_pm">New PM</a><br />
<h3>Unread Messages(<?php echo intval($req1->rowCount()); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Title</th>
        <th>Participant</th>
        <th>Date of creation</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = $req1->fetch(PDO::FETCH_OBJ))
{     echo $dn1->dmid;
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn1->dmid; ?>"><?php echo htmlentities($dn1->title, ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><a href="profile.php?id=<?php echo $dn1->id; ?>"><?php echo htmlentities($dn1->user2, ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s' ,$dn1->timestamp); ?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if(intval($req1->rowCount())==0)
{
?>
        <tr>
        <td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read Messages(<?php echo intval($req2->rowCount()); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date or creation</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = $req2->fetch(PDO::FETCH_OBJ))
{
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn2['reps']-1; ?></td>
        <td><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if(intval($req2->rowCount())==0)
{
?>
        <tr>
        <td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
        echo 'You must be logged to access this page.';
}
?>
 }
 ?>
 </h3>
  <a href="../logout.php">Logout</a>
</center>
