<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>
            Admin hall
        </title>

        <link rel="stylesheet" text="styles/css" href="../css/styles.css">
        <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
		<link rel="icon" href="../images/logo3.jpg" type="image/x-icon">
    
</head>
<body>  
    
<?php
	include 'admin-header.php';
	?>

  

<center>
<h1> Halls Reservation</h1>
</center>

<a class = "button" href="newResourceAdding.php" role="button"> New Halls </a>

<h2>Available Resources</h2>


</br>

<?php

include("config.php");

    $sql = 'SELECT * FROM Resources WHERE Resource_ID LIKE "H%"';
    
    $result = $conn -> query($sql);

    if(!$result){
        die("Invalid query: " . $con->error);
    }

    while($row =$result->fetch_assoc()){
        echo"
        <div class = labs name = reservations>
        
          <h2>$row[Resource_Type]</h2>
          <h3>Lab ID : $row[Resource_ID]</h3>
          <h4 class = button> $row[Resource_Availability]</h4>
          
          </div>
    ";
}
             
?>

<h2>School Halls </h2>
<div class="labs1">
<img class="pic" src="../images/multiLab.PNG" alt="hall" >      
  <h2>Multi purposed hall</h2>
  
  <p class = "font" >
  A multipurpose hall is a space that is well-equipped to accommodate a wide variety of events or activities. 
   It is usually located in an easily accessible location with ample parking space and has the capacity to provide numerous 
   top-notch services within your budget</br>

    

  </p>
</div>

<div class="labs1">
<img class="pic" src="../images/lecHall.jpg" alt="hall" >      
  <h2>Lecture hall</h2></br>
  
  <p class = "font"></br>
  A lecture hall is a large room used for instruction, typically at a college or university.
   Unlike a traditional classroom with a capacity from one to four dozen, the capacity of lecture halls is typically measured 
   in the hundreds. Lecture halls are designed mainly as education content and information delivery to groups, 
   but may also be used for interactive learning and discussion. 
   The spaces are also multi-purpose in nature enabling flexible layouts that enable active learning for medium-sized groups
<br/>


  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/assemHall.JFIF" alt="hall" >   
 
  <h2>Assembly Hall</h2></br>
  
    <p class = "font"> 
    An assembly hall is a hall to hold public meetings or meetings of an organization such as a school.
    Assembly Hall means a building or part of a building in which facilities are provided for such purposes as meetings for civic, educational, political, religious, or social activities, and may include a banquet hall or private club. 
     
   

  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/audiHall.JFIF" alt="hall" >      
  <h2>Auditorium</h2></br>
  
  <p class = "font">
  auditorium, the part of a public building where an audience sits, as distinct from the stage,
   the area on which the performance or other object of the audience’s attention is presented.
  </p>
</div>
        
       
</body>
</html>