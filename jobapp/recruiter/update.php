<?php include 'inc/rheader2.php' ?>

<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $address = $company = $salary = "";
$name_err = $address_err = $company_err = $salary_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name



    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter the salary amount.";
    } elseif(!ctype_digit($input_address)){
        $address_err = "Please enter a positive integer value.";
    } else{
        $address = $input_address;
    }




   // Validate salary
   $input_salary = trim($_POST["salary"]);
   if(empty($input_salary)){
       $salary_err = "Please enter the salary amount.";
   } elseif(!ctype_digit($input_salary)){
       $salary_err = "Please enter a positive integer value.";
   } else{
       $salary = $input_salary;
   }



   $input_company = trim($_POST["company"]);
    if(empty($input_company)){
        $company_err = "Please enter a Company name.";
    } else{
        $company = $input_company;
    }



    // Check input errors before inserting in database
    if(empty($name_err)  && empty($address_err) && empty($salary_err) && empty($company_err)){
        // Prepare an update statement
        $sql = "UPDATE Job_Opening SET name=?, address=?, company=?, salary=? WHERE id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name,  $param_address, $param_company, $param_salary, $param_id);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_company = $company;

            $param_salary = $salary;

            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM Job_Opening WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $company = $row["company"];
                    $salary = $row["salary"];


                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <name>Update Record</name>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>






                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                                <label>Name</label>
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
                                            <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                                                <label>Salary</label>
                                                <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                                                <span class="help-block"><?php echo $salary_err;?></span>
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



//<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $address = $company = $description = $salary = "";
$name_err = $address_err = $company_err = $description_err = $salary_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

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

    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($company_err) && empty($description_err) && empty($salary_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET name=?, address=?, company=?, description = ?, salary=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_address, $param_company, $param_description, $param_salary, $param_id);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_company = $company;
            $param_description = $description;
            $param_salary = $salary;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $company = $row["company"];
                    $description = $row["description"];

                    $salary = $row["salary"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
