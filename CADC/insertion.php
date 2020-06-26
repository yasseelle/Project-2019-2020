<?php
if(isset($_POST))
{
    $nom=$_POST['nom'];

    $prenome=$_POST['prenome'];
    $age=$_POST['age'];
    $fichier =fopen("Personne.csv","a");
    fwrite($fichier,$nom.":".$prenome.":".$age);
}
?>