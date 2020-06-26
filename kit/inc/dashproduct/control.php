<?php
session_start();

include 'config.php';

    $update=false;
      $id="";
   $titre="";
	$description="";
	$qte="";
	$size="";
	$PRICE="";
	$categorie="";
	$color="";
	$image1="";
	$image2="";
	$image3="";

if(isset($_POST['add']))
{
	$titre=$_POST['titre'];
	$desc=$_POST['description'];
	$qte=$_POST['qte'];
	$size=$_POST['size'];
	$price=$_POST['price'];
	$categ=$_POST['categorie'];
	$color=$_POST['color'];
	$image1=$_FILES['img1']['name'];
	$image2=$_FILES['img2']['name'];
	$image3=$_FILES['img3']['name'];
	
	$upload1="uploads/".basename($image1);
	$upload2="uploads/".basename($image2);
	$upload3="uploads/".basename($image3);
	$typeimage1 = $_FILES['img1']['type'];
	$typeimage2 = $_FILES['img2']['type'];
	$typeimage3 = $_FILES['img3']['type'];
	$sizeimage1 = $_FILES['img1']['size'];
	$sizeimage2 = $_FILES['img2']['size'];
	$sizeimage3 = $_FILES['img3']['size'];
	$fileext = explode('.',$image1);
	$fileext2 = explode('.',$image2);
	$fileext3 = explode('.',$image3);
	$fileactualExt = strtolower(end($fileext));
	$fileactualExt2 = strtolower(end($fileext2));
	$fileactualExt3 = strtolower(end($fileext3));
	$allowed = array('jpg','png','jpeg','JPG','PNG','JPEG');
	if(in_array($fileactualExt,$allowed)&& in_array($fileactualExt2,$allowed) && in_array($fileactualExt3,$allowed))
    {
		if($sizeimage1<2000000 && $sizeimage2<2000000 && $sizeimage3<2000000)
        {
			if(move_uploaded_file($_FILES['img1']['tmp_name'],$upload1) && move_uploaded_file($_FILES['img2']['tmp_name'],$upload2) && move_uploaded_file($_FILES['img3']['tmp_name'],$upload3))
                {

					$query="INSERT INTO product(TITRE,DESCRIPTION,QTE,SIZE,PRICE,CATEGORY,COLOR,IMAGE,IMAGE2,IMAGE3) VALUES(?,?,?,?,?,?,?,?,?,?)";
					$stmt=$con->prepare($query);
					$stmt->bind_param("ssisdsssss",$titre,$desc,$qte,$size,$price,$categ,$color,$image1,$image2,$image3);
					$stmt->execute();
				
					header("location:index.php?messg=bien ajouté");
					$_SESSION['response']="inserted successfuly to database";
					$_SESSION['res-type']="success";

				}
				else
				{
					header("location: index.php?messg=non");
                    exit();
				}
		}
		else
		{
			header("location: inex.php?messg=sizeerr");
            exit();
		}
	}
	else
	{
		header("location: index.php?messg=imgetype");
		exit();
	}
  
	//$image3=$_POST['img3'];

	

}

if(isset($_GET['delete']))
{
   $id=$_GET['delete'];	


    $query="SELECT IMAGE FROM product WHERE ID=?";
      $stmt2=$con->prepare($query);
      $stmt2->bind_param("i",$id);
      $stmt2->execute();
      $resultat2=$stmt2->get_result();
      $row=$resultat2->fetch_assoc();
      $imagepath=$row['IMAGE'];
      unlink($imagepath);
	   $query="DELETE FROM product WHERE id=?";
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



   $query="SELECT ID,TITRE,DESCRIPTION,QTE,SIZE,PRICE,CATEGORY,COLOR,IMAGE,IMAGE2,IMAGE3 FROM product WHERE id=?";
   $stmt=$con->prepare($query);
   $stmt->bind_param("i",$id);
   $stmt->execute();
   $resultat=$stmt->get_result();
   $row=$resultat->fetch_assoc();

    $id=$row['ID'];
   $titre=$row['TITRE'];
	$description=$row['DESCRIPTION'];
	$qte=$row['QTE'];
	$size=$row['SIZE'];
	$PRICE=$row['PRICE'];
	$categorie=$row['CATEGORY'];
	$color=$row['COLOR'];
	$image1=$row['IMAGE'];
	$image2=$row['IMAGE2'];
	$image3=$row['IMAGE3'];
    $update=true;
    

 }



if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$titre=$_POST['titre'];
	$desc=$_POST['description'];
	$qte=$_POST['qte'];
	$size=$_POST['size'];
	$price=$_POST['price'];
	$categ=$_POST['categorie'];
	$color=$_POST['color'];
	
	$image1=$_FILES['img1']['name'];
	$image2=$_FILES['img2']['name'];
	$image3=$_FILES['img3']['name'];
	
	$upload1="uploads/".basename($image1);
	$upload2="uploads/".basename($image2);
	$upload3="uploads/".basename($image3);
	$typeimage1 = $_FILES['img1']['type'];
	$typeimage2 = $_FILES['img2']['type'];
	$typeimage3 = $_FILES['img3']['type'];
	$sizeimage1 = $_FILES['img1']['size'];
	$sizeimage2 = $_FILES['img2']['size'];
	$sizeimage3 = $_FILES['img3']['size'];
	$fileext = explode('.',$image1);
	$fileext2 = explode('.',$image2);
	$fileext3 = explode('.',$image3);
	$fileactualExt = strtolower(end($fileext));
	$fileactualExt2 = strtolower(end($fileext2));
	$fileactualExt3 = strtolower(end($fileext3));

	$allowed = array('jpg','png','jpeg','JPG','PNG','JPEG');



	if(in_array($fileactualExt,$allowed)&& in_array($fileactualExt2,$allowed) && in_array($fileactualExt3,$allowed))
    {
		if($sizeimage1<2000000 && $sizeimage2<2000000 && $sizeimage3<2000000)
        {
			if(move_uploaded_file($_FILES['img1']['tmp_name'],$upload1) && move_uploaded_file($_FILES['img2']['tmp_name'],$upload2) && move_uploaded_file($_FILES['img3']['tmp_name'],$upload3))
                {
				$query="UPDATE product SET TITRE=?,DESCRIPTION=?,QTE=?,SIZE=?,PRICE=?,CATEGORY=?,COLOR=?,IMAGE=?,IMAGE2=?,IMAGE3=? WHERE ID=?";
				$stmt=$con->prepare($query);
				$stmt->bind_param('ssisdsssssi',$titre,$desc,$qte,$size,$price,$categ,$color,$image1,$image2,$image3,$id);
				$stmt->execute();
				$stmt->close();
				$con->close();
				$_SESSION['response']="Updated successfuly ";
				$_SESSION['res-type']="primary ";
				header("location:index.php?message=bien modifer");
                }  
                else
                {
                    header("location: index.php?messg=non");
                    exit();
                }
        }
            else
            {
                header("location: inex.php?messg=sizeerr");
                exit();
            }

    }
        else
        {
            header("location: index.php?messg=imgetype");
            exit();
        }



    



	
}
?>