<?php
include "config.php";
$Booking_ID = "";
$Booker_ID = "";
$Booked_Resource_ID = "";
$Booking_Date = "";
$Booking_Start_Time = "";
$Booking_End_Time = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: calendarAdmin.php');
        exit;
    }

    $Calendar_id = $_GET['id'];
    $sql = "SELECT * FROM calendar2 WHERE Calendar_id=$Calendar_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while (!$row) {
        header('Location: calendarAdmin.php');
        exit;
    }
    $Calendar_id = $_GET['id'];
    $Booking_ID = $row['Booking_ID'];
    $Booker_ID = $row['Booker_ID'];
    $Booked_Resource_ID = $row['Booked_Resource_ID'];
    $Booking_Date = $row['Booking_Date'];
    $Booking_Start_Time = $row['Booking_Start_Time'];
    $Booking_End_Time = $row['Booking_End_Time'];
} else {
    $Calendar_id = $_GET['id'];
    $Booking_ID = $_POST['Booking_ID'];
    $Booker_ID = $_POST['Booker_ID'];
    $Booked_Resource_ID = $_POST['Booked_Resource_ID'];
    $Booking_Date = $_POST['Booking_Date'];
    $Booking_Start_Time = $_POST['Start_time'];
    $Booking_End_Time = $_POST['End_time'];

    $sql = "UPDATE calendar2 SET Booking_ID='$Booking_ID', Booker_ID='$Booker_ID', Booked_Resource_ID='$Booked_Resource_ID', Booking_Date='$Booking_Date', Booking_Start_Time='$Booking_Start_Time', Booking_End_Time='$Booking_End_Time' WHERE Calendar_id=$Calendar_id";
    $result = $conn->query($sql);

    header('Location: calendarAdmin.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" text="styles/css" href="styles/forms.css">
        <title>
            Add new data
        </title>
    </head>
    <body>
    <h2>Add New Data</h2> 

  <form method="POST"  action="editCalendar.php?id=<?php echo $Calendar_id ?>">
  <input type="text" name="Calendar_id"  value="<?php echo $Calendar_id ?>" class="form-control"><br>
    <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="Booking ID" name="Booking_ID"   value="<?php echo $Booking_ID ?>"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="Booker ID" name="Booker_ID"  value="<?php echo $Booker_ID ?>"><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="Booked Resource ID" name="Booked_Resource_ID"  value="<?php echo $Booked_Resource_ID ?>"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="Booking Date" name="Booking_Date"  value="<?php echo $Booking_Date ?>"><br>
  </div>
 </div>
 <div class="row">
    <div class="col1">
        <input type="text" class="form-control" placeholder="Start time" name="Start_time" value="<?php echo $Booking_Start_Time ?>"><br>
    </div>
    <div class="col2">
        <input type="text" class="form-control" placeholder="End time" name="End_time" value="<?php echo $Booking_End_Time ?>"><br>
    </div>
 </div>
 <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success" name="submit">Submit</button><br>
            </div>
            <div class="col">
              <button> <a type="submit" class="btn btn-danger" name="cancel" href="calendarAdmin.php">Cancel</a></button><br>
            </div>
        </div>
     </form>
    </body> 
</html>   