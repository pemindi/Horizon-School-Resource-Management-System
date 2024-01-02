<?php
include "config.php";
if(isset($_GET['id'])){
    $User_ID=$_GET['id'];
    $sql="DELETE FROM user_profile WHERE User_ID='$User_ID'";
    $conn->query($sql);
}
header('Location: userprofilecard.php');
exit;
?>