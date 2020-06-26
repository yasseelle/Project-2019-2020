<?php
    if(isset($_POST['aa'])){
        $bd=new PDO('mysql:host=localhost;dbname=gbase','root','');
        $req=$bd->query('SELECT * FROM  persone');
while($resultat=$req->fetch())
{
    echo '<li>'.$resultat['Nom'].'-'.$resultat['Prenome'].'</li>';
}
        
    }
?>