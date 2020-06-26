<?php 

$email=$_GET['e'];
$key=$_GET['k'];

	include_once 'dbh.inc.php';
	$sql="select * from clients where Email='".$email."' and Confirmkey='".$key."';";
	$id=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$nb=mysqli_num_rows(mysqli_query($conn,$sql));
	if($nb>0)
	{
		$sqlconf="update clients set Confirmed=1 where IdC=".$id['IdC'].";";
		$dataconf=mysqli_query($conn,$sqlconf);
		header('location: ../loginpage.php?$msg=Your registration succeed&$color=green&idcltt='.$id['IdC']);
	}
	else
	{
		header('location: ../loginpage.php?$msg=Your registration Failed Try Again&$color=red');
	}
 ?>