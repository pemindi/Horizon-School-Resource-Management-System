
<?php
include_once "config.php";

include 'user-header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/contact.css">

</head>
<body>
    

    <section class="content">



        <div class="contact">
            <h1><b>Contact Us</b></h1>
            <p>Thank you for your interest in our school resource booking system. If you have any questions, need technical support, or would like to provide feedback, please don't hesitate to get in touch with us.We're here to help!</p>
        </div>

        <div class="container">
            <div class="info">
                <div class="box">
                    <div class="text">
                        <div class="line"><img class="icon" src="../images/address.png" alt="address logo">

                            <h3>Address</h3>
                        </div>
                        <p> Horizon College,<br> Union Place,<br> Colombo.</p>
                    </div>
                </div>
                <br>

                <div class="box">
                    <div class="text">
                        <div class="line">
                            <img class="icon" src="../images/phone.png" alt="phone icon">

                            <h3>Phone</h3>
                        </div>
                        <p>(+94) ( 011) 2691089</p>
                    </div>
                </div>
                <br>

                <div class="box">

                    <div class="text">
                        <div class="line">
                            <img class="icon" src="../images/email.png" alt="email icon">
                            <h3>Email</h3>
                        </div>
                        <p>info@schoolbooking.com</p>
                    </div>
                </div>
            </div>

            <div class="form">
                <form action="../includes/contact.inc.php" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">

                        <input class="input" type="text" name="name" required="required">
                        <span class="span">Full Name</span>
                    </div>

                    <div class="inputBox">

                        <input class="input" type="text" name="email" required="required">
                        <span class="span">Email</span>
                    </div>



                    <div class="inputBox">

                        <textarea class="input" name="message" required="required"></textarea>
                        <span class="span">Type Your Message...</span>
                    </div>

                    <div class="inputBox">
                        <input class="submit" type="submit"  value="Send">
                    </div>
                    </form>
                    </div>

</div>
</section>


<?php


include 'footer.php';

?>



</body>
</html>
    

