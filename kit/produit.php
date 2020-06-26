<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!--- bootstap--> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <!-- cards product css -->  
    <link rel="stylesheet" href="css/cardprodcss.css">
    <!-- search bar style -->
    <link rel="stylesheet" href="css/searchstyle.css">

    <title>K-T-E Produits</title>
</head>


<body>


<section class="search-sec">
    <div class="container">
        <form action="produit.php" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Entrer  le titre a rechercher" name="titreProduit">
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="categorie">
                                <option value="" disabled selected>Selectioné la Categorie</option>
                                <?php
                  require 'inc/dbh.php';
                  $sql2 = "SELECT * FROM categorie";
                  $stmt = $con->query($sql2);
                  while($row = $stmt->fetch_assoc()):
                  
                    echo '<option value="'.$row['NOM_CATEGORIE'].'">'.$row['NOM_CATEGORIE'].'</option>';
                  
                 
                  endwhile; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-danger wrn-btn" name="recherch">Rechercher</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<!--fin de html et php search bar et debut de preparation des cartes des prodits -->



    <div class="container">        
        <div class="row text-center py-5">
        <?php 
require 'inc/dbh.php';  

$sql3="";
if(isset($_POST['recherch']))
{
    $rech=$_POST['categorie'];
    $titrerech=$_POST['titreProduit'];
    if(empty($titrerech))
    {
        $titrerech="   ";
    }
     
            $sql3= "SELECT * FROM product WHERE TITRE like '%$titrerech%' OR CATEGORY like '$rech';";

    

}
else
{
    $sql3= "SELECT * FROM product";
}
$stmt2=$con->query($sql3);

while($row2 = $stmt2->fetch_assoc()):
    ?>
   
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form >
                
                    <div class="card shadow">
                        <div>
                            <img src="inc/dashproduct/uploads/<?= $row2['IMAGE']; ?>" alt="ERROR LOADING IMAGE" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title"><?= substr($row2['TITRE'],0,50).'...'; ?></h5>
                        <h6>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i> 
                            <i class="far fa-star"></i>
                        </h6>
                        <p class="card-text">
                        <?= substr($row2['DESCRIPTION'],0,100).'...';?>
                        </p>
                        <h5>
                            <small><s class="text-secondary"><?= ($row2['PRICE'] + $row2['PRICE'] * 10) / 8;?></s></small>
                            <span class="price"><?= $row2['PRICE'];?></span>
                        </h5>   
                        <a class="btn btn-danger my-3" href="productdiscription.php?id=<?= $row2['ID'];?>">plus d'infos <i class="fas fa-info-cart"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <?php endwhile;?>
        </div>
    </div>

<!-- fin daffichage des produis -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>