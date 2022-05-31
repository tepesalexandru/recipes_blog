<?php
session_start();
if (isset($_POST['save-profile-submit'])) {
    require 'dbh.inc.php';
    
    $sql = "SELECT imageBlob FROM Users WHERE Users.Id =" . $_SESSION['userId'];
    $result = $conn->query($sql);
    $firstRow = mysqli_fetch_assoc($result); 
    
    $data = $firstRow['imageBlob'];
    $data = mysqli_real_escape_string($conn, $data);
    if (!empty($_FILES['profile-picture']['tmp_name'])) {
        $data = file_get_contents($_FILES['profile-picture']['tmp_name']);
        $data = mysqli_real_escape_string($conn, $data);
    }

    $username = $_POST['username'];
    $userId = $_SESSION['userId'];

    if (empty($username)) {
        header("Location: ../profile.php?error=emptyfields");
        exit();
    } else {
        $sql = "UPDATE Users SET Username=?, imageBlob='$data' WHERE Users.Id = $userId";
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
