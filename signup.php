<?php
require 'header.php';
?>

<main>
    <h1>Signup</h1>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name="name" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit" class="btn btn-primary">Signup</button>
    </form>
</main>