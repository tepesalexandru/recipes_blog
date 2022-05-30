<?php
require 'header.php';
require 'database_modeling.php';
if (!isset($_SESSION['userId'])) {
    echo '<main style="min-height: 100vh; display: flex; align-items: center">';
    include("login.php");
    echo '</main>';
} else {
    include("view_articles.php");
}
