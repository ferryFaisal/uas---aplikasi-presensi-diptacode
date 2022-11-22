<?php
session_start();


require 'connect.php';
$name = $nim = $kelas = $success = '';
$nameErr = $nimErr = $kelasErr = '';
$valName = $valNim = $valEmail = $valRole = $valPass = $valCpass = false;

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['name'])) {
        $nameErr = 'Name is REQUIRED.';
        $valName = false;
    } else {
        $name = ($_POST['name']);
        $valName = true;
    }

    if (empty($_POST['nim'])) {
        $nimErr = 'NIM is REQUIRED.';
        $valNim = false;
    } else {
        $nim = ($_POST['nim']);
        $valNim = true;
    }

    if (empty($_POST['kelas'])) {
        $kelasErr = 'Kelas is REQUIRED.';
        $valKelas = false;
    } else {
        $kelas = ($_POST['kelas']);
        $valKelas = true;
    }
}

if (isset($_POST['submit'])) {
    if ($valName && $valNim && $valKelas == true) {
        $sql = "insert into mahasiswa values ('$nim', '$name', '$kelas')";
        mysqli_query($conn, $sql);
        $success = 'Student has been added';
    }
}

if (isset($_SESSION['login']) && ($_SESSION['role'] == 'dosen' || $_SESSION['role'] == 'admin')) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Tables</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

            <a class="navbar-brand mr-1" href="index.html">Product Tables</a>

            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger">9+</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>

        </nav>

        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Login Screens:</h6>
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php">Register</a>
                        <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Other Pages:</h6>
                        <a class="dropdown-item" href="404.php">404 Page</a>
                        <a class="dropdown-item" href="blank.php">Blank Page</a>
                    </div>
                </li>
                <?php
                if ($_SESSION['role'] == 'dosen') {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Users</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="tables.php"><i class="fas fa-fw fa-user"></i> User Tables</a>
                            <a class="dropdown-item" href="adduser.php"><i class="fas fa-fw fa-user"></i> Add a User</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Products</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="product-tables.php"><i class="fas fa-fw fa-table"></i> Product Tables</a>
                            <a class="dropdown-item" href="addproduct.php"><i class="fas fa-fw fa-table"></i> Add a Product</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="customer.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Customer</span></a>
                    </li>
                <?php
                } elseif ($_SESSION['role'] == 'admin') {
                ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Products</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="product-tables.php"><i class="fas fa-fw fa-table"></i> Product Tables</a>
                            <a class="dropdown-item" href="addproduct.php"><i class="fas fa-fw fa-table"></i> Add a Product</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="customer.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Customer</span></a>
                    </li>
                <?php
                } ?>
            </ul>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Students</li>
                    </ol>
                    <div class="container">
                        <div class="card card-register mx-auto mt-5">
                            <div class="card-header">Register a Student</div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-label-group">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="First name" autofocus="autofocus">
                                                    <label for="name">Name</label>
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
                                                    <input type="text" name="nim" value="32020160" id="nim" class="form-control" placeholder="Email address">
                                                    <label for="nim">NIM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-danger"><?= $nimErr ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-label-group">
                                                    <select name="kelas" id="kelas" class="form-control form-select-lg" aria-label="form-select-lg">
                                                        <option value="5A" selected>5A</option>
                                                        <option value="5B">5B</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-danger"> <?= $kelasErr ?></div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                                    <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
                                </form>
                                <div class="text-center primary">
                                    <?= $success ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                    <!-- Sticky Footer -->
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright © Your Website 2019</span>
                            </div>
                        </div>
                    </footer>

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugin JavaScript-->
            <script src="vendor/datatables/jquery.dataTables.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin.min.js"></script>

            <!-- Demo scripts for this page-->
            <script src="js/demo/datatables-demo.js"></script>

    </body>

    </html>
<?php
} else {
    echo "You can't access this page unless you <a href='login.php'>Log in</a> first.";
}
?>