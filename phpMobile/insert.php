<?php

$username = $_POST['username'];
$lastnam = $_POST['lastname'];
$age = $_POST['age'];
$id = 0;



$host ="Localhost";
$dbusername="root";
$dbpassword="";
$dbname="gbase";

$con = new mysqli($host,$dbusername,$dbpassword,$dbname);
session_start();

//$SELECT = "SELECT Nom FROM persone where nom = ? Limit:1";
$INSERT ="INSERT INTO student VALUES (?,?,?,?)";
$stmt =$con->prepare($INSERT);
$stmt->bind_param("issi",$id,$username,$lastnam,$age);
$stmt->execute();
echo '<h1> bien ajouter . </h1>';
$stmt->close();
$con->close();





?>
