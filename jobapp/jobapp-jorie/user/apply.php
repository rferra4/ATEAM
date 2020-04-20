<<?php include 'inc/uheader.php'; ?>

<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/styles.css"/>
</head>





<body>

<form id = "APPLY" class = "input-group" method="post" >
<h3 class="input-field-title">Application</h3>

 <input type="text" name="first_name" class="input-field" placeholder="First Name" />
 <input type="text" name="last_name" class="input-field" placeholder="Last Name" />
 <input type="text" name="txt_username" class="input-field" placeholder="Username" />


 <input type="text" name="txt_email" class="input-field" placeholder="Email" />

 <input type="password" name="skills" class="input-field" placeholder="List of skills seperated by a comma" />


  <select class="input-field" name="txt_role">
   <option value="" selected="selected"> - select role - </option>
   <option value="employee">Employee</option>
   <option value="user">User</option>
  </select>


 <input type="submit"  name="btn_apply" class="submit-btn" value="Submit">

 <p class = "link"> Already applied? <a href="viewer.php">Go back to job listings here</a></p>
</div>
</div>

</form>
</body>


</html>
