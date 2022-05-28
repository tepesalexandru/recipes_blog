<?php
session_start();
if (isset($_POST['delete-article'])) {
    require 'dbh.inc.php';
    $articleId = $_POST['articleId'];

    $sql = "SELECT * FROM Articles WHERE Articles.Id = $articleId";

    $result = $conn->query($sql);
    $firstRow = mysqli_fetch_assoc($result); 

    if($firstRow['authorId'] != $_SESSION['userId'] || $_SESSION['isAdmin'] != 1) {
        header("Location: ../index.php");
        exit();
    }

    // Delete article
    $sql = "DELETE FROM Articles WHERE Articles.Id =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $articleId);
        mysqli_stmt_execute($stmt);
        header("Location: ../my_articles.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}