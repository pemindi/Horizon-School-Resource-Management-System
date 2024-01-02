<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/forgot-reset-pass.css">
    <title>Horizon College-Forgot Password</title>

    <script>
    function validateForm1() {
      var selectElement = document.getElementById("mySelect1");
      var selectedValue = selectElement.value;
      
      if (selectedValue === "") {
        alert("Please select an option");
        return false; // Prevent form submission
      }
      
      return true; // Allow form submission
    }
  </script>
</head>
<body>
   
    <div class="container">
    <div class="logo">
            <img src="../images/favicon.jpeg" alt="school logo">
            <h2>HORIZON COLLEGE<br>Labs and Halls Booking System</h2> 
    </div>

    <div>
    
        <h1>Forgot Password?</h1>
        <p>Please enter your ID and Email Address to ensure that you are a valid user</p>

        <form action="forgotpass.php" method="post" onsubmit="return validateForm1()">

            <label for="user_id">ID:</label><br>
            <input type="text" id="user_id" name="user_id" required><br>
            

            <label for="email">Email:</label><br>
            <input  id="email" name="email" required><br>
            
            <label for="">User Type</label><br>
           
                    <select name="user_type" id="mySelect1">
                        <option value="" disabled selected>You are a</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    </div>
</body>
</html>
