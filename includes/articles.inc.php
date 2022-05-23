<?php
require 'dbh.inc.php';
function getBlogs($conn)
{
    $sql = "SELECT Articles.Id as id, title, content, username as author
    FROM Articles
    JOIN Users ON Articles.AuthorId = Users.Id";
    return $conn->query($sql);
}
