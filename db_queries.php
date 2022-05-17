<?php
function getBlogs($conn)
{
    $sql = "SELECT Articles.id as id, Articles.title as title, Users.firstName as author
    FROM Articles 
    INNER JOIN Users 
    ON Articles.authorId = Users.Id";
    return $conn->query($sql);
}
