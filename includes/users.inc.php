<?php
require 'dbh.inc.php';

function getUsers($conn) {
    $sql = "SELECT * FROM Users";
    return $conn->query($sql);
}

function getUserById($conn, $userId) {
    $sql = "SELECT * FROM Users WHERE Users.Id = $userId";
    $result = $conn->query($sql);
    $firstRow = mysqli_fetch_assoc($result); 
    return $firstRow;
}