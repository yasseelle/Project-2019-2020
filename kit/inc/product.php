<?php
if(isset($_POST['insertproduits']))
{
    require 'dbh.php';
    $id=0;
    $prodtitre= $_POST['titre'];
    $prodqte= $_POST['qte'];
    $prodsize = $_POST['size'];
    $prodprice= $_POST['price'];
    $proddescription=$_POST['description'];
    $prodcategorie = $_POST['category'];
    $prodcolor=$_POST['color'];
    

    $img1pathdes = "dashproduct/uploads/".basename($_FILES['image1']['name']);
    $img1pathdes2 = "dashproduct/uploads/".basename($_FILES['image2']['name']);
    $img1pathdes3 = "dashproduct/uploads/".basename($_FILES['image3']['name']);


    $image1 = $_FILES['image1']['name'];
    $typeimage1 = $_FILES['image1']['type'];
    $sizeimage1 = $_FILES['image1']['size'];
    $image2 = $_FILES['image2']['name'];
    $typeimage2 = $_FILES['image2']['type'];
    $sizeimage2 = $_FILES['image2']['size'];
    $image3 = $_FILES['image3']['name'];
    $typeimage3 = $_FILES['image3']['type'];
    $sizeimage3 = $_FILES['image3']['size'];
    
    $fileext = explode('.',$image1);
    $fileext2 = explode('.',$image2);
    $fileext3 = explode('.',$image3);

    $fileactualExt = strtolower(end($fileext));
    $fileactualExt2 = strtolower(end($fileext2));
    $fileactualExt3 = strtolower(end($fileext3));

    $allowed = array('jpg','png','jpeg','JPG','PNG','JPEG');

    if(in_array($fileactualExt,$allowed) && in_array($fileactualExt2,$allowed) && in_array($fileactualExt3,$allowed))
    {
        if($sizeimage1<2000000 && $sizeimage2<2000000 && $sizeimage3<2000000)
        {
            if(move_uploaded_file($_FILES['image1']['tmp_name'],$img1pathdes) && move_uploaded_file($_FILES['image2']['tmp_name'],$img1pathdes2) && move_uploaded_file($_FILES['image3']['tmp_name'],$img1pathdes3))
            {   
                $sql = "INSERT INTO product VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt=$con->prepare($sql);
                $stmt->bind_param("isssisdssss",$id,$image1,$prodtitre,$proddescription,$prodqte,$prodsize,$prodprice,$prodcategorie,$prodcolor,$image2,$image3);
                $stmt->execute();
                $stmt->close();
                $con->close();
                header("location: ../inc/INSERT_produit.php?messg=bien ajouter");
                exit();
            }
            else
            {
                header("location: ../inc/INSERT_produit.php?messg=non");
                exit();
            }
        }
        else
        {
        header("location: ../inc/INSERT_produit.php?messg=sizeerr");
        exit();
        }


    }
    else
    {
        header("location: ../inc/INSERT_produit.php?messg=imgetype");
        exit();
    }
    

    
   


}
else
{
    header("location: ../inc/INSERT_produit.php?messg=you cant");
    exit();
}