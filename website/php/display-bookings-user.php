<?php
require 'config.php';
require 'user-header.php';

echo"<img src=../images/booking-page1.png>";

// Retrieve the user's bookings
$userId = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingID = $_POST['booking_id'];

    // Check if the user is the booker of the booking
    $sqlCheckBooker = "SELECT * FROM Booking WHERE Booking_ID = '$bookingID' AND Booker_ID = '$userId'";
    $resultCheckBooker = mysqli_query($conn, $sqlCheckBooker);

    if (mysqli_num_rows($resultCheckBooker) > 0) {
        // Update the booking status to "Canceled" in the database
        $sql = "UPDATE Booking SET Booking_Status = 'Canceled' WHERE Booking_ID = '$bookingID'";
        mysqli_query($conn, $sql);

        // Redirect back to the booking display page
        header('Location: displayBookingsOnUser.php');
        exit();
    } else {
        // Display an error message if the user is not the booker of the booking
        echo "<p>You are not authorized to cancel this booking.</p>";
    }
}

// Retrieve upcoming bookings (excluding canceled bookings)
$sqlUpcoming = "SELECT * FROM Booking WHERE (Booker_ID = '$userId' OR Attendee_1_ID = '$userId' OR Attendee_2_ID = '$userId' OR Attendee_3_ID = '$userId' OR Attendee_4_ID = '$userId' OR Attendee_5_ID = '$userId') AND Booking_Status != 'Canceled' AND (Booking_Date > CURDATE() OR (Booking_Date = CURDATE() AND Booking_End_Time > CURTIME()))";
$resultUpcoming = mysqli_query($conn, $sqlUpcoming);

// Retrieve canceled bookings
$sqlCanceled = "SELECT * FROM Booking WHERE (Booker_ID = '$userId' OR Attendee_1_ID = '$userId' OR Attendee_2_ID = '$userId' OR Attendee_3_ID = '$userId' OR Attendee_4_ID= '$userId' OR Attendee_5_ID = '$userId') AND Booking_Status = 'Canceled' ORDER BY Booking_Date DESC, Booking_End_Time DESC";
$resultCanceled = mysqli_query($conn, $sqlCanceled);

// Retrieve expired bookings
$sqlExpired = "SELECT * FROM Booking WHERE (Booker_ID = '$userId' OR Attendee_1_ID = '$userId' OR Attendee_2_ID = '$userId' OR Attendee_3_ID = '$userId' OR Attendee_4_ID = '$userId' OR Attendee_5_ID = '$userId') AND Booking_Status = 'Expired' ORDER BY Booking_Date DESC, Booking_End_Time DESC";
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
        padding: 8px;
        border-radius: 4px;
        border: none;
        background-color: #ddd;
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
    .responsive-image {
        max-width: 100%;
        height: auto;
      }
</style>
";




// Display upcoming bookings
echo "<h1 class='section-heading'>UPCOMING BOOKINGS</h1>";

if ($resultUpcoming->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Booking Status</th>";
    echo "<th>Cancel Booking</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultUpcoming->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "<td>";
        echo "<form method='POST' action='displayBookingsOnUser.php'>";
        echo "<input type='hidden' name='booking_id' value='" . $row['Booking_ID'] . "'>";

        // Check if the user is the booker of the booking
        $sqlCheckBooker = "SELECT * FROM Booking WHERE Booking_ID = '" . $row['Booking_ID'] . "' AND Booker_ID = '$userId'";
        $resultCheckBooker = mysqli_query($conn, $sqlCheckBooker);

        if (mysqli_num_rows($resultCheckBooker) > 0) {
            echo "<button type='submit'>Cancel</button>";
        } else {
            echo "You are not authorized to cancel this booking.";
        }

        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No upcoming bookings found.</p>";
}

// Display canceled bookings
echo "<h1 class='section-heading'>CANCELED BOOKINGS</h1>";

if ($resultCanceled->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Booking Status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultCanceled->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No canceled bookings found.</p>";
}

// Display expired bookings
echo "<h1 class='section-heading'>EXPIRED BOOKINGS</h1>";

if ($resultExpired->num_rows > 0) {
    echo "<table class='custom-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>Booked Resource ID</th>";
    echo "<th>Booking Date</th>";
    echo "<th>Booking Start Time</th>";
    echo "<th>Booking End Time</th>";
    echo "<th>Booking Status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultExpired->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Booking_ID'] . "</td>";
        echo "<td>" . $row['Booked_Resource_ID'] . "</td>";
        echo "<td>" . $row['Booking_Date'] . "</td>";
        echo "<td>" . $row['Booking_Start_Time'] . "</td>";
        echo "<td>" . $row['Booking_End_Time'] . "</td>";
        echo "<td>" . $row['Booking_Status'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No expired bookings found.</p>";
}

$conn->close();


include('footer.php');

?>
