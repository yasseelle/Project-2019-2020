<?php
$hostserver="localhost";
$userserver="root";
$passwordserver="";
$dbname="xbase";

$user= $_POST['user'];
$pass= $_POST['pass'];
$con = new mysqli($hostserver,$userserver,$passwordserver,$dbname);
if($con)
{
    
    $q = "SELECT * FROM table1 Where NOM ='$user'and PASSWORDU ='$pass';";
    $result= $con->query($q); 
    if(mysqli_num_rows($result)>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo "login success ^_^ hi you are the owner of  :";
            echo $row['email'];
        }
    } 
    else
    {
        echo "login failed ...!";
    }

}
else
{
    echo "Not Connected...!";
}