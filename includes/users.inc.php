<?php
require 'dbh.inc.php';

function getUsers($conn) {
    $sql = "SELECT * FROM Users";
    return $conn->query($sql);
}