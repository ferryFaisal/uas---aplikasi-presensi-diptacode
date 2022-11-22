<?php
session_start();
require 'connect.php';
$emailErr = $passwordErr = '';
$valEmail = $valPass = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = sha1($_POST['inputPassword']);
    $email = $_POST['inputEmail'];

    if (empty($_POST['inputEmail'])) {
        $emailErr = 'Email is REQUIRED!';
        $valEmail = false;
    } else {
        $valEmail = true;
        // $sql = "select * from user";
        // $query = mysqli_query($conn, $sql);
        // while ($result = mysqli_fetch_assoc($query)) {
        //     if($email == $result['email']) {
        //         $valEmail = true;
        //     } else {
        //         $emailErr = "The data you've inserted is not match with our database.";
        //         $valEmail = false;
        //     }
        // }
    }
    if (empty($_POST['inputPassword'])) {
        $passwordErr = 'Password is REQUIRED!';
        $valPass = false;
    } else {
        $valPass = true;
        // $sql = "select * from user where email = '$email'";
        // $query = mysqli_query($conn, $sql);
        // while ($result = mysqli_fetch_assoc($query)) {
        //     if ($password == $result['password']) {
        //         $valPass = true;
        //     } else {
        //         $passwordErr = "The data you've inserted is not match with our database.";
        //         $valPass = false;
        //     }
        // }
    }
    if (isset($_POST['login'])) {
        if ($valEmail && $valPass == true) {
            $sql = "select * from user where email = '$email'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            echo $email;
            echo '<br>';
            echo $result['email'];
            echo '<br>';
            echo $password;
            echo '<br>';
            echo $result['password'];
            echo '<br>';
            if (($email == $result['email']) && ($password == $result['password'])) {
                switch ($result['role']) {
                    case 'dosen':
                        $_SESSION['login'] = $email;
                        $_SESSION['name'] = $result['name'];
                        $_SESSION['role'] = $result['role'];
                        header('Location: ../index.php');
                        break;
                    case 'admin':
                        $_SESSION['login'] = $email;
                        $_SESSION['name'] = $result['name'];
                        $_SESSION['role'] = $result['role'];
                        header('Location: index.php');
                        break;
                }
            }
        }
    }
}
//checking if the user has logged in or not, if not then the user facing the login page, if yes then the user wil be redirected to dashboard
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'dosen' || $_SESSION['role'] == 'admin')) {
    echo "<h3> You've logged in. you will be redirected to Dashboard in 5 seconds, or <a href='logout.php'>Log out</a> instead.</h3>";
    header('refresh: 5; url= index.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body class="bg-dark">

        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <div class="col-md-12">
                                    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" autofocus="autofocus">
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="col-md-12 text-danger">
                                    <?= $emailErr ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <div class="col-md-12">
                                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password">
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="col-md-12 text-danger">
                                    <?= $passwordErr ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me">
                                    Remember Password
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="register.php">Register an Account</a>
                        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
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

<?php
}
?>