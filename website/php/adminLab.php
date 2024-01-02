
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Labs </title>
    <link rel="stylesheet" text="styles/css" href="../css/LabStyle.css">
  <link rel="stylesheet" text="styles/css" href="../css/styles.css">

</head>
<body>

<?php
	include 'admin-header.php';
	?>
<center>
<h1> Labs</h1>
</center>

<a class = "button" href="newResourceAdding.php" role="button"> New Labs </a>

<h2>Available Resources</h2>

<?php

include("config.php");

    $sql = 'SELECT * FROM Resources WHERE Resource_ID LIKE "L%"';
    
    $result = $conn-> query($sql);

    if(!$result){
        die("Invalid query: " . $con->error);
    }

    while($row =$result->fetch_assoc()){
        echo"
        <div class = labs name = reservations>
        
          <h2>$row[Resource_Type]</h2>
          <h3>Lab ID : $row[Resource_ID]</h3>
          
          <h4 class = button> $row[Resource_Availability]</h4>
     
          <br/>

                    
          </div>
    ";
}
             
?>

<h2> School Labs</h2>
<div class="labs1">
<img class="pic" src="../images/hall2.jpeg" alt="physics lab" >      
  <h2>Physics Lab</h2>
  <h3>Lab ID : L001</h3>
  <p class = "font" >
     laboratory that physics students learn to practice the activities of scientists - asking questions, performing procedures, collecting data, analyzing data, answering questions, and thinking of new questions to explore</br>

    

  </p>
</div>

<div class="labs1">
<img class="pic" src="../images/cLab.JFIF" alt="chemistry lab" >      
  <h2>Chemistry Lab</h2></br>
  <h3>Lab ID : L002 </h3>
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
<img class="pic" src="../images/physicslab.jpeg" alt="bio lab" >   
 
  <h2>Bio Lab</h2></br>
  <h3>Lab ID : L003</h3></br>
    <p class = "font"> 
    A biology lab is a place where experiments are conducted using biological samples such as cells,
    tissues or biological molecules to understand biological functions. 
    A biology lab report is a scientific document that describes the process and results of a laboratory experiment. 
    The purpose of a biology lab report is to communicate the findings of the experiment and to explain the significance of the results 
     
   

  </p>
</div>


<div class="labs1">
<img class="pic" src="../images/comLab.JFIF" alt="computer lab" >      
  <h2>Computer Lab</h2></br>
  <h3>Lab ID : L004</br></h3>
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
  <h3>Lab ID : L005</br></h3>
  <p class = "font">
  A mathematics laboratory is a place where we find a collection of games, puzzles, 
  teaching aids and other materials for carrying out activities. 
  These are meant to be used both by the student by their own and together with their teacher to explore the world of mathematics, 
  to discover, to learn and to develop an interest in mathematics.
</br>
  


  </p>
</div>
        
       
</body>
</html>