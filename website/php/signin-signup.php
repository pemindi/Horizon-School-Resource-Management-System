<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/favicon.jpeg">
    <link rel="stylesheet" href="../css/signin-signup.css">
    <title>Horizon College-Sign In & Sign Up</title>

</head>

<body>
   
       
    <div class="container">

            <div class="signin-signup">
           

            <form action="login.php" class="sign-in-form" onsubmit="return validateForm1()" method="post">

                <h2 class="title">Sign In</h2>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" placeholder="Email" required >
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required >
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                <i class="fas fa-user"></i>
                    <select name="user_type" id="mySelect1">
                        <option value="" disabled selected>You are a</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>
                    <span class="required-label">*</span>
                </div>

            

                <input type="submit" value="Login" class="btn" name="login"><br>

                <a href="forgotpasspage.php">Did you forget your password?</a>

                <p class="details">Do you need to know more about our college?</p>

                <div class="social-media">

                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>

               
                

            </form>

            <form action="register.php" class="sign-up-form" onsubmit="return validateForm2()" method="post">
                <h2 class="title">Sign Up</h2>
                
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" name="address" placeholder="Address" required>
                    <span class="required-label">*</span>
                </div>

          

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email1" placeholder="Email 1" required>
                    <span class="required-label">*</span>
                </div>
        
                   
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email2" placeholder="Email 2">
                </div>

                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="phone1" placeholder="Phone Number 1" required>
                    <span class="required-label">*</span>
        
                </div>  
                
                
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="phone2" placeholder="Phone Number 2" >
                </div>

                

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Create a password" required>
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <span class="required-label">*</span>
                </div>

                <div class="input-field">
                <i class="fas fa-user"></i>
                    <select name="user_type" id="mySelect2">
                        <option value="" disabled selected>You are a</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <span class="required-label">*</span>
                </div>
                <input type="submit" value="Sign Up" class="btn" name="register">
                
                

                <p class="details">Do you need to know more about our college?</p>
                <div class="social-media">

                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div> 

               

            </form>
        </div>
        <div class="panels-container">
        
            <div class="panel left-panel">
           
                <div class="content">
                    <img src="../images/favicon.jpeg" alt="school logo">
                    <h1>HORIZON COLLEGE</h1>
                    <p>Already have an account?</p>
                    <button class="btn" id="sign-in-btn">Sign In</button>
                    
                </div>
                <img src="../images/signup-page.png" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                <img src="../images/favicon.jpeg" alt="school logo">
                <h1>HORIZON COLLEGE<br>LABS & HALLS BOOKING SYSTEM</h1>  
                <p>Don't have an account?</p>
                    <button class="btn" id="sign-up-btn">Sign Up</button>
                </div>
                <img src="../images/signin-page.png" class="image">
            </div>
        </div>
    </div>
    <script src="../js/signin-signup.js"></script>
    
    <script src="../js/signin-signup2.js"></script>
</body>
</html>