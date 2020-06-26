<?php
 session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; }
if (isset($_POST['pswd'])) { $pswd = $_POST['pswd']; }
	$resultat=0;
	include_once 'dbh.inc.php';
	$sql="select * from clients where Email='".$login."' and Mdp='".$pswd."' and Confirmed=1;";
	$nb=mysqli_query($conn,$sql);
	$idlog=mysqli_fetch_assoc($nb);
    $resultat=mysqli_num_rows($nb); 
	if($resultat>0) {header("location:  ../cars.php"); $_SESSION['idlog']=$idlog['IdC'];}
else header('location:  ../loginpage.php?$msg=your email adress or password incorrect !&$color=red');
?>