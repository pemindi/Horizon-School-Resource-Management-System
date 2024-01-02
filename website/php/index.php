
<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="style.css">
    <link rel="stylesheet" text="text/css" href="contact.css">
    <link rel="stylesheet" text="text/css" href="feedback.css">
    <title>
        Horizon College
    </title>
    


</head>

<body>

    <div class="schoolTitle">
        <img class="logo" src="images/logo1.jpg" alt="School logo">
        <h1> Horizon College</h1>
        <div class="user-profile">
            <img src="images/avatar1.jpg" alt="User Avatar" class="avatar">
            <div class="user-details">
                <span class="user-id">User ID: 12345</span>
                <span class="user-name">John Doe</span>
            </div>
        </div>
    </div>
    <hr id="test">
    <ul class="menu">
        <li class="menu"><a href="#">Home</a></li>
        <li class="menu"><a href="#">Time Table</a></li>
        <li class="menu"><a href="#">Profile</a></li>
        <li class="menu parent"><a href="#">Bookings</a>
            <ul class="dropdown">
                <li><a href="#">Halls</a></li>
                <li><a href="#">Labs</a></li>
            </ul>
        </li>
        <li class="menu"><a href="#">Calander</a></li>
        <li class="menu"><a href="#">F&Q</a></li>
        <li class="menu"><a href="#">Contact us</a></li>
        <li class="menu logout"><a href="#">Logout</a></li>
    </ul>
    <section class="content">



        <div class="contact">
            <h1><b>Contact Us</b></h1>
            <p>Thank you for your interest in our school resource booking system. If you have any questions, need technical support, or would like to provide feedback, please don't hesitate to get in touch with us.We're here to help!</p>
        </div>

        <div class="container">
            <div class="info">
                <div class="box">
                    <div class="text">
                        <div class="line"><img class="icon" src="images/address.png" alt="address logo">

                            <h3>Address</h3>
                        </div>
                        <p> Horizon College,<br> Union Place,<br> Colombo.</p>
                    </div>
                </div>

                <div class="box">
                    <div class="text">
                        <div class="line">
                            <img class="icon" src="images/phone.png" alt="phone icon">

                            <h3>Phone</h3>
                        </div>
                        <p>(+94) ( 011) 2691089</p>
                    </div>
                </div>

                <div class="box">

                    <div class="text">
                        <div class="line">
                            <img class="icon" src="images/email.png" alt="email icon">
                            <h3>Email</h3>
                        </div>
                        <p>info@schoolbooking.com</p>
                    </div>
                </div>
            </div>

            <div class="form">
                <form  >
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
                        <input class="submit" type="submit" name="" value="Send">
                    </div>
                    </form>
                    </div>

</div>
</section>

<style>

body {
    background-color: white;
    background-size: cover;
    padding: 10px;
}

.logo {
    width: 10.8%;
    height: 10.8%;
    padding: 3px;
}

.schoolTitle {
    display: inline-flex;
    align-items: center;
    font-family: 'Times New Roman', Times, serif;
    font-size: 30px;
    color: rgb(107, 39, 175);
}

.schoolTitle h1 {
    margin-right: 20px;
}

hr#test {
    border: 2px rgb(107, 39, 175);
}

ul.menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(107, 39, 175);
}

li.menu {
    float: left;
}

li.menu:last-child {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: gray;
}

#image1 {
    margin-top: 20px;
    margin-right: 20px;
    position: center-left;
    height: 900px;
    width: 1485px;
    overflow: hidden;
}

.raw1 {
    background-color: rgb(107, 39, 175);
    display: flex;
    align-items: center;
    padding: 10px;
    color: white;
}

#image2 {
    margin-top: 20px;
    margin-right: 20px;
    position: center-left;
    height: 500px;
    width: 740px;
    overflow: hidden;
}

.text1 {
    text-align: center;
    font-size: 25px;
    font-family: Georgia, serif;
    letter-spacing: 1px;
    word-spacing: 3px;
    flex-grow: 3;
}

.raw2 {
    background-color: rgb(107, 39, 175);
    display: flex;
    align-items: center;
    padding: 10px;
    color: white;
}

.text2 {
    text-align: center;
    font-size: 25px;
    font-family: Georgia, serif;
    letter-spacing: 1px;
    word-spacing: 3px;
    flex-grow: 3;
}

#image3 {
    margin-top: 20px;
    margin-left: 20px;
    height: 500px;
    width: 750px;
    overflow: hidden;
}

.user-profile {
    display: flex;
    align-items: center;
    margin-left: 300px;
}

.avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-details {
    font-size: 18px;
}

.user-id {
    font-weight: bold;
}

.user-name {
    color: #555;
}

li.menu.parent:hover .dropdown {
    display: block;
}

.dropdown {
    display: none;
    position: absolute;
    background-color: rgb(107, 39, 175);
    min-width: 160px;
    z-index: 1;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.dropdown li {
    display: block;
    padding: 10px;
}

.dropdown li:hover {
    background-color: gray;
}
</style>
</body>
</html>
    


