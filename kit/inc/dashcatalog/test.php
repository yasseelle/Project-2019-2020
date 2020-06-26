<?php
session_start();

include 'config.php';

    $update=false;
      $id="";
   $nmcat="";
    $image="";

if(isset($_POST['add']))
{
	$nmcat=$_POST['nmcat'];
    $image=$_FILES['img1']['name'];
    $img1pathdes = "uploads/".basename($image);
    
    $typeimage1 = $_FILES['img1']['type'];
    $sizeimage1 = $_FILES['img1']['size'];
    $fileext = explode('.',$image);
    $fileactualExt = strtolower(end($fileext));
    $allowed = array('jpg','png','jpeg','JPG','PNG','JPEG');

    if(in_array($fileactualExt,$allowed))
    {
        if($sizeimage1<2000000)
        {
          
                if(move_uploaded_file($_FILES['img1']['tmp_name'],$img1pathdes))
                {
                    $query="INSERT INTO categorie(NOM_CATEGORIE,IMAGE_CATEGORY) VALUES(?,?)";
                    $stmt=$con->prepare($query);
                    $stmt->bind_param("ss",$nmcat,$image);
                    $stmt->execute();
                    header("location: index.php?msg=bien ajouter");
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
        


  
}
   
	



if(isset($_GET['delete']))
{
   $id=$_GET['delete'];	


    $query="SELECT IMAGE_CATEGORY FROM categorie WHERE ID=?";
      $stmt2=$con->prepare($query);
      $stmt2->bind_param("i",$id);
      $stmt2->execute();
      $resultat2=$stmt2->get_result();
      $row=$resultat2->fetch_assoc();
      $imagepath=$row['IMAGE'];
      unlink($imagepath);
	   $query="DELETE FROM categorie WHERE ID=?";
	   $stmt=$con->prepare($query);
	   $stmt->bind_param("i",$id);
	   $stmt->execute();
		header("location: index.php");
		$_SESSION['response']="deleted successfuly from database";
		$_SESSION['res-type']="danger";
 }


 	 if(isset($_GET['edite']))
{
   $id=$_GET['edite'];


   $query="SELECT ID,NOM_CATEGORIE,IMAGE_CATEGORY FROM categorie WHERE ID=?";
   $stmt=$con->prepare($query);
   $stmt->bind_param("i",$id);
   $stmt->execute();
   $resultat=$stmt->get_result();
   $row=$resultat->fetch_assoc();

    $id=$row['ID'];
   $nmcat=$row['NOM_CATEGORIE'];
    $image=$row['IMAGE_CATEGORY'];

    $update=true;
    

 }



if(isset($_POST['update']))
{

    $imageedit=$_FILES['img1']['name'];
    $img1pathdes = "uploads/".basename($imageedit);
    
    $typeimage1 = $_FILES['img1']['type'];
    $sizeimage1 = $_FILES['img1']['size'];
    $fileext = explode('.',$imageedit);
    $fileactualExt = strtolower(end($fileext));
    $allowed = array('jpg','png','jpeg','JPG','PNG','JPEG');



	$id=$_POST['id'];
	$nmcat=$_POST['nmcat'];
    if(isset($_FILES['img1']['name'])&&($_FILES['img1']['name']!=""))
    {
        if(in_array($fileactualExt,$allowed))
        {

            if($sizeimage1<2000000)
            {
                if(move_uploaded_file($_FILES['img1']['tmp_name'],$img1pathdes))
                {
                    $query2="UPDATE categorie SET NOM_CATEGORIE=? ,IMAGE_CATEGORY=? WHERE ID=?";
                    $stmt=$con->prepare($query2);
                    $stmt->bind_param('ssi',$nmcat,$imageedit,$id);
                    $stmt->execute();
                    $stmt->close();
                    $con->close();
                    $_SESSION['response']="Updated successfuly ";
                    $_SESSION['res-type']="primary ";
                    header("location: index.php");
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
   

	
}
?>