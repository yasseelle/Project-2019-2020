<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--  bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

  <link href="../css/stylelogin.css" rel="stylesheet"/>
    <title>Document</title>
</head>

  <body style="background-image: url(../img/1234.jpg);">
<div id="Home">
<div id="container">
  <main id="main">
      <div id="logincontainer">   
      <form action="product.php" method="POST" enctype="multipart/form-data">  
    <div class="form-group">
    <label class='form-contol inputbox' style='color: green;text-align: center; font-size: 35px; '>inserer un nouveau produit</label>
    </div>
    <div class="form-group">
    <?php 
    
      if(isset($_GET['messg']))
      {
            if($_GET['messg']=='non')
            {
              echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'> probléme d'insertion </label>";
            }
            else if($_GET['messg']=='imgetype')
            {
              echo "<label class='form-contol inputbox' style='color: yellow;text-align: center; font-size: large;'> image type non accepter : suelment jpg jpeg png aceptable</label>";
            }
            else if($_GET['messg']=='sizeerr')
            {
              echo "<label class='form-contol inputbox' style='color: yellow;text-align: center; font-size: large;'> image type non accepter : error max taill est 2mb par image </label>";
            }
            else if($_GET['messg']=='bien ajouter')
            {
              echo "<label class='form-contol inputbox' style='color: green;text-align: center; font-size: large;'> prodit bien inseré </label>";
            }
      }
    
    ?>
    </div>
    <div class="form-group">
     <input type="text" name="titre" placeholder="titre de produit" required>
    </div>
    <div class="form-group">
    <input type="number" name="qte" min="1" placeholder="quentité de produit" required>
    </div>
    <div class="form-group">
    <input type="text" name="size" id="size" class="form-contol inputbox" placeholder="les tailles de produits"  require>         
    </div>
    <div class="form-group">
    <input type="number" min="0" name="price" placeholder="prix de produit" required>
    </div>
    <div class="form-group">
     <input type="text" name="color" placeholder="les color de produit" required>
    </div>
    <div class="form-group">
    <textarea name="description" id="description" cols="30" rows="5" placeholder="description" required></textarea>
    </div>
    <div class="form-group">
    <select name="category" class="form-contol inputbox" id="category" required>
                <option value="" disabled selected>catégorie</option>
                <?php
                  require 'dbh.php';
                  $sql = "SELECT * FROM categorie";
                  $stmt = $con->query($sql);
                  while($row = $stmt->fetch_assoc()):
                  
                    echo '<option value="'.$row['NOM_CATEGORIE'].'">'.$row['NOM_CATEGORIE'].'</option>';
                  

                  endwhile; ?>
            </select>
    </div>
    <div class="form-group">
    <label style="color: white;" class="form-contol inputbox" for="image1">image 1:</label>
    <input  class="form-contol inputbox" type="file" id="image1" name="image1" required>
    </div>
    
    <div class="form-group">
    <label style="color: white;" class="form-contol inputbox" for="image2">image 2:</label>
    <input  class="form-contol inputbox" type="file" id="image2" name="image2" required>
    </div>

    <div class="form-group">
    <label style="color: white;" class="form-contol inputbox" for="image3">image 3:</label>
    <input  class="form-contol inputbox" type="file" id="image3" name="image3" required>
    </div>


    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="insertproduits" value="ajouter le produit" >
    </div>
    

</form>
</div>
</main>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>