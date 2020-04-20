<?php include 'inc/rheader2.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create Listing</title>
    <link rel="stylesheet" href="rstyle.css"/>

<div class="hero">
  <div class="form-box">
    <div class="input-field-title" style="width:100%">
              <h3>Create a Job Listing</h3>
    </div>

      <form id ="CREATE" class="input-group" method="post"  >
        <input placeholder="Company" type="text" name="txt_username" class="input-field"  />
        <input placeholder="Address" type="text" name="txt_username" class="input-field"  />
        <input placeholder="Job Title" type="text" name="txt_username" class="input-field"  />

        <label for="job_desc" class="text-area1">Job Description:</label>
        <textarea id="job_desc" class="text-area2"></textarea>
        <label for="basic_qual" class="text-area1">Basic Qualifications:</label>
        <textarea id="basic_qual" class="text-area2"></textarea>
        <label for="pref_qual" class="text-area1">Preferred Qualifications:</label>
        <textarea id="pref_qual" class="text-area2"></textarea>


      </form>


</body>
</html>
