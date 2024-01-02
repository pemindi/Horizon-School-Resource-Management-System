<?php
include "config.php";

$Resource_ID = "";
$Resource_Type = "";
$Resource_Availability = "";



$Resource_ID = $_GET['id'];

        $sql = "SELECT * FROM resources WHERE Resource_ID = '$Resource_ID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $Resource_ID = $row['Resource_ID'];
    $Resource_Type = $row['Resource_Type'];
    $Resource_Availability = $row['Resource_Availability'];

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Labs </title>
    <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
  <link rel="stylesheet" text="styles/css" href="../css/styles.css">
  <link rel="stylesheet" text="styles/css" href="../css/Labs2.css">



</head>
<body>

<?php
	include 'user-header.php';
	?>
   
        


        <form method = "post" action="updateResource.php">
        <div class = "container">
            <div class = "form-group">
                <label class = "form_label">Resource_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Resource_ID" placeholder="Resource_ID" value="<?php echo $Resource_ID; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Resource_Type</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control"  name="Resource_Type" placeholder="Resource_Type" value="<?php echo $Resource_Type; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Resource_Availability</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Resource_Availability" placeholder="Resource_Availability" value="<?php echo $Resource_Availability; ?>">
                </div>
</div>

            <div class = "form-group">
                <div>
                    <button type = "submit" class = "btn2" > Submit </button>
                </div>
                <div>
                     <a class = "btn2" href="newResourceAdding.php" role ="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>



</body>
</html>
