<?php
		if(isset($_POST)){
			$nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
			$age=$_POST['age'];
			
			$con = new PDO('mysql:host=localhost;dbname=gbase','root','');
			$req=$con->prepare("INSERT INTO persone VALUES (?,?,?,?)");
			$req->execute(array(0,$nom,$prenom,$age));
			
		}

	?>

