<?php
require 'dbh.php';

$id=0;

$job_user_name= $_POST['name'];
$job_user_last_name= $_POST['lastname'];
$job_titre= $_POST['titre'];
$job_description=$_POST['description'];
$job_city=$_POST['city'];
$job_price= $_POST['price'];
$date_cretation= date("Y-m-d");
$job_categorie = $_POST['category'];
$phone_number=$_POST['phone'];
$email=$_POST['email'];
$active = "waiting For you";
$raport=0;
$job_image=$_POST['photo'];

if($con)
{
    $sql = "INSERT INTO work VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("isssssdsssssds",$id,$job_user_name,$job_user_last_name,$job_titre,$job_description,$job_city,$job_price,$date_cretation,$job_categorie,$phone_number,$active,$job_image,$raport,$email);
    if($stmt->execute())
    {
        echo "your job is Posted succesfully";
    }
    else
    {
        echo "connxion error try again later";
    }
    $stmt->close();
    $con->close();
}
else
{
    echo"connexion error";
}                
