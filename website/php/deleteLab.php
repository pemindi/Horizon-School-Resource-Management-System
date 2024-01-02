<?php
include "config.php";

if (isset($_GET['id'])) {
    $Resource_ID = $_GET['id'];

    $sql = "DELETE FROM resources WHERE Resource_ID = '$Resource_ID'";
    $stmt = $conn->prepare($sql);
   
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: newResourceAdding.php");
exit;
?>







