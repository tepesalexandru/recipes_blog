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


    $sql = "SELECT * FROM Articles";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO Articles (title, content, authorId)
            VALUES 
            ('Alfredo chicken pasta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare varius convallis. Pellentesque vitae vestibulum nisl. Integer sagittis lorem a tortor lobortis, sed maximus tellus tempus. Etiam vestibulum placerat enim, vel rutrum dolor. Quisque vitae mauris laoreet, porta augue vel, lacinia nunc. Etiam hendrerit, justo nec bibendum dictum, velit metus volutpat erat, vitae varius quam leo at neque. Nulla aliquet quam vel tristique consequat.', 1),
            ('Rice with vegetables', 'Morbi eu auctor augue, sit amet mattis arcu. Aenean maximus, erat laoreet vulputate faucibus, sapien arcu suscipit arcu, nec luctus lorem felis in quam. Donec sit amet massa quam.', 2)";

        $conn->query($sql);
    }

?>