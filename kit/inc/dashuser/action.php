<?php 
session_start();
include 'config.php';



$update=false;
$id="";
$name="";
$lastname="";
	$email="";
	$datenais="";
	$role="";
	$sexe="";
	$username="";
if(isset($_POST['add']))
{
	$name=$_POST['name'];
	$lastename=$_POST['lastename'];
	$email=$_POST['email'];
	$datenais=$_POST['datnais'];
	$role=$_POST['role'];
	$sexe=$_POST['sexe'];
	$username=$_POST['username'];

	$query="INSERT INTO user(NAME,LASTNAME,EMAIL,DATENAISS,ROLE,SEXE,USERNAME)VALUES(?,?,?,?,?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->bind_param('sssssss',$name,$lastename,$email,$datenais,$role,$sexe,$username);
	$stmt->execute();
	 
	header("location:index.php");
	$_SESSION['response']="inserted successfuly to database";
	$_SESSION['res-type']="success ";
}
if(isset($_GET['delete']))
{
   $id=$_GET['delete'];	
   $query="DELETE FROM user WHERE id=?";
   $stmt=$con->prepare($query);
   $stmt->bind_param("i",$id);
   $stmt->execute();
	header("location:index.php");
	$_SESSION['response']="deleted successfuly from database";
	$_SESSION['res-type']="danger";
 }

 	 if(isset($_GET['edite']))
{
   $id=$_GET['edite'];	
   $query="SELECT ID,NAME,LASTNAME,EMAIL,DATENAISS,ROLE,SEXE,USERNAME FROM user WHERE id=?";
   $stmt=$con->prepare($query);
   $stmt->bind_param("i",$id);
   $stmt->execute();
   $resultat=$stmt->get_result();
   $row=$resultat->fetch_assoc();

    $id=$row['ID'];
   $name=$row['NAME'];
	$lastname=$row['LASTNAME'];
	$email=$row['EMAIL'];
	$datenais=$row['DATENAISS'];
	$role=$row['ROLE'];
	$sexe=$row['SEXE'];
	$username=$row['USERNAME'];

    $update=true;
    

 }


if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$lastename=$_POST['lastename'];
	$email=$_POST['email'];
	$datenais=$_POST['datnais'];
	$role=$_POST['role'];
	$sexe=$_POST['sexe'];
	$username=$_POST['username'];

	$query="UPDATE user SET NAME=?,LASTNAME=?,EMAIL=?,DATENAISS=?,ROLE=?,SEXE=?,USERNAME=? WHERE ID=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param('sssssssi',$name,$lastename,$email,$datenais,$role,$sexe,$username,$id);
	$stmt->execute();
	 $stmt->close();
     $con->close();
	$_SESSION['response']="Updated successfuly ";
	$_SESSION['res-type']="primary ";
	header("location:index.php");
}
?>