<?php
include "config.php";
if(isset($_GET['id'])){
    $Calendar_id=$_GET['id'];
    $sql="DELETE FROM calendar2 WHERE Calendar_id=$Calendar_id";
    $conn->query($sql);
}
header('Location: calendarAdmin.php');
exit;
?> 
