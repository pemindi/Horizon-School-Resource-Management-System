<?php

include_once 'config.php';

include 'admin-header.php'

?>




<div class="displayContainer"></br>
    
    <table class="table">
        <thead>
  <tr>
    <div class="horizontal">
    <th class="col">Feedback ID</th>
    <th class="col">Sender_ID</th>
    <th class="col">Feedback Type</th>
    <th class="col">Description</th>
    <th class="col">Feedback Status</th>
    <th scope="col" class="col">Operation</th>
    </div>
  </tr>
</thead>
<tbody class="tbody">
  

  <?php
$sql="SELECT * FROM feedback" ;

$result = $conn->query($sql);

if(!$result){
        die("Invalid query: ". $conn->error);
            }

      $feedbackCount = 1;  

    while($row=$result->fetch_assoc()){
      $feedbackID = 'FB' . str_pad($feedbackCount, 3, '0', STR_PAD_LEFT);

      $feedbackStatus = $row['Feedback_Status'];  

        echo"
        <tr>
        <td>$feedbackID</td>
        <td>$row[Sender_ID]</td>
        <td>$row[Feedback_Type]</td>
        <td>$row[Feedback_Description]</td>
        <td>
        <select name='feedback_status'  id='feedback_status' onchange='updateStatus($row[Sender_ID], this.value)'>
            <option value='pending'" . ($feedbackStatus === 'pending' ? 'selected' : '') . ">Pending</option>
            <option value='open' " . ($feedbackStatus === 'open' ? 'selected' : '') . ">Open</option>
            <option value='closed'" . ($feedbackStatus === 'closed' ? 'selected' : '') . ">Closed</option>
            <option value='responded' " . ($feedbackStatus === 'responded' ? 'selected' : '') . ">Responded</option>
          </select>

        <td>

        <button class='edit'><a href='updatefeedback.php?id=$row[Sender_ID]'>Edit</a></button>
        <button class='delete'><a href='deletefeedback.php?id=$row[Sender_ID]'>Delete</a></button>
        
        
      </td>
      </tr>";
      
      $feedbackCount++;


    }


  ?>


</tbody>
</table>


</div>

<style>
.table{
    padding: 200px;
    align-items: center;
    border-collapse: collapse;
    width: 100%;
}

.col{
    padding: 20px;
    align-items: center;

}

.button1{
    padding: 20px;
    align-items: center;
    margin: 2px;
    background-color: #c284e1;
    
}

th, td{
    border: 1px solid black;
    padding: 10px;
}
.a{
    color:black;
    font-weight: 800;
    font-size: 18px;
}

.col{
  background-color: #9932cc;
}
</style>

<script>
    function updateStatus(senderId, status) {
        
        $.ajax({
            url: 'updatestatus.php',
            method: 'POST',
            data: { senderId: senderId, status: status },
            success: function(response) {
                // Handle the response from the server, if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle the error, if any
                console.error(error);
            }
        });
    }
</script>



<?php
include_once '../php/footer.php';
?>
    
