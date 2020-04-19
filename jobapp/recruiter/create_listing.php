<?php include 'inc/rheader.php'; ?>


<h2 class = "page-header">Create Job Listing</h2>
<form method = "post" action = "create.php">
  <div class = "form-group">
    <label>Company</label>
    <input type = "text" class = "form-control" name = "Company_Name">
  </div>


  <div class = "form-group">
    <label>Job Title</label>
    <input type = "text" class = "form-control" name = "Title">
  </div>
  <div class = "form-group">
    <label>Description</label>
    <textarea class = "form-control" name = "Description"></textarea>
  </div>
  <div class = "form-group">
    <label>Location</label>
    <input type = "text" class = "form-control" name = "location">
  </div>
  <div class = "form-group">
    <label>Salary</label>
    <input type = "text" class = "form-control" name = "salary">
  </div>
  <div class = "form-group">
    <label>Recruiter's Email</label>
    <input type = "text" class = "form-control" name = "recruiter_email">
  </div>

  <input type = "submit" class  ="btn btn-default" value = "Submit" name = "submit">





</form>





<?php include 'inc/rfooter.php'; ?>
