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

// Function to authenticate user login
function authenticateUser($email, $password, $userType) {
   global $conn;

    // Sanitize user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Define the table name based on the user type
    $tableName = '';
    global $primaryKey;
    $passwordField='';

     global $firstNameField;
     global $lastNameField;

    switch ($userType) {
        case 'teacher':
            $tableName = 'Teacher';
            $primaryKey = 'T_ID';
            $passwordField='T_Password';
            $firstNameField='T_FirstName';
            $lastNameField='T_LastName';
            $tableName2 = 'T_Email';

            break;

        case 'student':
            $tableName = 'Student';
            $primaryKey = 'S_ID';
            $passwordField='S_Password';
            $firstNameField='S_FirstName';
            $lastNameField='S_LastName';
            $tableName2 = 'S_Email';


            break;

        case 'admin':
            $tableName = 'ResourceManager';
            $primaryKey='RM_ID';
            $passwordField='RM_Password';
            $firstNameField='RM_FirstName';
            $lastNameField='RM_LastName';
            $tableName2 = 'RM_Email';

            break;
    }

    // Fetch user information from the respective table
    $query = "SELECT $primaryKey, $firstNameField, $lastNameField FROM $tableName WHERE $primaryKey IN (SELECT $primaryKey FROM {$tableName}_Email WHERE $tableName2 = '$email') AND $passwordField = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $userInfo = mysqli_fetch_assoc($result);

        return $userInfo; 
    
    } 

    mysqli_close($conn);
    return null;
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    $userInfo = authenticateUser($email, $password, $userType);

    if ($userInfo) {
        // Successful login
    
        // Store user information in session variables
        $_SESSION['id'] = $userInfo[$primaryKey];
        $_SESSION['firstName'] = $userInfo[$firstNameField];
        $_SESSION['lastName'] = $userInfo[$lastNameField];

    
    
        // Redirect to the appropriate page based on user type
        switch ($userType) {
            case 'teacher':
                header("Location: user-homepage.php");
              
                break;
            case 'student':
                header("Location: user-homepage.php");
                break;
            case 'admin':
                header("Location: admin-homepage.php");
                break;
        }
        exit();
    }else {
        // Failed login
        $errorMessage = "Invalid email / password or user type.";
    
        echo '<script>alert("' . $errorMessage . '");</script>';
        echo '<script>alert("Please re-enter your username and password and user type.");</script>';
        echo '<script>window.location.href = "signin-signup.php";</script>';
    }


}





?>

