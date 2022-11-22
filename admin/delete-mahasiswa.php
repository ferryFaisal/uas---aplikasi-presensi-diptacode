<?php

require 'connect.php';

$nim = $_GET['nim'];

$sql = "delete from mahasiswa where nim = '$nim'";
mysqli_query($conn, $sql);
mysqli_close($conn);
header('Location: tables.php');