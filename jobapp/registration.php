<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $First_Name    = stripslashes($_REQUEST['First_Name']);
        $First_Name = mysqli_real_escape_string($con, $First_Name);

        $Last_Name    = stripslashes($_REQUEST['Last_Name']);
        $Last_Name = mysqli_real_escape_string($con, $Last_Name);

        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `Employee` (username, password, First_Name, Last_Name, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$First_Name', '$Last_Name', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

    <div class="hero">

        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Employee</button>
                <button type="button" class="toggle-btn" onclick="register()">Hirer</button>
            </div>
        <!--EMPLOYEE Registration Form -->
        <form id="EMPLOYEE" class="input-group" action="" method="post">
            <h3 class="input-field-title">Register as Employee</h3>
            <!--First Name Input Box -->
            <input type="text" class="input-field" placeholder="First Name" name="First_Name" >
            <!--Last Name Input Box-->
            <input type="text" class="input-field" placeholder="Last Name" name="Last_Name" >
            <input type="text" class="input-field" name="username" placeholder="Username" required />

            <!--Email Input Box -->
            <input type="text" class="input-field" placeholder="Email" name="email" >
            <!--Password Input Box -->
            <input type="password" class="input-field" placeholder="Enter Password" value="" name="password" >
            <!--Option to add confirm password field
            <input type="password" class="input-field" placeholder="Confirm Password" value="" name="employee_cpassword" id="employee_cpassword" required>

            <!--Upload Resume Button -->
            <input class="resume-btn" type="file" name="resume" hidden="hidden">
            <button class="resume-btn" type="button" >Upload Resume</button>
            <span class="resume-btn-text" id="custom-text">No file chosen, yet.</span>
            <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>

            <button type="submit" class="submit-btn" name="submit">Register as Employee</button>

            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>

        <!--HIRER Registration Form -->
        <form id="HIRER"class="input-group" action="" method="post">
            <h3 class="input-field-title">Register as Hirer</h3>
            <!--First Name Input Box -->
            <input type="text" class="input-field" placeholder="First Name" name="First_Name" >
            <!--Last Name Input Box-->
            <input type="text" class="input-field" placeholder="Last Name" name="Last_Name" >
            <!--Email Input Box -->
            <input type="text" class="input-field" placeholder="Email" name="email" >
            <!--Password Input Box -->
            <input type="password" class="input-field" placeholder="Enter Password" value="" name="password" >
            <input type="text" class="input-field" name="username" placeholder="Username" required />
            <!--Option to add confirm password field
            <input type="password" class="input-field" placeholder="Confirm Password" value="" name="hirer_cpassword" id="hirer_cpassword" required>
            -->
            <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
            <button type="submit" class="submit-btn" name="submit">Register as Hirer</button>
            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
        </div>


    </div>


    <!--Script for switching between Employee and Hirer tabs -->
    <script>
    var x = document.getElementById("EMPLOYEE");
    var y = document.getElementById("HIRER");
    var z = document.getElementById("btn");

    function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }
    function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
    }

    </script>

    <!--Script for showing the chosen file for the upload resume button -->
    <!--this script return the given file name without including the path-->
    <script type="text/javascript">
        const resumeFile = document.getElementById("resume");
        const resumeBtn = document.getElementById("resume_button");
        const customText = document.getElementById("custom-text");

        resumeBtn.addEventListener("click", function(){
            resumeFile.click();
        });

        resumeFile.addEventListener("change", function(){
            if(resumeFile.value){
                customText.innerHTML = resumeFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            } else{
                customText.innerHTML = "No file chosen, yet."
            }
        });

    </script>

<?php
    }
?>
</body>
</html>
