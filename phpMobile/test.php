<?php
$nom =$_POST['nom'];
$lastname =$_POST['lastanme'];
$age =$_POST['age'];

    $res ="reussit";
  $con = new PDO('mysql:host=localhost;dbname=gbase','root','');
  $req=$con->prepare("INSERT INTO persone VALUES (?,?,?,?)");
  $req->execute(array(0,$nom,$lastname,$age));
  echo "bien ajouter";
    



?>