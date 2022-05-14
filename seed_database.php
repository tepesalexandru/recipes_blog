<?php
    include 'database_modeling.php';
    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO Users (firstName, lastName)
            VALUES 
            ('Alex', 'Tepes'),
            ('Paula', 'Tepes')";

        $conn->query($sql);
    }

?>