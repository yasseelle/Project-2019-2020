<?php

if(isset($_POST['xt']))
{
    $con = new PDO('mysql:host=localhost;dbname=gbase','root','');
    $req=$con->query("SELECT * FROM persone");

    while($resultat = $req->fetch())
    {
        echo '<tr>'.'<td>'.$resultat['ID'].'</td>'.
                '<td>'.$resultat['Nom'].'</td>'
        .'<td>'.$resultat['Prenome'].'</td>'
        .'<td>'.$resultat['age'].'</td>'.'</tr>';
             

    }

}

?>