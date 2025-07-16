<?php
session_start();
include '../connection.php';

if(isset($_REQUEST['register_btn'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = md5($_POST['pwd']);
    $status = 1; // Admin status

    // Insert new admin into the database
    $insert_query = mysqli_query($conn, "INSERT INTO tbl_user (firstname, lastname, emailid, password, status) VALUES ('$first_name', '$last_name', '$email', '$pwd', '$status')");

    if($insert_query) {
        echo "<script>alert('Admin registered successfully!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error registering admin.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register New Admin</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body style="background-color:  #6aa6e7;">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">
                <h2><center style="color:coral;">Register New Admin</center></h2>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="register_btn" value="Register">
                </form> <br>
                <div class="text-center">
                    <a class="d-block small" href="index.php">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>