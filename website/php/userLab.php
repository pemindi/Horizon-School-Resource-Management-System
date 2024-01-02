<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>
            Labs
        </title>

        <link rel="stylesheet" text="styles/css" href="../css/header-homepage-footer.css">
        <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
		<link rel="icon" href="../images/logo3.jpg" type="image/x-icon">
    
</head>
<body>  
    
<?php
	include 'user-header.php';
	?>

  

<center>
<h1> Labs Reservation</h1>
</center>

<h2>Available Resources</h2>

<a class = button href = Form2.php> Book now </a>
</br>

<?php

include("config.php");
global $conn;

    $sql = 'SELECT * FROM Resources WHERE Resource_ID LIKE "L%"';
    
    $result = mysqli_query($conn, $sql);

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

<h2> School Labs</h2>
<div class="labs1">
<img class="pic" src="../images/physicslab.jpeg" alt="physics lab" >      
  <h2>Physics Lab</h2>
  
  <p class = "font" >
     laboratory that physics students learn to practice the activities of scientists - asking questions, performing procedures, collecting data, analyzing data, answering questions, and thinking of new questions to explore</br>

    

  </p>
</div>

<div class="labs1">
<img class="pic" src="../images/cLab.JFIF" alt="chemistry lab" >      
  <h2>Chemistry Lab</h2></br>
  
  <p class = "font"></br>
     A chemistry lab is a place where students can perform experiments and learn about chemical reactions.
    The lab is equipped with various tools and equipment such as beakers, test tubes, pipettes, and Bunsen burners . 
The lab techniques used in chemistry labs are the set of procedures used on natural sciences such as chemistry, 
biology, physics to conduct an experiment.
 Some of these techniques involve the use of complex laboratory equipment from laboratory glassware to electrical devices,
 and others require more specific or expensive supplies .
<br/>


  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/lab1.jpeg" alt="bio lab" >   
 
  <h2>Bio Lab</h2></br>
  
    <p class = "font"> 
    A biology lab is a place where experiments are conducted using biological samples such as cells,
    tissues or biological molecules to understand biological functions. 
    A biology lab report is a scientific document that describes the process and results of a laboratory experiment. 
    The purpose of a biology lab report is to communicate the findings of the experiment and to explain the significance of the results 
     
   

  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/computerlab.jpeg" alt="computer lab" >      
  <h2>Computer Lab</h2></br>
  
  <p class = "font">
  A computer lab is a space where computer services are provided to a defined community such as 
  public libraries and academic institutions 1. While computer labs are generally multipurpose, 
  some labs may contain computers with hardware or software optimized for certain tasks or processes, 
  depending on the needs of the institution operating the lab. These specialized purposes may include video editing, 
  stock trading, 3-D computer-aided design, programming, and GIS 


  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/classroom.jpeg" alt="math lab" >      
  <h2>Math Lab</h2></br>

  <p class = "font">
  A mathematics laboratory is a place where we find a collection of games, puzzles, 
  teaching aids and other materials for carrying out activities. 
  These are meant to be used both by the student by their own and together with their teacher to explore the world of mathematics, 
  to discover, to learn and to develop an interest in mathematics.
</br>
  


  </p>
</div>

<?php
    include('footer.php');
?>
        
       
</body>
</html>