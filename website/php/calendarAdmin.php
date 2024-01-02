<?php
    include('admin-header.php');
?>
<link rel="stylesheet" text="styles/css" href="../css/calender.css">

<a href="AddNewCalendar.php" class="btn btn-primary">Add New</a>
<a href="calander.php" class="btn btn-primary">View Calendar</a>

<table class="table">
  <thead>
    <tr>
      <th>Calendar ID</th>
      <th>Booking ID</th>
      <th>Booker ID</th>
      <th>Booked Resource ID</th>
      <th>Booked date</th>
      <th>Start time</th>
      <th>End time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody> 
    <?php
     include "config.php";
     $sql = "SELECT * FROM calendar2";
     $result = $conn ->query($sql);
      if(!$result){
        die("Invalid query!");
      }
      while ($row=$result->fetch_assoc()){
        echo"
    <tr>
      <th>$row[Calendar_id]</th>
      <td>$row[Booking_ID]</td>
      <td>$row[Booker_ID]</td>
      <td>$row[Booked_Resource_ID]</td>
      <td>$row[Booking_Date]</td>
      <td>$row[Booking_Start_Time]</td>
      <td>$row[Booking_End_Time]</td>
      <td>
              <a class='btn-success' href='editCalendar.php?id=$row[Calendar_id]'>Edit</a>
              <a class='btn-danger' href='deleteCalendar.php?id=$row[Calendar_id]'>Delete</a>
      </td>  
    </tr>
    ";
    }
    ?>
  </tbody>
</table>
<?php
    include('footer.php');
?>