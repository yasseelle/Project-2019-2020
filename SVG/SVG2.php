<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <svg height="200" width="300"> 

       <?php

    $host ="Localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="gbase";

    $con = new mysqli($host,$dbusername,$dbpassword,$dbname);



    $sql="SELECT * FROM persone";
    $stmt = $con->query($sql);
    $y=80;
  
    while($row = $stmt->fetch_assoc())
    {

        echo '<text x="20" y='.$y.'fill="red" sytoke="line" stroke-width="5" >'.$row['ID'].'</text> '.'  '.'
        <text x="100" y='.$y.' fill="red" sytoke="line" stroke-width="5" >'.$row['Nom'].'</text>  '.'  '.'
          <text x="180" y='.$y.'. fill="red" sytoke="line" stroke-width="5" >'.$row['Prenome'].'</text> '.'  '.'
          <text x="260" y='.$y.' fill="red" sytoke="line" stroke-width="5" >'.$row['age'].'</text>'
            ;
            $y+=20;
            
    }
    
    



   
       ?> 

    </svg>
</body>
</html>