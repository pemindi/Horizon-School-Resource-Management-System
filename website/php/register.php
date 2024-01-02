<?php

// Database connection details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'horizon college';

// Establish database connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to generate user ID
function generateUserId($userType)
{
    global $conn;

    $prefix = '';
    $tableName = '';
    $idField = '';

    switch ($userType) {
        case 'student':
            $prefix = 'ST';
            $tableName = 'Student';
            $idField = 'S_ID';
            break;

        case 'teacher':
            $prefix = 'TEA';
            $tableName = 'Teacher';
            $idField = 'T_ID';
            break;
    }

    // Get the maximum ID from the respective table
    $query = "SELECT MAX($idField) AS maxId FROM $tableName";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['maxId'];

    // Extract the numeric portion of the maximum ID
    $maxIdNumeric = (int) substr($maxId, strlen($prefix));

    // Increment the numeric ID and pad with zeros
    $newIdNumeric = $maxIdNumeric + 1;
    $paddedIdNumeric = str_pad($newIdNumeric, 4, '0', STR_PAD_LEFT);

    // Generate the new ID by concatenating the prefix and padded numeric ID
    $newId = $prefix . $paddedIdNumeric;

    return $newId;
}

// Function to insert user details into the respective table
function insertUserDetails($userId, $firstName, $lastName, $address, $password, $userType)
{
    global $conn;

    // Define the table and column names based on the user type
    $tableName = '';
    $idField = '';
    $firstNameField = '';
    $lastNameField = '';
    $addressField = '';
    $passwordField = '';

    switch ($userType) {
        case 'student':
            $tableName = 'Student';
            $idField = 'S_ID';
            $firstNameField = 'S_FirstName';
            $lastNameField = 'S_LastName';
            $addressField = 'S_Address';
            $passwordField = 'S_Password';
            break;
        case 'teacher':
            $tableName = 'Teacher';
            $idField = 'T_ID';
            $firstNameField = 'T_FirstName';
            $lastNameField = 'T_LastName';
            $addressField = 'T_Address';
            $passwordField = 'T_Password';
            break;
    }

    // Prepare the query
    $query = "INSERT INTO $tableName ($idField, $passwordField, $firstNameField, $lastNameField, $addressField) VALUES ('$userId', '$password', '$firstName', '$lastName', '$address')";

    // Execute the query
    mysqli_query($conn, $query);

    $query = "INSERT INTO Users(User_ID,User_Type) VALUES ('$userId','$userType')";
    mysqli_query($conn, $query);
}

// Function to insert email address into the respective table
function insertEmailAddress($userId, $email, $userType)
{
    global $conn;

    $tableName = '';
    $idField = '';
    $emailField = '';

    switch ($userType) {
        case 'student':
            $tableName = 'Student_Email';
            $idField = 'S_ID';
            $emailField = 'S_Email';
            break;
        case 'teacher':
            $tableName = 'Teacher_Email';
            $idField = 'T_ID';
            $emailField = 'T_Email';
            break;
    }

    // Prepare the query
    $query = "INSERT INTO $tableName ($idField, $emailField) VALUES ('$userId', '$email')";

    // Execute the query
    mysqli_query($conn, $query);
}

// Function to insert phone number into the respective table
function insertPhoneNumber($userId, $phone, $userType)
{
    global $conn;

    $tableName = '';
    $idField = '';
    $phoneNumberField = '';

    switch ($userType) {
        case 'student':
            $tableName = 'Student_PhoneNumber';
            $idField = 'S_ID';
            $phoneNumberField = 'S_PhoneNumber';
            break;
        case 'teacher':
            $tableName = 'Teacher_PhoneNumber';
            $idField = 'T_ID';
            $phoneNumberField = 'T_PhoneNumber';
            break;
    }

    // Prepare the query
    $query = "INSERT INTO $tableName ($idField, $phoneNumberField) VALUES ('$userId', '$phone')";

    // Execute the query
    mysqli_query($conn, $query);
}

// Function to handle user registration
function registerUser($firstName, $lastName, $address, $email1, $email2, $phone1, $phone2, $password, $userType)
{
    

    // Check if phone numbers or email addresses are duplicates
    if (($phone1 !== '' && $phone1 === $phone2) || ($email1 !== '' && $email1 === $email2)) {
        // Display alert for duplicate phone numbers or email addresses
        echo "<script>alert('Phone numbers or email addresses cannot be the same. Please enter different values.');</script>";
        echo "<script>window.location.href = 'signin-signup.php';</script>";
        exit();
    }

    $userId = generateUserId($userType);

    // Insert user details into the respective table
    insertUserDetails($userId, $firstName, $lastName, $address, $password, $userType);

    // Insert email addresses if provided
    if (!empty($email1)) {
        insertEmailAddress($userId, $email1, $userType);
    }
    if (!empty($email2) && $email1 !== $email2) {
        insertEmailAddress($userId, $email2, $userType);
    }

    // Insert phone numbers if provided
    if (!empty($phone1)) {
        insertPhoneNumber($userId, $phone1, $userType);
    }
    if (!empty($phone2) && $phone1 !== $phone2) {
        insertPhoneNumber($userId, $phone2, $userType);
    }
}

if (isset($_POST['register'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $userType = $_POST['user_type'];

    

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        echo "<script>window.location.href = 'signin-signup.php';</script>";
        exit();
    }

    //check for the password length 

    if(strlen($password)<8){
        echo"<script>alert('Your password is too short.It should be at least 8 characters long.')</script>";
        echo "<script>window.location.href = 'signin-signup.php';</script>";
        exit();
    }

    // Check if password already exists
    $tableName = '';
    $passwordField = '';

    switch ($userType) {
        case 'student':
            $tableName = 'Student';
            $passwordField = 'S_Password';
            break;
        case 'teacher':
            $tableName = 'Teacher';
            $passwordField = 'T_Password';
            break;
        // Add more cases for other user types if needed
    }

    $query = "SELECT $passwordField FROM $tableName WHERE $passwordField = '$password'";
    $result = mysqli_query($conn, $query);
    $existingPassword = mysqli_fetch_assoc($result);

    if ($existingPassword) {
        echo "<script>alert('Password already exists. Please choose a different password.');</script>";
        echo "<script>window.location.href = 'signin-signup.php';</script>";
        exit();
    }

    // Register the user
    registerUser($firstName, $lastName, $address, $email1, $email2, $phone1, $phone2, $password, $userType);

    // Redirect to login page
    echo "<script>alert('Registration successful. Please login using your email and password.');</script>";
    echo "<script>window.location.href = 'signin-signup.php';</script>";
    exit();
}

?>