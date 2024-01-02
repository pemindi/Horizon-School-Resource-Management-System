<?php

session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "horizon college";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {

    $userId = $_POST['user_id'];
    $email = $_POST['email'];
    $userType = $_POST['user_type'];


$tableName='';
$idField='';
$emailField='';



// Validate the email and user ID against the respective table based on user type
switch ($userType) {
    case 'teacher':
        $tableName = 'Teacher_Email';
        $idField = 'T_ID';
        $emailField = 'T_Email';
        break;

    case 'student':
        $tableName = 'Student_Email';
        $idField = 'S_ID';
        $emailField = 'S_Email';
        break;

    case 'admin':
        $tableName = 'ResourceManager_Email';
        $idField = 'RM_ID';
        $emailField = 'RM_Email';
        break;
}

$query = "SELECT $idField,$emailField FROM $tableName WHERE $emailField = '$email' AND $idField='$userId'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Valid user, redirect to the password reset page
    $_SESSION['reset_email'] = $email;
    $_SESSION['reset_user_id'] = $userId;
    $_SESSION['user_type'] = $userType;

    header("Location: resetpasspage.php");
    exit();
} else {
    // Invalid email or user ID
    echo '<script>alert("Invalid email address or user ID.");</script>';
    // Redirect the user back to the password reset form
    echo '<script>window.location.href = "forgotpasspage.php";</script>';
}
}
?>