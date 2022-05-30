<?php
session_start();
if (isset($_POST['save-profile'])) {
    require 'dbh.inc.php';
    $data = file_get_contents("../assets/default_profile_picture.jpg");
    $data = mysqli_real_escape_string($conn, $data);
} else {
    header("Location: ../index.php");
    exit();
}
