<?php
require 'header.php';
require 'database_modeling.php'
?>
<main>
    <?php
    if (!isset($_SESSION['userId'])) {
        include("login.php");
    } else {
        include("view_articles.php");
    }
    ?>
</main>