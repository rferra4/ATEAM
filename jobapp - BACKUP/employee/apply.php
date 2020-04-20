<?php include 'inc/eheader.php'; ?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/styles.css"/>
</head>
<h4> <p>Job Title: <?php echo $job->name; ?></p>

<p>Job ID#: <?php echo $job->id; ?></p></h4>

<body><center>
<form action="insert.php" method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName">
    </p>

    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="email" id="emailAddress">
    </p>
    <p>
        <label for="jobid">Confirm Job ID#:</label>
        <input type="text" name="jobID" id="jobid">
    </p>


    <p>
        <label for="useroremployee">Are you a current Employee of this company?(Y/N):</label>
        <input type="text" name="useroremployee" id="useroremployee">
    </p>
    <input type="submit" value="Submit">
</form>
</center></body>




</html>
