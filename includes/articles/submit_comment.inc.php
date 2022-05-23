<?php
session_start();
if (isset($_POST['comment-article-submit'])) {
    require '../dbh.inc.php';
    $content = $_POST['content'];
    $authorId = $_SESSION['userId'];
    $articleId = $_POST['articleId'];

    if (empty($content)) {
        header("Location: ../../view_article.php?id=$articleId");
        exit();
    } else {
        $sql = "INSERT INTO Comments (content, userId, articleId) Values (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../view_article.php?id=$articleId&?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $content, $authorId, $articleId);
            mysqli_stmt_execute($stmt);
            header("Location: ../../view_article.php?id=$articleId");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../../index.php");
    exit();
}
