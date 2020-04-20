<!-- profile index page -->

<!DOCTYPE html>
<html>
    <head>
        <title>PHP CRUD</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php require_once 'process.php'; ?>

        <!-------------------------------------------->
        <!--php for sending edit/delete alert message->
        <!-------------------------------------------->
        <?php
        if(isset($_SESSION['message'])); ?>

        <!-- Alert message for edit/delete -->
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
             ?>
        </div>


        <!-- div to style elements in table-->
        <div class="container">

        <!-------------------------------------------->
        <!-- php for SELECTING fields from database -->
        <!-------------------------------------------->
        <?php
            //connect to database
            $mysqli = new mysqli('localhost', 'root', 'mysql','project_schema') or die(mysqli_error($mysqli));

            //selecting everything from "data" table and storing as $result
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            $result2 = $mysqli->query("SELECT * FROM masterlogin") or die($mysqli->error);
        ?>

        <!-------------------------------------------->
        <!-- HTML table for storing results         -->
        <!-------------------------------------------->
        <div class="row justify-content-center">
            <table class="table" hidden>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>Level of Education</th>
                        <th>Personal Info</th>
                        <th colspan="2">Action</th> <!-- Edit/Delete Buttons -->
                    </tr>
                </thead>
        <!-------------------------------------------->
        <!-- While loop for selecting fields from db-->
        <!-------------------------------------------->
        <?php
            while (($row = $result->fetch_assoc()) && ($row2 = $result2->fetch_assoc())):
        ?>
            <tr>
                <td><?php echo $row2['username']; ?></td>
                <td><?php echo $row2['email']; ?></td>
                <td><?php echo $row2['password']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['state']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['education']; ?></td>
                <td><?php echo $row['info']; ?></td>
                <td>
                    <!-- Edit Button -->
                    <a href="pindex.php?edit=<?php echo $row['id'] ?>"
                       class="btn btn-info">Edit</a>
                    <!-- Delete Button -->
                    <a href="process.php?delete=<?php echo $row['id']?>"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <!-- End while loop -->

        <?php endwhile; ?>
            </table>
        </div>

        <?php

            /*printing $results association
            pre_r($result->fetch_assoc());



            //function for printing $results in an array
            function pre_r( $array ){
                echo '<pre>';
                print_r($array);
                echo '<pre>';
            }
        */
        ?>

        <!-------------------------------------------->
        <!-- input fields on index page             -->
        <!-------------------------------------------->
        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h3><a href="pindex.php?edit=<?php echo $row['id'] ?>"
                       class="btn btn-info">Add Additional Info:</a></h3>
             <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $firstname; ?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>">
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" class="form-control" placeholder="Age" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" name="gender" class="form-control" placeholder="Gender" value="<?php echo $gender; ?>">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $city; ?>">
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control" placeholder="State" value="<?php echo $state; ?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address; ?>">
            </div>
            <div class="form-group">
                <label>Level of Education</label>
                <input type="text" name="education" class="form-control" placeholder="Level of Education" value="<?php echo $education; ?>">
            </div>
            <div class="form-group">
                <label>Personal Info</label>
                <input type="text" name="info" class="form-control" placeholder="Personal Info" value="<?php echo $info; ?>">
            </div>

            <div class="form-group">
            <?php
            if ($update == true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>
