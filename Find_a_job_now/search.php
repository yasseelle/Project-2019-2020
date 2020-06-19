<?php
require 'dbh.php';
$title= $_POST['title'];
$category = $_POST['category'];
$city = $_POST['city'];

if(empty($title))
{
    $title='%';
}
if(empty($category))
{
    $category='%';
}
if(empty($city))
{
    $city='%';
}
$sql = "SELECT * FROM work WHERE titre LIKE '%$title%' and ville LIKE '%$city%' and categorie LIKE '%$category%'";
$stmt = $con->prepare($sql);
$stmt->execute();
$stmt->bind_result($ID,$nom,$prenome,$titre,$discription,$ville,$prix,$date_creation,$categorie,$phone,$active,$job_image,$report,$email);
$jobs= array();
while($stmt->fetch())
{
    $temp = array();
    $temp['ID']=$ID;
    $temp['nom']=$nom;    
    $temp['prenome']=$prenome;
    $temp['titre']=$titre;
    $temp['discription']=$discription;
    $temp['ville']=$ville;
    $temp['prix']=$prix;
    $temp['date_creation']=$date_creation;
    $temp['categorie']=$categorie;
    $temp['phone']=$phone;
    $temp['active']=$active;
    $temp['job_image']=$job_image;
    $temp['REPORT']=$report;
    $temp['EMAIL']=$email;
    array_push($jobs,$temp);
}
echo json_encode($jobs, JSON_UNESCAPED_UNICODE);