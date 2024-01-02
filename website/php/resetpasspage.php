<?php
session_start();

// Check if the user has a valid reset_email and reset_user_id in the session
if (!isset($_SESSION['reset_email']) || !isset($_SESSION['reset_user_id']) || !isset($_SESSION['user_type'])) {
    // Redirect the user back to the forgot password page if session data is missing
    header("Location: forgotpasspage.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/forgot-reset-pass.css">
    <title>Horizon College-Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="../images/favicon.jpeg" alt="school logo">
            <h2>HORIZON COLLEGE<br>Labs and Halls Booking System</h2> 
        </div>
        <div>
            <h1>Reset Password</h1>
            <p>Please enter your new password.</p>

            <form action="updatepass.php" method="post">
                <label for="new_password">New Password:</label><br>
                <input type="password" id="new_password" name="new_password" required><br>

                <label for="confirm_password">Confirm Password:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" required><br>

                <label for="">User Type</label><br>

                <select name="user_type" id="mySelect1">
                        <option value="" disabled selected>You are a</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

                <button type="submit" name="submit">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>