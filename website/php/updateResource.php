<?php
include_once'config.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Resource_ID = $_POST['Resource_ID'];
    $Resource_Type = $_POST['Resource_Type'];
    $Resource_Availability = $_POST['Resource_Availability'];
    $sql = "UPDATE `resources` SET `Resource_ID` ='$Resource_ID', `Resource_Type`='$Resource_Type', `Resource_Availability`='$Resource_Availability' WHERE `Resource_ID`='$Resource_ID'";


if (mysqli_query($conn,$sql))
{
    echo"<script>alert('Record inserted suceesfully')</script>";
    header("Location:newResourceAdding.php");
    
}
else{
    echo"<script>alert('Error')</script>";
}

mysqli_close($conn);

}

    ?>