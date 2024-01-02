<?php
require 'config.php';
require 'admin-header.php';

echo"<img src=../images/booking-page1.png>";

// Handle status change form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingID = $_POST['booking_id'];
    $newStatus = $_POST['new_status'];

    // Update the booking status in the database
    $sql = "UPDATE Booking SET Booking_Status = '$newStatus' WHERE Booking_ID = '$bookingID'";
    mysqli_query($conn, $sql);

    // Construct the UPDATE query
    $query = "UPDATE resources SET Resource_Availability = 'Booked' WHERE Resource_ID IN 
              (SELECT Booked_Resource_ID FROM booking WHERE Booking_ID = '$bookingID' AND Booking_Status = 'Confirmed')";
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Redirect back to the original page
    header('Location: display-bookings-admin.php');
    exit();
}

// Update the status of expired bookings
$currentDateTime = date('Y-m-d H:i:s');
$sqlUpdateExpired = "UPDATE Booking SET Booking_Status = 'Expired' WHERE  (Booking_Date < CURDATE() OR (Booking_Date = CURDATE() AND Booking_End_Time <= CURTIME()))";
mysqli_query($conn, $sqlUpdateExpired);

// Delete expired bookings older than 3 months
$expirationDate = date('Y-m-d H:i:s', strtotime('-3 months'));
$sqlDeleteExpired = "DELETE FROM Booking WHERE Booking_Status = 'Expired' AND Booking_Date < '$expirationDate'";
mysqli_query($conn, $sqlDeleteExpired);

// Retrieve upcoming bookings
$sqlUpcoming = "SELECT * FROM Booking WHERE (Booking_Date > CURDATE() OR (Booking_Date = CURDATE() AND Booking_End_Time > CURTIME())) AND Booking_Status != 'Canceled'";
$resultUpcoming = mysqli_query($conn, $sqlUpcoming);

// Retrieve canceled bookings
$sqlCanceled = "SELECT * FROM Booking WHERE Booking_Status = 'Canceled'";
$resultCanceled = mysqli_query($conn, $sqlCanceled);

// Retrieve expired bookings
$sqlExpired = "SELECT * FROM Booking WHERE Booking_Status = 'Expired' ORDER BY Booking_Date DESC, Booking_End_Time DESC";
$resultExpired = mysqli_query($conn, $sqlExpired);



echo "
<style>
.custom-table {
    border-collapse: collapse;
    width: 100%;
  }
  
  .custom-table th,
  .custom-table td {
    border: 4px solid #ccc;
    padding: 8px;
    
  }
  
  .custom-table th {
    background-color: #f2f2f2;
    color: #333;
    text-align: left;
  }
  
  .custom-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  .custom-table tbody tr:hover {
    background-color: #ddd;
  }

    /* Style for the form */
    form {
        display: inline-block;
        margin: 0;
    }

    select, button {
        font-size: 14px;
        color:white;
        padding: 8px;
        border-radius: 4px;
        border: none;
        background-color: rgb(107,39,175);
        transition: background-color 0.3s ease;
    }
    .section-heading {
        font-size: 30px;
        color: rgb(107,39,175);
        margin-bottom: 10px;
        text-transform: uppercase;
        text-align:center;
        border-bottom: 2px solid #ccc;
        padding:12px;
        text-decoration:underline;
      }
      

    button {
        background-color: rgb(107, 39, 175);
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: blueviolet;
    }

    /* Style for table header */
    thead th {
        background-color: rgb(107, 39, 175);
        color: white;
        font-weight: bold;
    }

    /* Style for table rows */
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
";

echo "<h1 class='section-heading'>UPCOMING BOOKINGS</h1>";


// Display upcoming bookings
if ($resultUpcoming->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booker ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Attendee 1</th>";
    echo "<th>Attendee 2</th>";
    echo "<th>Attendee 3</th>";
    echo "<th>Attendee 4</th>";
    echo "<th>Attendee 5</th>";
    echo "<th>Booking Status</th>";
    echo "<th>Calendar ID</th>";
    echo "<th>Change Status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultUpcoming->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booker_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . ($row['Attendee_1_ID'] ? $row['Attendee_1_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_2_ID'] ? $row['Attendee_2_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_3_ID'] ? $row['Attendee_3_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_4_ID'] ? $row['Attendee_4_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_5_ID'] ? $row['Attendee_5_ID'] : '-') . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "<td>" . $row['Calendar_ID'] . "</td>";
        echo "<td>";
        echo "<form method='post' action='display-bookings-admin.php'>";
        echo "<input type='hidden' name='booking_id' value='" . $row['Booking_ID'] . "'>";
        echo "<select name='new_status'>";
        echo "<option value='Pending'>Pending</option>";
        echo "<option value='Confirmed'>Confirmed</option>";
        echo "<option value='Canceled'>Canceled</option>";
        echo "</select>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No upcoming bookings.</p>";
}

echo "<h1 class='section-heading'>CANCELED BOOKINGS</h1>";

// Display canceled bookings
if ($resultCanceled->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booker ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Attendee 1</th>";
    echo "<th>Attendee 2</th>";
    echo "<th>Attendee 3</th>";
    echo "<th>Attendee 4</th>";
    echo "<th>Attendee 5</th>";
    echo "<th>Booking Status</th>";
    echo "<th>Calendar ID</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultCanceled->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booker_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . ($row['Attendee_1_ID'] ? $row['Attendee_1_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_2_ID'] ? $row['Attendee_2_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_3_ID'] ? $row['Attendee_3_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_4_ID'] ? $row['Attendee_4_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_5_ID'] ? $row['Attendee_5_ID'] : '-') . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "<td>" . $row['Calendar_ID'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No canceled bookings.</p>";
}

echo "<h1 class='section-heading'>EXPIRED BOOKINGS</h1>";

// Display expired bookings
if ($resultExpired->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booker ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Attendee 1</th>";
    echo "<th>Attendee 2</th>";
    echo "<th>Attendee 3</th>";
    echo "<th>Attendee 4</th>";
    echo "<th>Attendee 5</th>";
    echo "<th>Booking Status</th>";
    echo "<th>Calendar ID</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultExpired->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booker_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . ($row['Attendee_1_ID'] ? $row['Attendee_1_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_2_ID'] ? $row['Attendee_2_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_3_ID'] ? $row['Attendee_3_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_4_ID'] ? $row['Attendee_4_ID'] : '-') . "</td>";
        echo "<td>" . ($row['Attendee_5_ID'] ? $row['Attendee_5_ID'] : '-') . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "<td>" . $row['Calendar_ID'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No expired bookings.</p>";
}

require 'footer.php';


?>