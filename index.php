<?php
require 'header.php';
require 'database_modeling.php'
?>

<main>
    <?php
    if (!isset($_SESSION['userId'])) {
        echo '<p>You are logged out!</p>';
    } else {
        echo '<p>You are logged in!</p>';
    }
    ?>
</main>