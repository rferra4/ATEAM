<?php include 'inc/uheader.php'; ?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/styles.css"/>
</head>





<p>Job Title: <?php echo $job->company; ?></p>
<p>Job ID#: <?php echo $job->id; ?></p>

<body>
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
    <input type="submit" value="Submit">
</form>
</body>




</html>
