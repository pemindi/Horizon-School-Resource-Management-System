<?php
include_once "config.php";

$Sender_ID = "";
$Feedback_Type = "";
$Feedback_Description = "";


if (isset($_GET['id'])) {
$Sender_ID = $_GET['id'];

        $sql = "SELECT * FROM feedback WHERE Sender_ID = '$Sender_ID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $Sender_ID = $row['Sender_ID'];
    $Feedback_Type = $row['Feedback_Type'];
    $Feedback_Description = $row['Feedback_Description'];
}
?>
        
<section class="editSection">
    <h3>Edit your feedback here</h3>
<div class="updateBox">
        <form method = "post" action="../includes/updatefeedback.php" >
        <div class = "udcontainer">
            <div class = "update-group">
                <label class = "update_label">Sender_ID</label><br>
                
                    <input type = "text" class = "update_control" name="Sender_ID" placeholder="Sender_ID" value="<?php echo $Sender_ID; ?>">
                
            </div>

            <div class = "update-group">
                <label class = "update_label">Feedback_Type</label><br>
                
                    <input type = "text" class = "update_control"  name="Feedback_Type" placeholder="Feedback_Type" value="<?php echo $Feedback_Type; ?>">
                
            </div>

            <div class = "update-group">
                <label class = "update_label">Feedback_Description</label><br>
                
                    <input type = "text" class = "update_control" name="Feedback_Description" placeholder="Feedback_Description" value="<?php echo $Feedback_Description; ?>">
                
</div>

            <div class = "update-groupnew">
                
                    <button type = "submit" class = "updatebtn2" > Submit </button>
                
            
                     <a class = "updatebtn2" href="../includes/read.php" role ="button">Cancel</a>
                     <button type = "back" class = "updatebtn2" ><a href="../includes/read.php"> Back </a></button>
            </div>

        </form></div></section>
    </div>

<style>
     body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.editSection {
    background-color: #d6adeb;
    height: 100%;
    width: 100%;
    padding: 0;
    justify-content: center;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-size: cover;
    position: absolute;
    font-size: 18px;
}

.updateBox{
    width: 30%;
    padding: 40px;
    justify-content: left;
    display: flex;
    align-items: left;
    flex-direction: row;
    background-color: #9932cd;


}
.update-group{
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    position: relative;
}
.update_label{
    width: 150%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: 1;
    border-bottom: 2px solid #050404;
    outline: none;
    resize: horizontal;
    font-size: 18px;
}

.updatebtn2{
    background-color: violet;
    padding: 10px;

}
.update_control{
    width: 150%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: 1;
    border-bottom: 2px solid #050404;
    outline: none;
    resize: horizontal;

}
    

</style>

</body>
</html>