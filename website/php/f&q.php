<?php
include_once'user-header.php'
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="../css/style.css">
    <link rel="stylesheet" text="text/css" href="../css/contact.css">
    <link rel="stylesheet" text="text/css" href="../css/feedback.css">
    <link rel="stylesheet" text="text/css" href="../css/f&q.css">
    <title>
        Horizon College
    </title>
    


</head>

<body>



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
    



    
    
<section class="fandq">
    <!-- faq 1 -->
    <div class="fcontainer">
        <div class="faq-heading">
            <span class="link-text">What resources can I book through the school resource booking system ?</span>
        </div>
        <div class="faq-description"></br>You can reserve a variety of resources within the school using the system
            for
            booking school resources. This relates to any resources that can be booked such as
            labs, classrooms, sports facilities, auditoriums, and other resources.
        </div>
    </div>

    <!-- faq 2 -->
    <div class="fcontainer">
        <div class="faq-heading">
            <span class="link-text">How can I check the availability of a specific resource ?</span>
        </div>
        <div class="faq-description"></br>Go to the resource browsing or search part of the school resource booking
            s
            ystem to check if a specific resource is still available.Enter the necessary details,
            such as the resource's name, type, or location, and the system will inform
            you whether it is still available given the parameters you have specified.
        </div>
    </div>

    <!-- faq 3 -->
    <div class="fcontainer">
        <div class="faq-heading">
            <span class="link-text">Can I book multiple resources at the same time ?</span>
        </div>
        <div class="faq-description"></br>Yes, you can book many resources at once using the school's
            resource booking system. You can select the desired resources while making a
            booking by either exploring the selections or conducting a search for particular
            resources. After selecting the resources you require, you can continue with the
            booking procedure and make the reservations at the same time.
        </div>
    </div>

    <!-- faq 4 -->
    <div class="fcontainer">
        <div class="faq-heading">
            <span class="link-text">Can I modify or cancel a resource booking ?</span>
        </div>
        <div class="faq-description"></br>Yes, assuming the system permits it, you can change or cancel a resource
            booking.
            Locate the booking you
            want to change or cancel by logging into your account, and accessing your
            bookings or cancellations section.
        </div>
    </div>

    <!-- faq 5 -->
    <div class="fcontainer">
        <div class="faq-heading">
            <span class="link-text">What do I do if I encounter technical issues with the school resource
                booking system ?</span>
        </div>
        <div class="faq-description"></br>You may contact the school's IT department or the system administrator for
            support
            if you run into technical issues with the resource booking system. They will be able
            to assist you with troubleshooting and resolving any technical issues you might
            encounter while accessing the system, or you can contact us using the information
            provided.
        </div>
    </div>

    </br></br></br>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var faqHeadings = document.querySelectorAll('.faq-heading');
            faqHeadings.forEach(function (heading) {
                heading.addEventListener('click', function () {
                    var description = this.nextElementSibling;
                    description.classList.toggle('active');
                });
            });
        });
    </script>
</section>
<?php

include 'footer.php';
?>
</body>

</html>