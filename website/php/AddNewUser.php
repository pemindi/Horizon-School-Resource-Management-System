<?php
   include "config.php";
   if(isset($_POST['submit'])){
    $User_ID=$_POST['User_ID'];
    $username=$_POST['username'];
    $user_password=$_POST['user_password'];
    $user_email=$_POST['user_email'];
    $User_Type=$_POST['User_Type'];
    $user_address=$_POST['user_address'];
    $user_phone=$_POST['user_phone'];
    $e="INSERT INTO user_profile (User_ID,username,user_password,user_email,User_Type,user_address,user_phone)
    VALUES ('$User_ID', '$username', '$user_password', '$user_email',' $User_Type', '$user_address', '$user_phone')";
    $query=mysqli_query($conn,$e);
   }


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" text="styles/css" href="../css/addnew.css">
        <title>
            Add new user
        </title>
    </head>
    <body>
    <h2>Add New User</h2> 

    <form method="POST" action=""> 
    
    <div class="row">
    <div class="col1">
    <input type="text" class="form-control" placeholder="User ID" name="User_ID"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Name" name="username"><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="User Password" name="user_password"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Email" name="user_email"><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="User Type" name="User_Type"><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Address" name="user_address"><br>
  </div>
  <div class="row">
  <div class="col2">
    <input type="text" class="form-control" placeholder="Contact Number" name="user_phone"><br>
  </div>
 </div>
 <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success" name="submit" href="userprofilecard.php">Submit</button><br>
            </div>
            <div class="col">
              <button> <a type="submit" class="btn btn-danger" name="cancel" href="userprofilecard.php">Cancel</a></button><br>
            </div>
        </div>
     </form>
    </body> 
</html>