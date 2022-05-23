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