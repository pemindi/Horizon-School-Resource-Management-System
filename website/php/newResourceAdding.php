<?php

include("config.php");

$Resource_ID = "";
$Resource_Type = "";
$Resource_Availability = "";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $Resource_ID = $_POST["Resource_ID"];
    $Resource_Type = $_POST["Resource_Type"];
    $Resource_Availability = $_POST["Resource_Availability"];
}

do {
    if(empty($Resource_ID) || empty($Resource_Type) || empty($Resource_Availability)){
        $errorMessage = "All the fields are required";
        break;
    }

    $sql = "INSERT INTO Resources (Resource_ID, Resource_Type, Resource_Availability)".
    "VALUES ('$Resource_ID', '$Resource_Type', '$Resource_Availability')";
   
    $result = $conn->query($sql);

    if(!$result){
        $errorMessage = "Invalid query: ".$conn->error;
        break;
    }

    
    $Resource_ID = "";
    $Resource_Type = "";
    $Resource_Availability = "";

    $successMessage = "Lab added correctly";

    header("location:adminHall.php");
    exit;
    


} while (false);

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New labs </title>
    <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
  <link rel="stylesheet" text="styles/css" href="../css/styles.css">
  <link rel="stylesheet" text="styles/css" href="../css/Labs2.css">
  <link rel="stylesheet" text="styles/css" href="../css//table.css">


</head>
<body>
<?php
	include 'admin-header.php';
	?>
    <div class = "container">
        <h2><center>New Resources Adding Form</center></h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div role = 'alert'>
            <strong>$errorMessage</strong>
            <button type = 'button' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <br>
<a class = 'btn-primary' href = 'admin-homepage.php'> Back </a>

        <form method = "post">
            <div class = "form-group">
                <label class = "form_label">Resource_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Resource_ID" value="<?php echo $Resource_ID; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Resource_Type</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Resource_Type" value="<?php echo $Resource_Type; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Resource_Availability</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Resource_Availability" value="<?php echo $Resource_Availability; ?>">
                </div>
            </div>

            
                <div class = "col_6">
                    <button type = "submit" class = "btn2" > Submit </button>
                </div>
                <div>
                     <a class = "btn2" href="admin-homepage.php" role ="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>

<div>
    <H2><center>All labs and halls</center></H2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
            include "config.php";

            $sql = "SELECT * FROM resources";
            $result = $conn->query($sql);

            if(!$result){
                die("Invalid query: ". $con->error);
            }

            while($row =$result->fetch_assoc()){
                echo"
                <tr>
                    <td>$row[Resource_ID]</td>
                    <td>$row[Resource_Type]</td>
                    <td>$row[Resource_Availability]</td>
                    <td>
            <a class = 'btn-primary' href = 'editResource.php?id=$row[Resource_ID]' role = button> Edit </a>
            
            <a class = 'btn-primary' href = 'deleteLab.php?id=$row[Resource_ID]'> Delete </a>
            
          </td>
                    </tr>
                ";
            }
            ?>
            </tbody>
        </table>

       







</body>
</html>