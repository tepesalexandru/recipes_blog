<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Recipes</title>
</head>

<body>
    <?php include 'seed_database.php'; ?>
    <?php
    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>