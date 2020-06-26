<?php
 session_start();
 require "dbh.php";
if(isset($_POST['addcoment']))
{
    
    $comment = $_POST['comment'];
    $rate = $_POST['optradio'];
    $id=$_SESSION['idprod'];
    $iuser =$_SESSION['iduser'];
    $ids=0;
    $sql = "INSERT INTO comments VALUES(?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ddssdd",$ids,$iuser,$comment,date("Y-m-d h:i:sa"),$rate,$id);
    $stmt->execute();
    $stmt->close();
    $con->close();
    header("location: ../productdiscription.php?id=".$id."&msg=success");
    exit();
}
else
{
    header("location: ../login.php");

}