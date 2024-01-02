<?php
ob_start(); 
include_once "config.php";

if (isset($_GET['id'])) {
    $Sender_ID = $_GET['id'];

    $sql = "DELETE FROM feedback WHERE Sender_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Sender_ID);
   
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: ../includes/read.php");
exit;
ob_end_flush();
?>