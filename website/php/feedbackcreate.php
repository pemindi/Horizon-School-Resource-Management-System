<?php
include_once '../php/header.php';
include 'config.php';

if(isset($_POST['submit'])){
    $Sender_ID = $_POST['id'];
    $Feedback_Type=$_POST['fbType'];
    $Feedback_Description=$_POST['Inmessage'];

    
    if (empty($Sender_ID) || empty($Feedback_Type) || empty($Feedback_Description)) {
        die("Please fill in all the required fields.");
    }
    $checkQuery = "SELECT * FROM users WHERE User_ID = '$Sender_ID'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult && $checkResult->num_rows == 0) {
        die("Invalid Sender_ID. Please enter a valid User ID.");
    }

    $checkQuery = "SELECT * FROM feedback WHERE Sender_ID = '$Sender_ID'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult && $checkResult->num_rows > 0) {
        die("Feedback already submitted for the given Sender_ID.");
    }


    $sql = "INSERT INTO feedback (Sender_ID, Feedback_Type, Feedback_Description)
            VALUES ('$Sender_ID', '$Feedback_Type', '$Feedback_Description')";

$result= $conn->query($sql); 

    if($result){

        //echo "Feedback submitted successfully";
        header('location: read.php');
    } else{
        die(mysqli_error($conn));
    }
}
include_once '../php/header.php';
?>




<section class="section">
        <h1><u>Feedback Form</u></h1>

        <div class="feedback"></div>
        <p>Thank you for using our service. We would like to know how we performed. Please rate your experience and valuable feedback.It will help us to improve our service.</p>
    
        <div class="feedbackForm">
        <form class="box1" action="feedbackcreate.php"  method="post">
<div class="fbinput">
        <label for="id"> User ID</label><br>
        <input class="id" name="id" type="text" placeholder="Your User ID" required="required">
</div>


<div class="fbinput">
        <label for="fbType"> Select the Feedback type  </label><br>
        <select name="fbType" class="fbType">
            <option value="general">General</option>
            <option value="academic">Academic</option>
            <option value="administrative">Administrative</option>
            <option value="facilities">Facilities</option>
            <option value="security">Security</option>
        </select>
</div>
        
        <br>
        <div class="fbinput">
        <label for="Inmessage">Your Message...</label><br>
        <textarea class="Inmessage" name="Inmessage" placeholder="Feedback Description" required="required"></textarea>
        </div>
<br>
        <div class="fbinput2">
            <button class="submit" action name="submit" type="submit">Submit</button>
            <button class = "cancel" action="cancel" type="cancel"><a href="feedbackcreate.php">Cancel</a>
        </div>
    
   

        <div id="fbcontainer"></div>

        </section>



        
        <style>
            body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.section {
    background-image: url("../images/11.jpg");
    height: 100%;
    padding: 20px200px;
    justify-content: center;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-size: cover;
}

.feedback {
    font-size: 18px;
    font-weight: 500;
}

.feedbackForm {
    width: 30%;
    padding: 40px;
    justify-content: left;
    display: flex;
    align-items: left;
    flex-direction: row;
    background-color: #92728fad;
}

.section h1 {
    font-size: 36px;
    font-weight: 500;
    color: #000000;
}

.fbinput {
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    position: relative;
}

.id,
.fbType {
    width: 150%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: 1;
    border-bottom: 2px solid #050404;
    outline: none;
    resize: horizontal;
}

.Inmessage {
    width: 150%;
    height: 300;
    position: relative;
    left: 0;
    padding: 0 5px;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: cursor;
    transition: 0.5s;
    color: #0c0c0cd0;
}

.submit {
    
    padding: 10px;
    background-color: violet;
}

.reset{
    padding: 10px;
    background-color: purple;

}

.status {
    position: absolute;
    top: 500px;
    right: 120px;
    font-size: 18px;
    margin: 1px;
}

.fbstatus {
    border: none;
    color: rgb(0, 0, 0);
    padding: 26px 36px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 8px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: #92728fad;
}
        </style>
        

        <?php
        include_once '../php/footer.php';