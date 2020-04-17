<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>


<div class="hero">
  <div class="form-box">
    <div class="button-box">
                <div id="btn"></div>

            </div>

<form id = "APPLY" class = "input-group" method="post" >
<h3 class="input-field-title">Application</h3>

 <input type="text" name="first_name" class="input-field" placeholder="enter username" />
 <input type="text" name="last_name" class="input-field" placeholder="enter username" />
 <input type="text" name="txt_username" class="input-field" placeholder="enter username" />
 <input type="text" name="txt_username" class="input-field" placeholder="enter username" />


 <input type="text" name="txt_email" class="input-field" placeholder="enter email" />

 <input type="password" name="skills" class="input-field" placeholder="List of skills seperated by a comma" />


  <select class="input-field" name="txt_role">
   <option value="" selected="selected"> - select role - </option>
   <option value="employee">Employee</option>
   <option value="user">User</option>
  </select>


 <input type="submit"  name="btn_apply" class="submit-btn" value="Application">

 <p class = "link"> Already applied? <a href="index.php">Go back to job listings here</a></p>
</div>
</div>

</form>
</body>

</html>
