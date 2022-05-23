<?php
require 'dbh.inc.php';
function getBlogs($conn)
{
    $sql = "SELECT Articles.Id as id, title, content, username as author
    FROM Articles
    JOIN Users ON Articles.AuthorId = Users.Id";
    return $conn->query($sql);
}

function getBlogById($conn, $id)
{
    $sql = "SELECT Articles.Id as id, title, content, username as author
    FROM Articles
    JOIN Users ON Articles.AuthorId = Users.Id
    WHERE Articles.id = $id";
    $result = $conn->query($sql);
    $firstRow = mysqli_fetch_assoc($result); 
    return $firstRow;
}

function getArticleComments($conn, $articleId) {
    $sql = "SELECT Users.Username as name, content FROM Comments
    JOIN Users ON Users.Id = Comments.UserId
    WHERE Comments.ArticleId = $articleId";
    return $conn->query($sql);
}