<?php
session_start();

// Check if the user has a valid reset_email and reset_user_id in the session
if (!isset($_SESSION['reset_email']) || !isset($_SESSION['reset_user_id']) || !isset($_SESSION['user_type'])) {
    // Redirect the user back to the forgot password page if session data is missing
    header("Location: forgotpasspage.php");
    exit();
}

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
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $userType = $_POST['user_type'];

    if ($newPassword !== $confirmPassword) {
        // Passwords do not match
        echo '<script>alert("Passwords do not match.");</script>';
        // Redirect the user back to the reset password page
        echo '<script>window.location.href = "resetpasspage.php";</script>';
        exit();
    }
    
    if(strlen($newPassword)<8){
        echo"<script>alert('Your password is too short.It should be at least 8 characters long.')</script>";
        echo "<script>window.location.href = 'resetpasspage.php';</script>";
        exit();
    }

    $email = $_SESSION['reset_email'];
    $userId = $_SESSION['reset_user_id'];
    $tableName = '';
    $idField = '';
    $passField = '';

    // Determine the table and field names based on user type
    switch ($userType) {
        case 'teacher':
            $tableName = 'Teacher';
            $idField = 'T_ID';
            $passField = 'T_Password';
            break;
        case 'student':
            $tableName = 'Student';
            $idField = 'S_ID';
            $passField = 'S_Password';
            break;
        case 'admin':
            $tableName = 'ResourceManager';
            $idField = 'RM_ID';
            $passField = 'RM_Password';
            break;
    }


    
    $query = "SELECT $passField FROM $tableName WHERE $passField = '$newPassword'";
    $result = mysqli_query($conn, $query);
    $existingPassword = mysqli_fetch_assoc($result);

    if ($existingPassword) {
        echo "<script>alert('Password already exists. Please choose a different password.');</script>";
        echo "<script>window.location.href = 'resetpasspage.php';</script>";
        exit();
    }

 

    // Update the password in the respective table
    $query = "UPDATE $tableName SET $passField='$newPassword' WHERE $idField='$userId'";
    if ($conn->query($query) === TRUE) {
        // Password updated successfully

      


        // Clear the reset_email and reset_user_id from the session
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_user_id']);


        echo '<script>alert("Password updated successfully.");</script>';

       

        if ($userType == 'student' || $userType == 'teacher') {
         
            header("Location: user-homepage.php"); // Redirect to the homepage
            exit();
        }

        if ($userType == 'admin') {
            header("Location: admin-homepage.php"); // Redirect to the homepage
            exit();
        }

    } else {
        // Error updating password
        echo '<script>alert("Error updating password. Please try again.");</script>';
        // Redirect the user back to the reset password page
        echo '<script>window.location.href = "resetpasspage.php";</script>';
        exit();
    }
}
?>
