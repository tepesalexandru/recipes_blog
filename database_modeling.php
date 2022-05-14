<?php
    $servername = "localhost";
    $database = "recipes_blog";
    $username = "root_admin";
    $password = "root123";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE $database";
    $conn->query($sql);

    // Select database
    $conn = new mysqli($servername, $username, $password, $database);

    // Create users table
    $sql = "CREATE TABLE Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName NVARCHAR(30) NOT NULL,
        lastName NVARCHAR(30) NOT NULL
    )";
    $conn->query($sql);

    // Create articles table
    $sql = "CREATE TABLE Articles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title NVARCHAR(50) NOT NULL,
        content NVARCHAR(500) NOT NULL,
        authorId INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (authorId) REFERENCES Users(id)
    )";

    $conn->query($sql);

     // Create comments table
     $sql = "CREATE TABLE Comments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        content NVARCHAR(500) NOT NULL,
        userId INT(6) UNSIGNED NOT NULL,
        articleId INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (articleId) REFERENCES Articles(id),
        FOREIGN KEY (userId) REFERENCES Users(id)
    )";

    $conn->query($sql);

?>