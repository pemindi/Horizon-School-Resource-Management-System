<?php
include "config.php";
$User_ID="";
$username="";
$user_password="";
$user_email="";
$User_Type="";
$user_address="";
$user_phone="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location:profile.php');
        exit;
    }

    $User_ID = $_GET['id'];
    $sql = "SELECT * FROM user_profile WHERE User_ID='$User_ID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while (!$row) {
        header('Location: profile.php');
        exit;
    }
    $User_ID=$_GET['id'];
    $username=$row['username'];
    $user_password=$row['user_password'];
    $user_email=$row['user_email'];
    $User_Type=$row['User_Type'];
    $user_address=$row['user_address'];
    $user_phone=$row['user_phone'];
} else {
    $User_ID=$_GET['id'];
    $username=$_POST['username'];
    $user_password=$_POST['user_password'];
    $user_email=$_POST['user_email'];
    $User_Type=$_POST['User_Type'];
    $user_address=$_POST['user_address'];
    $user_phone=$_POST['user_phone'];

    $sql = "UPDATE user_profile SET User_ID='$User_ID', username='$username', user_password='$user_password', user_email='$user_email', User_Type='$User_Type', user_address='$user_address' ,user_phone='$user_phone' WHERE User_ID='$User_ID'";
    $result = $conn->query($sql);

    header('Location: profile.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" text="styles/css" href="../css/profileforms.css">
        <link rel="stylesheet" text="styles/css" href="../css/addnew.css">
        <title>
            Add new data
        </title>
    </head>
    <body>
      <div class ='contain'>
    <h2>Add New Data</h2> 

  <form method="POST"  action="edit_userprofilecard.php?id=<?php echo $User_ID ?>">
  <input type="text" name="User_ID"  value="<?php echo $User_ID ?>" class="form-control"><br><br>

  <div class="row">
    
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Name" name="username"><br><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="User Password" name="user_password"><br><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Email" name="user_email"><br><br>
  </div>
 </div>
 <div class="row">
  <div class="col1">
    <input type="text" class="form-control" placeholder="User Type" name="User_Type"><br><br>
  </div>
  <div class="col2">
    <input type="text" class="form-control" placeholder="User Address" name="user_address"><br><br>
  </div>
  <div class="row">
  <div class="col2">
    <input type="text" class="form-control" placeholder="Contact Number" name="user_phone"><br><br>
  </div>
 </div>
 <div class="row">
            <div class="col">
              
                <button type="submit" class="btn btn-success" name="submit" href="profile.php">Submit</button><br><br>
            </div>
            <div class="col">
              <button> <a type="submit" class="btn btn-danger" name="cancel" href="profile.php">Cancel</a></button><br>
            </div>
        </div>
     </form>
    </body> 
</html>