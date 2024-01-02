<?php
// Start the session
session_start();

// Retrieve user information from session variables
$id = $_SESSION['id'];
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" text="styles/css" href="../css/header-homepage-footer.css">
		<link rel="icon" href="../images/logo3.jpg" type="image/x-icon">
        <title>
            Horizon College
        </title>
    </head>
    <body>
    <div class="schoolTitle">
     <img class="logo" src="../images/logo1.jpg" alt="School logo" >
     <h1> Horizon College</h1>
	 <div class="user-profile">
       <img src="../images/avatar1.jpg" alt="User Avatar" class="avatar">
       <div class="user-details">
       <span class="user-id"><?php echo "User ID:{$id} <br>";?></span>
       <span class="user-name"><?php echo $firstName . ' ' . $lastName; ?></span>
       </div>
    </div>
    </div>
    <hr id="test">	
	<ul class="menu">
      <li class="menu"><a href="admin-homepage.php">Home</a></li>
      <li class="menu"><a href="userprofilecard.php">User Profile</a></li>
      <li class="menu parent"><a href="#">Resources</a>
	    <ul class="dropdown">
          <li><a href="adminHall.php">Halls</a></li>
          <li><a href="adminLab.php">Labs</a></li>
        </ul>
      </li>
	  <li class="menu"><a href="display-bookings-admin.php">Bookings</a> </li>
      <li class="menu"><a href="calendarAdmin.php">Calander</a></li>
      <li class="menu"><a href="read.php">Feedback</a></li>
	  <li class="menu logout"><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
