<?php 
 include '../kit/inc/dashcatalog/config.php';
 include '../kit/inc/dashcatalog/test.php';
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
     <!-- custem css for dashbord -->
        <link rel="stylesheet" href="css/dashboardcss.css">
        <title>dashbord</title>

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
                 
                 <a href="index.php"><i class="fas fa-home text-info"></i> accueil</a> 
                 <a href="inc/dashuser/index.php"><i class="fas fa-user text-primary"></i> profils</a> 
                 <a href="inc/dashproduct/index.php"><i class="fas fa-store text-success"></i> produits</a> 
                 <a href="inc/dashcatalog/index.php"><i class="fas fa-syringe text-danger"></i> categoies</a>   
                 <a href="inc/dashmessage/index.php"><i class="fas fa-comment text-light"></i> messages</a> 
            </div>
            



        </div>







<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>