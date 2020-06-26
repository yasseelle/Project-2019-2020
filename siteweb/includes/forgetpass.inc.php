<?php

$email=$_POST['femail'];

$longueurkey=6;
$key="";
for($i=0;$i<$longueurkey;$i++)
{
	$key.=mt_rand(0,9);
}

session_start();
$_SESSION['forget']=$key;
$_SESSION['Mail']=$email;
	include_once 'dbh.inc.php';
	$sql="select * from clients where Email='".$email."';";
	$nb=mysqli_num_rows(mysqli_query($conn,$sql)) ;
if($nb>0)
{
		$header='Content-Type:text/html; charset="uft-5"';
	$message='
	<html>
		<body>
		<p>Voici le code de recuperation :'.$key.'</p>
		</body>
	</html>';
	mail($email,'Recuperation mot de passe',$message,$header);
	header('location:  ../forgetpass.php');
}

else header('location:  ../loginpage.php?$msg=This Email doesn\'t exist &$color=red');
	?>