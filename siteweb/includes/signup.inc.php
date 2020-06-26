<?php
$first = $_POST['first'];
$last = $_POST['last'];
$email=$_POST['email'];
$driverl=$_POST['driverl'];
$pswd=$_POST['pswd'];

$longueurkey=16;
$key="";
for($i=0;$i<$longueurkey;$i++)
{
	$key.=mt_rand(0,9);
}


	include_once 'dbh.inc.php';
	$sql="insert into clients(Nom,Prenom,Email,PermisC,Mdp,Confirmkey) values('$last','$first','$email','$driverl','$pswd','$key');";
	mysqli_query($conn,$sql);
	$header='Content-Type:text/html; charset="uft-5"';
	$message='
	<html>
		<body>
		<p>Bonjour Veuillez cliquer sur le lien suivant pour pouvoir acceder a notre site autant que utilisateur</p> <a href="http://localhost:8081/sitewebLoginFixed/includes/loginconfirmation.php?e='.urlencode($email).'&k='.$key.'">Lien de confirmation</a>
		</body>
	</html>';
	mail($email,'Confirmation inscription',$message,$header);
	header('location:  ../loginpage.php?$msg=After Registration, Verify your email account &$color=orange');
	?>