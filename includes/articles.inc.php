<?php
require 'dbh.inc.php';
function getBlogs($conn)
{
    $sql = "SELECT Articles.Id as Id, Title, Content, Username as Author
    FROM Articles
    JOIN Users ON Articles.AuthorId = Users.Id";
    return $conn->query($sql);
}
