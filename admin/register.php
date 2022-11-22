<?php

require 'connect.php';

$name = $email = $role = $password = $confPassword = '';
$nameErr  = $EmailErr = $RoleErr = $PassErr = $CPassErr = '';
$valName = $valEmail = $valRole = $valPass = $valCpass = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['name'])) {
        $nameErr = 'Name is REQUIRED.';
        $valName = false;
    } else {
        $name = ($_POST['name']);
        $valName = true;
    }

    if (empty($_POST['inputEmail'])) {
        $EmailErr = 'Email is REQUIRED.';
        $valEmail = false;
    } else {
        $email = ($_POST['inputEmail']);
        // $valEmail = true;
        $sql = 'select email from user';
        $query = mysqli_query($conn, $sql);
        while ($result = mysqli_fetch_assoc($query)) {
            if ($email == ($result["email"])) {
                $EmailErr = "Email is already taken!";
                $valEmail = false;
                break;
            } else {
                $valEmail = true;
                break;
            }
        }
    }

    if (empty($_POST['role'])) {
        $RoleErr = 'Role is REQUIRED.';
        $valRole = false;
    } else {
        $role = ($_POST['role']);
        $valRole = true;
    }

    if (empty($_POST['inputPassword'])) {
        $PassErr = 'Password is REQUIRED.';
        $valPass = false;
    } else {
        $password = sha1($_POST['inputPassword']);
        $valPass = true;
    }

    if (empty($_POST['confirmPassword'])) {
        $CPassErr = 'Confirm Password is REQUIRED.';
        $valCpass = false;
    } else {
        $confPassword = sha1($_POST['confirmPassword']);
        // $valCpass = true;
        if ($password != $confPassword) {
            $CPassErr = "The password doesn't match with the previous one.";
            $valCpass = false;
        } else {
            $valCpass = true;
        }
    }
}

if (isset($_POST['submit'])) {
    if ($valName && $valEmail && $valRole && $valPass && $valCpass == true) {
        $sql = "insert into user values ('$name','$email','$role','$password')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('Location: login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="First name" autofocus="autofocus">
                                    <label for="name">First name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 text-danger"><?= $nameErr ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address">
                                    <label for="inputEmail">Email address</label>
                                </div>
                            </div>
                            <div class="col-md-12 text-danger"><?= $EmailErr ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select name="role" id="role" class="form-control form-select-lg" aria-label="form-select-lg">
                                        <option value="">Select a role</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-danger"> <?= $RoleErr ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password">
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm password">
                                    <label for="confirmPassword">Confirm password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 text-danger"><?= $PassErr ?></div>
                            <div class="col-md-6 text-danger"><?= $CPassErr ?></div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>