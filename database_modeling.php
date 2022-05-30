<?php
    $servername = "localhost";
    $database = "recipes_blog";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    $conn->query($sql);

    // Select database
    $conn = new mysqli($servername, $username, $password, $database);

    // Create users table
    $sql = "CREATE TABLE IF NOT EXISTS Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username NVARCHAR(50) NOT NULL,
        email NVARCHAR(50) NOT NULL,
        password NVARCHAR(100) NOT NULL,
        isAdmin INT(6) NOT NULL,
        imageBlob LONGBLOB NOT NULL,
        isDisabled INT(6) NOT NULL DEFAULT 0
    )";
    $conn->query($sql);

    // Create articles table
    $sql = "CREATE TABLE IF NOT EXISTS Articles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title NVARCHAR(50) NOT NULL,
        content NVARCHAR(5000) NOT NULL,
        authorId INT(6) UNSIGNED NOT NULL,
        publishedOn DATETIME NOT NULL,
        imageBlob LONGBLOB NOT NULL,
        FOREIGN KEY (authorId) REFERENCES Users(id)
    )";

    $conn->query($sql);

     // Create comments table
     $sql = "CREATE TABLE IF NOT EXISTS Comments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        content NVARCHAR(500) NOT NULL,
        userId INT(6) UNSIGNED NOT NULL,
        articleId INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (articleId) REFERENCES Articles(id) ON DELETE CASCADE,
        FOREIGN KEY (userId) REFERENCES Users(id)
    )";

    $conn->query($sql);
?>