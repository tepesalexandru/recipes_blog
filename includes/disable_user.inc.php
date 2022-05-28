<?php
if (isset($_POST['disable-user'])) {
    require 'dbh.inc.php';
    $userId = $_POST['userId'];

    if (empty($userId)) {
        header("Location: ../admin_panel.php?tab=users&error=emptyId");
        exit();
    } else {
        $sql = "UPDATE Users
        SET isDisabled = 1
        WHERE Users.id = $userId";
        $conn->query($sql);
        header("Location: ../admin_panel.php?tab=users");
        exit();
    }
    mysqli_close($conn);
} else {
    header("Location: ../admin_panel.php?tab=users");
    exit();
}
