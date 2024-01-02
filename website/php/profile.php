<?php
    include('user-header.php');
?>
<link rel="stylesheet" text="styles/css" href="../css/profileform.css">
<link rel="stylesheet" text="styles/css" href="../css/table.css">



<table class="table">
  <thead>
    <tr>
      <th>User ID</th>
      <th>User Name</th>
      <th>User Password </th>
      <th>User Email</th>
      <th>User Type</th>
      <th>User Address</th>
      <th>Contact Number</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody> 
    <?php
     include "config.php";

     

     $loggedUserID = $_SESSION['id'];

    $sql = "SELECT * FROM user_profile WHERE User_ID = '$loggedUserID'";
    $result = mysqli_query($conn, $sql);
     
     $result = $conn ->query($sql);
      if(!$result){
        die("Invalid query!");
      }
      while ($row=$result->fetch_assoc()){
        echo"
    <tr>
      <th>$row[User_ID]</th>
      <td>$row[username]</td>
      <td>$row[user_password]</td>
      <td>$row[user_email]</td>
      <td>$row[User_Type]</td>
      <td>$row[user_address]</td>
      <td>$row[user_phone]</td>
      <td>
              
              <a class='btn-success' href='edit_userprofilecard.php?id=$row[User_ID]'>Edit</a>
      </td>  
    </tr>
    ";
    }
    ?>
  </tbody>
</table>