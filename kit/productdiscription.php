<?php 
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: login.php?error=err"');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
     <!-- style similarProduct CARDS -->
    <link rel="stylesheet" href="css/similarproduct.css">


    <title>Document</title>
</head>
<body style="background-color:">
    
    <?php  
    require 'inc/dbh.php';  

    $prodid = $_GET['id'];
   
    $_SESSION['idprod']=$prodid;
    $sqlprod = "SELECT * FROM product WHERE ID like $prodid";
    $stmtprod = $con->query($sqlprod);
    while($row = $stmtprod->fetch_assoc()):
    ?>


    <div class="container">
    
        <div class="row">
        <!-- sider images -->
            <div class="col-md-6 mt-5 mb-5">
            
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="inc/dashproduct/uploads//<?= $row['IMAGE']; ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="inc/dashproduct/uploads//<?= $row['IMAGE2']; ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="inc/dashproduct/uploads//<?= $row['IMAGE3']; ?>" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                 </div>
            </div>
        
             <!-- fin sider images -->

            <!-- debut de remplisage des ifro de produit -->
            <div class="col-md-6 mt-5">
                <div class="row ">
                <h3><strong><?= $row['TITRE'];?></strong></h3>
                </div>

                <div class="row mt-5">
                <h1 class="text-danger"><i class="fas fa-dollar-sign"></i><?= $row['PRICE'];?></h1>
                &nbsp;&nbsp;
                <h3><del><?= ($row['PRICE'] + $row['PRICE'] * 10) / 8;?></del></h3>
                &nbsp;&nbsp;
                <h2 class="text-success">37.5 off</h2>
                </div>

                <div class="row">
                    <h3 class="text-danger">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i> 
                            <i class="far fa-star"></i>


                    </h3>
                </div>

                <div class="row mt-2">
                    <h3 class="text-info"><i class="fas fa-stream"></i></h3>
                    <p style="font-size: 20px;">&nbsp; quantité <span class="text-danger"><?= $row['QTE'];?></span> </p>
                </div>
                <div class="row mt-2">
                    <h3 class="text-info"><i class="fas fa-sitemap"></i></h3>
                    <p style="font-size: 20px;">&nbsp; tailles disponibles <span class="text-danger"><?= $row['SIZE'];?></span> </p>
                </div>
                <div class="row mt-2">
                    <h3 class="text-info"><i class="fas fa-palette"></i></h3>
                    <p style="font-size: 20px;">&nbsp; couleurs disponibles <span class="text-danger"><?= $row['COLOR'];?></span> </p>
                </div>


                <div class="row mt-2">
                    <h6>
                    <i class="text-success fas fa-info-circle"></i>
                    <strong>Description</strong>
                    <?= $row['DESCRIPTION'];?> 
                    </h6>
                </div>
            </div>
            
        </div>
    </div>
    <?php endwhile; ?>
<!-- fin remplisage des info de produit -->
         <!-- debut produit sumilair -->
    <div class="container">
        <div class="row mt-5 text-center py-5">
            <h3 class="text-danger"><i class="fas fa-store-alt"></i></h3>
            &nbsp;&nbsp;
            <h2><strong>produits similaires</strong></h2> 
        </div>

       
        <div class="row mt-5">
        <?php 
        require 'inc/dbh.php';  
        $prodid2 = $_GET['id'];
        $cat='';
        $sqlprod5 = "SELECT CATEGORY FROM product WHERE ID LIKE $prodid2";
        $stmt=mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt,$sqlprod5);
        mysqli_stmt_execute($stmt);
        $prodcategory =mysqli_stmt_get_result($stmt);
        while($row2 = $prodcategory->fetch_assoc())
        {
                $cat=$row2['CATEGORY'];
        };
        
        $sqlprod6 = "SELECT * FROM `product` WHERE CATEGORY LIKE '$cat' ORDER BY RAND() LIMIT 4";
        mysqli_stmt_prepare($stmt,$sqlprod6);
        mysqli_stmt_execute($stmt);
        $stmtprodcat =mysqli_stmt_get_result($stmt);
        while($row3 = $stmtprodcat->fetch_assoc()):
          
        ?>


            <div class="col-md-3">
                <div class="card">
                    <img src="inc/dashproduct/uploads/<?= $row3['IMAGE'];?>" alt="" class="card-img-top img-fluid">
                    <div class="card-title mt-2 text-center">
                        <h4><?= substr($row3['TITRE'],0,50).'...'; ?></h4>
                    </div>
                <div class="card-text text-center">
                    <?= substr($row3['DESCRIPTION'],0,100).'...';?> 
                    <h5>
                            <small><s class="text-secondary"><?= ($row3['PRICE'] + $row3['PRICE'] * 10) / 8;?></s></small>
                            <span class="price"><?= $row3['PRICE'];?></span>
                    </h5>   
                <a href="productdiscription.php?id=<?= $row3['ID'];?>" class="btn btn-danger text-light">plus d'infos <i class="fas fa-info-cart"></i></a>
                </div>
                </div>
            </div>
        <?php endwhile;?>
        </div>
    </div>

     <!-- fin produit sumilair -->
    <!-- debut produit avis -->
         
            <div class="container mt-5">
                <div class="row">
                    <h2><i class="text-danger fas fa-smile"></i> <strong>Avis des utilisateurs</strong></h2>
                </div>
                <?php 
            require 'inc/dbh.php';  
            
            $idprd = $_GET['id'];
            $sqlavi = "SELECT * FROM comments INNER JOIN user on(comments.USERID=user.ID) WHERE comments.PRODID=$idprd";
            $stmt=$con->query($sqlavi);
            while($row4 = $stmt->fetch_assoc()):
            ?> 
                <div class="row mt-5 mb-5">
               
                    <div class="media container">
                        <img class="col-md-1 align-self-start mr-3" src="img/profile.png" alt="Generic placeholder image">
                    <div class="media-body container">
                <h5 class="container mt-0"> <?=$row4['NAME']." ".$row4['LASTNAME'];?> <?php for ($i=0; $i < $row4['RATE']; $i++) { 
                    echo '<i class="fas fa-star text-danger"></i>';
                }?> <h6> <?=$row4['CREATETIME'];?></h6></h5>
                <?=$row4['COMMENT'];?>
                
                </div>
              
                </div>
            
            </div>
            <?php endwhile;?>
                <div class="row mb-5 mt-5">
                    <h2> <i class="far fa-comment-dots text-danger"></i> <strong>votre Avi</strong></h2>
                </div>

                <form action="inc/productcomment.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">userName</label>
                <input type="text" class="form-control" value="<?=$_SESSION['prenome']." ".$_SESSION['nom'];?>" id="exampleInputUserName" name="namelastname" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">votre commontaire</label>
                <textarea type="text" name="comment" class="form-control" id="exampleInputTextArea" placeholder="comment" rows="3" required></textarea>
            </div>
            <div class="form-check">
            
                <label class="radio-inline"><input type="radio" name="optradio" value="0"> &nbsp;&nbsp;0 Star</label>
                &nbsp;&nbsp;<label class="radio-inline"><input type="radio" name="optradio" value="1">&nbsp;&nbsp; 1 Star</label>
                &nbsp;&nbsp;<label class="radio-inline"><input type="radio" name="optradio" value="2">&nbsp;&nbsp; 2 Star</label>
                &nbsp;&nbsp;<label class="radio-inline"><input type="radio" name="optradio" value="3">&nbsp;&nbsp; 3 Star</label>
                &nbsp;&nbsp;<label class="radio-inline"><input type="radio" name="optradio" value="4">&nbsp;&nbsp; 4 Star</label>
                &nbsp;&nbsp;<label class="radio-inline"><input type="radio" name="optradio" value="5">&nbsp;&nbsp; 5 Star</label>
            </div>
            <button type="submit" class="btn btn-primary" name="addcoment">comment</button>
        </form>


            </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>