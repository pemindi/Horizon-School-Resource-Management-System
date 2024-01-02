<?php


include_once "../includes/config.php";
?>

<?php

function generateFeedbackId($conn)
{
    
    $prefix = 'FB';
    $tableName = 'feedback';
    $idField = 'Feedback_ID';

    // Get the maximum ID from the booking table
    $query = "SELECT MAX($idField) AS maxId FROM $tableName";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['maxId'];

    // Extract the numeric portion of the maximum ID
    $maxIdNumeric = (int) substr($maxId, strlen($prefix));

    // Increment the numeric ID and pad with zeros
    $newIdNumeric = $maxIdNumeric + 1;
    $paddedIdNumeric = str_pad($newIdNumeric, 3, '0', STR_PAD_LEFT);

    // Generate the new ID by concatenating the prefix and padded numeric ID
    $newId = $prefix . $paddedIdNumeric;

    return $newId;
}



$Sender_ID="";
$Feedback_Type="";
$Feedback_Description="";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    
    $Sender_ID = $_POST["Sender_ID"];
$Feedback_Type = $_POST["Feedback_Type"];
$Feedback_Description = $_POST["Feedback_Description"];
   

}

do {
    if(empty($Sender_ID) || empty($Feedback_Type) || empty($Feedback_Description)){
        $errorMessage = "ID is required";
        break;
    }

    $Feedback_ID = generateFeedbackId($conn);

    $sql = "INSERT INTO feedback (Feedback_ID, Sender_ID, Feedback_Type, Feedback_Description, Feedback_Status )
    VALUES (?,?,?,?,'pending')";
   
    

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $Feedback_ID, $Sender_ID, $Feedback_Type, $Feedback_Description);
    $stmt->execute();
    if ($stmt->errno) {
        $errorMessage = "Failed to insert feedback: " . $stmt->error;
        break;
    }
    $stmt->close();
    



    $successMessage = "Feedback is successful";

    header("location: /Horizon/feedback.php");
    exit;
    


} while (false);

?>

      <section class="section">
    
        <h1><u>Feedback Form</u></h1>

        <div class="feedback"></div>
        <p>Thank you for using our service. We would like to know how we performed. Please rate your experience and valuable feedback.It will help us to improve our service.</p>
    
        <div class="feedbackForm">
        <form class="box1" method="post">

        <div class = "form-group">
                <label class = "form_label">Sender_ID</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Sender_ID" value="<?php echo $Sender_ID; ?>">
                </div>
            </div>

            <div class = "form-group">
            <label for="dropdown">Select Option:</label>
  <select name="Feedback_Type" id="Feedback_Type">
    <?php
    // PHP variable containing dropdown options
    $Feedback_Type = array("General", "Academic", "Administrative", "Facilities", "Security");

    // Loop through the options and generate the dropdown options dynamically
    foreach ($Feedback_Type as $Feedback_Type) {
      echo "<option value='" . $Feedback_Type . "'>" . $Feedback_Type . "</option>";
    }
    ?>
  </select>

            

        
            <div class = "form-group">
                <label class = "form_label">Feedback_Description</label>
                <div class = "col_6">
                    <input type = "text" class = "form_control" name="Feedback_Description" value="<?php echo $Feedback_Description; ?>">
                </div>
            </div>


            <?php
            if(!empty($successMessage)){
                echo"
            <div role = 'alert'>
            <strong>$successMessage</strong>
            <button type = 'button' aria-label='Close'></button>
            </div>
            ";
            }

            ?>

            <div class = "row">
                <div>
                    <button type = "submit" class = "btn2" action=""> Submit </button>
                </div>
                <div>
                     <a class = "btn3" href="feedback.php" role ="button">Cancel</a>
                </div>
            </div>

            </div>
            
</form>
       
   
      
        

</body>
</html>