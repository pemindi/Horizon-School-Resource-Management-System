<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "horizon college";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booked dates from the database
$sql = "SELECT Booker_ID,Booked_Resource_ID,Booking_Date,Booking_Start_Time, Booking_End_Time FROM calendar2";
$result = $conn->query($sql);

$events = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = array(
            'title' => 'Booked - Booker: ' . $row['Booker_ID'] . ', Resource: ' . $row['Booked_Resource_ID'],
            'start' => $row['Booking_Date'] . 'T' . $row['Booking_Start_Time'],
            'end' => $row['Booking_Date'] . 'T' . $row['Booking_End_Time'],
        );      
    }
}

// Return booked dates as JSON
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>
