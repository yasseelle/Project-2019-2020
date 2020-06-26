<?php
    include('connection.php');
    if(isset($_POST['xa'])){
       //echo 'reusite';
       echo'<select name="noms" data-mini="true">';
       $sql='SELECT * FROM  persone';
       $req=$bd->query($sql);
       while($resultat=$req->fetch()){
           echo'<option>'.$resultat['Nom'].'</option>';
       }
       echo'</select>';
    }
    if(isset($_POST['noms'])){
  
        $nom=$_POST['noms'];
        $age=10;
        $req=$bd->prepare('SELECT * FROM  persone WHERE Nom=? and age>=?');
        $req->execute(array($nom,$age));
        while($resultat=$req->fetch()){
            echo $resultat['Nom'].'-'.$resultat['Prenome'].'-'.$resultat['age'].'<br/>';
        }
    } 
?>