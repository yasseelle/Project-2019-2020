<?php
$hostserver="localhost";
$userserver="root";
$passwordserver="";
$dbname="kit";

$con = new mysqli($hostserver,$userserver,$passwordserver,$dbname);
if(!$con)
{
    die("problem de connexion".mysqli_connect_error());
}
