<?php 
 include 'config.php';
 include 'control.php';
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:800&display=swap" rel="stylesheet">
<!-- custem css for dashbord -->
<link rel="stylesheet" href="../../css/dashboardcss.css">

   <title>dashboard prodyut</title>
    <script>
            function oppenSlideMenu()
            {
                document.getElementById('menu').style.width ='250px';
                document.getElementById('content').style.marginLeft='250px';
            }
            function closeSlideMenu()
            {
                document.getElementById('menu').style.width ='0';
                document.getElementById('content').style.marginLeft='0';
            }
        </script>
</head>
<body>

<body>


        <div id="content">

                <span class="slide">
                <a href="#" onclick="oppenSlideMenu()">
                    <i class="fas fa-bars"></i>
                </a>
                </span>

            <div id="menu" class="nav">
                    <a href="#" class="close" onclick="closeSlideMenu()">
                        <i class="fas fa-times"></i>
                    </a>
                 
                    <a href="../..index.php"><i class="fas fa-home text-info"></i> accueil</a> 
                 <a href="../dashuser/index.php"><i class="fas fa-user text-primary"></i> profils</a> 
                 <a href="../dashproduct/index.php"><i class="fas fa-store text-success"></i> produits</a> 
                 <a href="../dashcatalog/index.php"><i class="fas fa-syringe text-danger"></i> categoies</a>   
                 <a href="../dashmessage/index.php"><i class="fas fa-comment text-light"></i> messages</a> 
            </div>

                <div>
<div class="row justify-content-center">
	<div class="col-md-10">
		<i><h1 style="text-align:center;">CRUD prodauct table using Dashboard</h1></i>
		<hr>
		<?php 
if(isset($_SESSION['response'])){ ?>
<div class="alert alert-<?=$_SESSION['res-type'];?> alert-dismissible text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <b><?= $_SESSION['response'];?></b>
</div>

	<?php }unset($_SESSION['response']); ?>

 
</div>
</div>
	<div class="row justify-content-center">
	<div class="col-md-4">
	<h2 class="text-center text-info">Control Record</h2>
	<form action="control.php" method="POST" enctype="multipart/form-data">

	
	<input type="hidden" name="id" value="<?= $id;?>"/>

		<div class="form-group">
			<input type="text" name="titre" value="<?= $titre;?>"  class="form-control" placeholder="entre your titre" required  />
		</div>

		<div class="form-group ">
        <textarea rows="3" name="description"   value="<?= $description;?>" class="form-control"  placeholder="enter your description"  required ></textarea>

		</div>
		<div class="form-group">
			<input type="number" min="1" name="qte" value="<?= $qte;?>" class="form-control" placeholder="enter your quantite" required />
		</div>
		<div class="form-group">
			<input type="text" name="size" value="<?= $size;?>" class="form-control" placeholder="entre your size" required />
		</div>
		<div class="form-group">
			<input type="number" min="0" name="price" value="<?= $PRICE;?>" class="form-control" placeholder="enter your price" required />
		</div>
		<div class="form-group">
            <select name="categorie" class="form-contol inputbox" id="category" required>
                <option value="" disabled selected>catégorie</option>
                <?php
                  require 'config.php';
                  $sql = "SELECT * FROM categorie";
                  $stmt = $con->query($sql);
                  while($row = $stmt->fetch_assoc()):
                  
                    echo '<option value="'.$row['NOM_CATEGORIE'].'">'.$row['NOM_CATEGORIE'].'</option>';
                  

                  endwhile; ?>
            </select>
		</div>
		<div class="form-group">
			<input type="text" name="color" value="<?= $color;?>"  class="form-control" placeholder="enter your color" required/>		
		</div>

		<div class="form-group">
		    <input type="hidden" name="oldimage" value="<?= $image1;?>" />
			<input type="file" name="img1"   class="custom-file"  required/>	
			<img class="img_thumbnail" width="100" src="uploads/<?= $image1;?>" />	
        </div>
        <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $image2;?>" />
            <input  class="custom-file" type="file" id="image2" name="img2" required>
            <img class="img_thumbnail" width="100" src="uploads/<?= $image2;?>" />	
        </div>
        <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $image3;?>" />
            <input  class="custom-file" type="file" id="image3" name="img3" required>
            <img class="img_thumbnail" width="100" src="uploads/<?= $image3;?>" />	
        </div>

	<!--	<div class="form-group">
			<input type="file" name="img2" class="custom-file"  />		
		</div>
		<div class="form-group">
			<input type="file" name="img3" class="custom-file"  />		
		</div>
		-->
		<?php if($update==true){ ?>

			<div class="form-group">
			<input type="submit" name="update" class="btn btn-success btn-block" value="update Record" />
		</div>
		<?php } else{ ?>
		<div class="form-group">
			<input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record" />
		</div>
		<?php } ?>
		
	</form>		
	
    </div>
        </div>
        <div class="row justify-content-center"></div>
	<div  class="col-md-12">
	<?php 
      $query="SELECT * FROM product";
      $stmt=$con->prepare($query);
      $stmt->execute();
      $resultat=$stmt->get_result();
	 ?>

		<h2 class="text-center text-info">Record In DataBase</h2>

		<table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
      <th>#</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Quantite</th>
         <th>Size</th>
          <th>Price</th>
           <th>Categorie</th>
            <th>Color</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
           
            <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
      while ($row=$resultat->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['ID'];?>   </td>
         <td><?= $row['TITRE'];?> </td>
        <td> <?= substr($row['DESCRIPTION'],0,40).'...';?> </td>
        <td><?= $row['QTE'];?> </td>
        <td><?= $row['SIZE'];?>  </td>
        <td><?= $row['PRICE'];?>  </td>
        <td><?= $row['CATEGORY'];?> </td>
        <td> <?= $row['COLOR'];?> </td>
        <td><img width="60" height="40" src="uploads/<?= $row['IMAGE'];?>"/>  </td>
        <td><img width="60" height="40" src="uploads/<?= $row['IMAGE2'];?>"/>  </td>
        <td><img width="60" height="40" src="uploads/<?= $row['IMAGE3'];?>"/>  </td>
  
         <td>
         	<a  onclick="return confirm('do you want delete this record?');" class="btn btn-danger" href="
         	control.php?delete=<?= $row['ID'];?>"> delete</a>

         	<a class="btn btn-success"  href="index.php?edite=<?= $row['ID'];?>">edite</a>
         </td>
      </tr>
       <?php }?>
    </tbody>
  </table>
	</div>

</div>
</div>



        </div>     


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>