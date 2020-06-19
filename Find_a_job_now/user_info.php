<?php
require 'dbh.php';
$email=$_POST['email'];

$stmt = $con->prepare("SELECT * from user where EMAIL='$email'");
$stmt->execute();
$stmt->bind_result($ID,$NAME,$LASTNAME,$EMAIL,$USER_IMAGE,$USERNAME,$PAYS,$PHONE_NUMBER,$PASSWORD);
$jobs= array();
while($stmt->fetch())
{
    $temp = array();
    $temp['ID']=$ID;
    $temp['NAME']=$NAME;
    $temp['LASTNAME']=$LASTNAME;
    $temp['EMAIL']=$EMAIL;
    $temp['USER_IMAGE']=$USER_IMAGE;    
    $temp['USERNAME']=$USERNAME;
    $temp['PAYS']=$PAYS;
    $temp['PHONE_NUMBER']=$PHONE_NUMBER;
    $temp['PASSWORD']=$PASSWORD;
   
    array_push($jobs,$temp);
}
echo json_encode($jobs, JSON_UNESCAPED_UNICODE);