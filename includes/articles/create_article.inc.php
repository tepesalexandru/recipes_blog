<?php
session_start();
if (isset($_POST['create-article-submit'])) {
    require '../dbh.inc.php';
    $title = $_POST['title'];
    $content = $_POST['content'];
    $authorId = $_SESSION['userId'];
    $data = file_get_contents($_FILES['article-cover']['tmp_name']);
    $data = mysqli_real_escape_string($conn, $data);

    if (empty($title) || empty($content)) {
        header("Location: ../../create_article.php?error=emptyfields");
        exit();
    } else {
        $sql = "INSERT INTO Articles (title, content, authorId, publishedOn, imageBlob) Values (?, ?, ?, now(), '$data')";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../create_article.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $authorId);
            mysqli_stmt_execute($stmt);
            header("Location: ../../index.php");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../../index.php");
    exit();
}
