<?php
   include "config.php";
   if(isset($_POST['submit'])){
    $Booking_ID=$_POST['Booking_ID'];
    $Booker_ID=$_POST['Booker_ID'];
    $Booked_Resource_ID=$_POST['Booked_Resource_ID'];
    $Booking_Date=$_POST['Booking_Date'];
    $Booking_Start_Time=$_POST['Start_time'];
    $Booking_End_Time=$_POST['End_time'];
    $q="INSERT INTO calendar2 (Booking_ID,Booker_ID,Booked_Resource_ID,Booking_Date,Booking_Start_Time,Booking_End_Time)
    VALUES (' $Booking_ID', '$Booker_ID', '$Booked_Resource_ID', '$Booking_Date', '$Booking_Start_Time', '$Booking_End_Time')";
    $query=mysqli_query($conn,$q);
   }


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" text="styles/css" href="../css/forms.css">
        <title>
            Add new data
        </title>
    </head>
    <body>
    <h2>Add New Data</h2> 

    <form method="POST" action=""> 

    <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="Booking ID" name="Booking_ID"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="Booker ID" name="Booker_ID"><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="Booked Resource ID" name="Booked_Resource_ID"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="Booking Date" name="Booking_Date"><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="Start time" name="Start_time"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="End time" name="End_time"><br>
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