<?php 
session_start();
$email=$_SESSION['Mail'];
$key=$_SESSION['forget'];
$key1=$_POST['codemail'];
$pswd1=$_POST['pswd1'];
$pswd2=$_POST['pswd2'];

	include_once 'dbh.inc.php';
	$sql="select * from clients where Email='".$_SESSION['Mail']."' and '".$key1."'='".$key."';";
	$id=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$nb=mysqli_num_rows(mysqli_query($conn,$sql));
	if($nb>0)
	{
		$sqlconf="update clients set Mdp='".$pswd1."' where IdC=".$id['IdC'].";";
		$dataconf=mysqli_query($conn,$sqlconf);
		header('location: ../loginpage.php?$msg=You can login with your new password&$color=green&idcltt='.$id['IdC']);
	}
	else
	{
		header('location: ../loginpage.php?$msg=Your code is incorrect Please Try Again&$color=red');
	}
			session_destroy();
 ?>