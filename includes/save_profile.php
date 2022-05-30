<?php
session_start();
if (isset($_POST['save-profile-submit'])) {
    require 'dbh.inc.php';
    $data = file_get_contents($_FILES['profile-picture']['tmp_name']);
    $data = mysqli_real_escape_string($conn, $data);
    $username = $_POST['username'];

    if (empty($username)) {
        header("Location: ../profile.php?error=emptyfields");
        exit();
    } else {
        $sql = "UPDATE Users SET Username=?, imageBlob='$data'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../profile.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $_SESSION['username'] = $username;
            header("Location: ../profile.php");
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
