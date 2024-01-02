<?php

include("config.php");

include 'user-header.php';
?>

<?php

function generateBookingId()
{
    global $conn;

    $prefix = 'BK';
    $tableName = 'booking';
    $idField = 'Booking_ID';

    // Get the maximum ID from the booking table
    $query = "SELECT MAX($idField) AS maxId FROM $tableName";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['maxId'];

    // Extract the numeric portion of the maximum ID
    $maxIdNumeric = (int) substr($maxId, strlen($prefix));

    // Increment the numeric ID and pad with zeros
    $newIdNumeric = $maxIdNumeric + 1;
    $paddedIdNumeric = str_pad($newIdNumeric, 3, '0', STR_PAD_LEFT);

    // Generate the new ID by concatenating the prefix and padded numeric ID
    $newId = $prefix . $paddedIdNumeric;

    return $newId;
}

?>

<?php

$Booked_Resource_ID="";
$Booker_ID="";
$Booking_Date="";
$Booking_Start_Time="";
$Booking_End_Time="";
$Attendee_1_ID="";
$Attendee_2_ID="";
$Attendee_3_ID="";
$Attendee_4_ID="";
$Attendee_5_ID="";
$Calendar_ID="";


$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    
    $Booked_Resource_ID = $_POST["Booked_Resource_ID"];
    $Booker_ID = $_POST["Booker_ID"];
    $Booking_Date = $_POST["Booking_Date"];
    $Booking_Start_Time = $_POST["Booking_Start_Time"];
    $Booking_End_Time = $_POST["Booking_End_Time"];
    $Attendee_1_ID = $_POST["Attendee_1_ID"];
    $Attendee_2_ID = $_POST["Attendee_2_ID"];
    $Attendee_3_ID = $_POST["Attendee_3_ID"];
    $Attendee_4_ID = $_POST["Attendee_4_ID"];
    $Attendee_5_ID = $_POST["Attendee_5_ID"];
    $Calendar_ID=$_POST["Calendar_ID"];
   

}

do {
    if(empty($Booked_Resource_ID) || empty($Booker_ID) || empty($Booking_Date)){
        $errorMessage = "ID Fields are required";
        break;
    }
    $newBookingId = generateBookingId();

    $sql = "INSERT INTO booking (Booking_ID, Booked_Resource_ID, Booker_ID, Booking_Date,Booking_Start_Time,Booking_End_Time,
    Attendee_1_ID,Attendee_2_ID,Attendee_3_ID,Attendee_4_ID, Attendee_5_ID,Booking_Status,Calendar_ID )".
    "VALUES ('$newBookingId','$Booked_Resource_ID', '$Booker_ID', '$Booking_Date', '$Booking_Start_Time', '$Booking_End_Time',
    '$Attendee_1_ID', '$Attendee_2_ID', '$Attendee_3_ID', '$Attendee_4_ID', '$Attendee_5_ID', 'Pending','$Calendar_ID')";
   
    $result = $conn->query($sql);

    if(!$result){
        $errorMessage = "Invalid query: ".$con->error;
        break;
    }

    



    $successMessage = "Booking is successful";

    header("location:userLab.php");
    exit;
    


} while (false);

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
    <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
  <link rel="stylesheet" text="styles/css" href="../css/styles.css">
  <link rel="stylesheet" text="styles/css" href="../css/Labs2.css">


</head>
<body>
    <div class = "container">
        <h2><center> Reservation Form</center></h2>

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


        <form method = "post">

            

            <div class = "form-group">
                <label class = "form_label">Booked_Resource_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Booked_Resource_ID" value="<?php echo $Booked_Resource_ID; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Booker_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Booker_ID" value="<?php echo $Booker_ID; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Booking_Date</label>
                <div class = "col_6">
                    <input type = "date" class = "form_control" name="Booking_Date" value="<?php echo $Booking_Date; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Booking_Start_Time</label>
                <div class = "col_6">
                    <input type = "time" class = "form_control" name="Booking_Start_Time" value="<?php echo $Booking_Start_Time; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Booking End Time</label>
                <div class = "col_6">
                    <input type = "time" class = "form_control" name="Booking_End_Time" value="<?php echo $Booking_End_Time; ?>">
                </div>
            </div>

            <div class = "form-group">
                <label class = "form_label">Attendee_1_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Attendee_1_ID" value="<?php echo $Attendee_1_ID; ?>">
                </div>
            </div>

            
            <div class = "form-group">
                <label class = "form_label">Attendee_2_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Attendee_2_ID" value="<?php echo $Attendee_2_ID; ?>">
                </div>
            </div>

            
            <div class = "form-group">
                <label class = "form_label">Attendee_3_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Attendee_3_ID" value="<?php echo $Attendee_3_ID; ?>">
                </div>
            </div>

            
            <div class = "form-group">
                <label class = "form_label">Attendee_4_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Attendee_4_ID" value="<?php echo $Attendee_4_ID; ?>">
                </div>
            </div>

            
            <div class = "form-group">
                <label class = "form_label">Attendee_5_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Attendee_5_ID" value="<?php echo $Attendee_5_ID; ?>">
                </div>
            </div>

            
            <div class = "form-group">
                <label class = "form_label">Booker_Calendar_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Calendar_ID" value="<?php echo $Calendar_ID; ?>">
                </div>
            </div>

            

            <?php
            if(!empty($successMessage)){
                echo"
            <div role = 'alert'>
            <strong>$successMessage</strong>
            <button type = 'button' aria-label='Close'></button>
            </div>
            ";
            }

            ?>

            <div class = "row">
                <div>
                <button type="submit" class="btn2" onclick="alert('Your booking is successful')">Submit</button>

                    
                </div>
                <div>
                     <a class = "btn2" href="user-homepage.php" role ="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>


    <?php 
    include 'footer.php';
    ?>


</body>
</html>