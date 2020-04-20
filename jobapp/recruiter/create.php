<!-- create listings page -->

<?php include 'inc/rheader2.php' ?>
<?php
// Include config file
require_once '../config/app_config.php';

// Define variables and initialize with empty values
$name = $address = $company = $description = $salary = $sc_email = $Field = $State = $Education = "";
$name_err = $address_err = $company_err = $description_err = $salary_err = $sc_email_err = $Field_err = $State_err = $Education_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";
    } else{
        $address = $input_address;
    }

    $input_company = trim($_POST["company"]);
    if(empty($input_company)){
        $company_err = "Please enter a company.";
    } else{
        $company = $input_company;
    }

    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";
    } else{
        $description = $input_description;
    }

    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter a Salary.";
    } else{
        $salary = $input_salary;
    }



    $input_sc_email = trim($_POST["sc_email"]);
    if(empty($input_sc_email)){
        $sc_email_err = "Please enter your email.";
    } else{
        $sc_email = $input_sc_email;
    }


    $input_Field = trim($_POST["Field"]);
    if(empty($input_Field)){
        $Field_err = "Please enter a Field.";
    } else{
        $Field = $input_Field;
    }





    $input_State = trim($_POST["State"]);
    if(empty($input_State)){
        $State_err = "Please enter a State.";
    } else{
        $State = $input_State;
    }


        $input_Education = trim($_POST["Education"]);
        if(empty($input_Education)){
            $Education_err = "Please enter the desired Education level achieved.";
        } else{
            $Education = $input_Education;
        }





    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($company_err) && empty($description_err) && empty($salary_err)
  && empty($sc_email_err) && empty($Field_err) && empty($State_err) && empty($Education_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Job_Opening (name, address, company, description, salary, sc_email, Field, State, Education) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_name, $param_address, $param_company, $param_description, $param_salary, $param_sc_email, $param_Field, $param_State, $param_Education);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_company = $company;
            $param_description = $description;


            $param_salary = $salary;
            $param_sc_email = $sc_email;
            $param_Field = $Field;
            $param_State = $State;
            $param_Education = $Education;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ind.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <name>Create Record</name>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill out this form and press submit to add a new job listing.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                            <label>Company</label>
                            <textarea name="company" class="form-control"><?php echo $company; ?></textarea>
                            <span class="help-block"><?php echo $company_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($sc_email_err)) ? 'has-error' : ''; ?>">
                            <label>Search Recruiter Email</label>
                            <input type="text" name="sc_email" class="form-control" value="<?php echo $sc_email; ?>">
                            <span class="help-block"><?php echo $sc_email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Field_err)) ? 'has-error' : ''; ?>">
                            <label>Field</label>
                            <input type="text" name="Field" class="form-control" value="<?php echo $Field; ?>">
                            <span class="help-block"><?php echo $Field_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($State_err)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="State" class="form-control" value="<?php echo $State; ?>">
                            <span class="help-block"><?php echo $State_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Education_err)) ? 'has-error' : ''; ?>">
                            <label>Education</label>
                            <input type="text" name="Education" class="form-control" value="<?php echo $Education; ?>">
                            <span class="help-block"><?php echo $Education_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="ind.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
