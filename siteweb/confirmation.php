<!DOCTYPE html>
<html>
<head>
  <title>cars M.S.T.E Moussaouate</title>
 <!-- <script src="script1.js" ></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="stylecars.css">

  
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-heder">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="sr-only"> toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- replace the default logo by the new logo in the next <a> tag -->
          <a class="navbar-brand" href="#"><img src="img/w3newbie.png"></a>
        </div>
        <div class= "collapse navbar-collapse" id="navbar-collapse-main">
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="index.php" >Home </a></li> 
            <li> <a href="cars.php" >cars and reservation </a></li> 
            <li> <a href="contact.php" >Contact </a></li> 
            
            <li> <a class="active" href="loginpage.php" >login </a></li>
    
          </ul>
        </div>
      </div>
    </nav>

    <div id="formreserve" style="background-color: dimgray">

   
    <div class="wrapper" style="background-image: url('/img/loginbg.png')">
        <div class="content">
          <h1 style="color: black;font-size: 100px">Confirmation</h1>
          <h1 style="color: darkblue">verify the reservation info to get ready.</h1>
        </div>
      <?php 
      session_start();
       $idV=$_GET['$idV'];
       $login=$_SESSION['idlog'];
       if (isset($_GET['idV'])) { $idV = $_GET['idV']; }
       if (isset($_SESSION['idlog'])) { $login = $_SESSION['idlog']; }
  include_once 'includes/dbh.inc.php';
  $sqlu="select * from clients where idC='".$login."';";
  $sqlv="select * from voitures where idV='".$idV."';";
  $resu=mysqli_query($conn,$sqlu);
  $resv=mysqli_query($conn,$sqlv);
  $datau=mysqli_fetch_assoc($resu);
  $datav=mysqli_fetch_assoc($resv);
      ?>
        <div class="form" >
      
          <div class="top-form">
            <div class="inner-form">
              <div class="label"> First name</div>
             <?php echo '<input type="text" value="'.$datau['Nom'].'">'; ?>
            </div>
            <div class="inner-form">
                <div class="label"> Last name</div>
              <?php echo '<input type="text" value="'.$datau['Prenom'].'">'; ?>
              </div>
            <div class="inner-form">
              <div class="label">email</div>
              <?php echo '<input type="text" value="'.$datau['Email'].'">'; ?>
                </div>
            <div class="inner-form">
              <div class="label">phone</div>
              <input type="text" placeholder="1234567890">
            </div>
            
          </div>
      
          <div class="middle-form">
            <div class="middle-form">
                <div class="label"> Driver Licence ID</div>
              <?php echo '<input type="text" value="'.$datau['PermisC'].'">'; ?>
                </div>
              <div class="middle-form">
                  <div class="label"> date start</div>
              <?php echo '<input type="text" value="'.$_GET['$dt1'].'">'; ?>
                </div>
                <div class="middle-form">
                    <div class="label"> date return</div>
              <?php echo '<input type="text" value="'.$_GET['$dt2'].'">'; ?>
                  </div>
          </div>
      
          <div class="bottom-form">
            <div class="inner-form">
              <div class="label">car informations</div>
              <?php echo"
              <textarea>Model :".$datav['Model']."
              Marque :".$datav['Marque']."
              Carburant :".$datav['Carburant']."</textarea>"; ?>
            </div>
          </div>
      
          <div class="btn">Confirm</div>
          <div class="btn" onclick="window.location.href = 'cars.php';">return</div>
      
        </div>
      </div>
    </div>
      <footer class="container-fluid text-center">
        <div class="row">
          <div class="col-sm-4">
            <h3>Contact Us</h3>
            <br>
            <h4>+212 64 03 66 80</h4>
            <h4>joneslowie4988@gmail.com</h4>
          </div>
            <div class="col-sm-4">
            <h3>Connect</h3>
            <a href="facebook.com" class="fa fa-facebook"></a>
             <a href="twitter.com" class="fa fa-twitter"></a>
              <a href="google.com" class="fa fa-google"></a>
               <a href="instagram.com" class="fa fa-instagram"></a>
          </div>
            <div class="col-sm-4">
              <!-- replace logo image here in img tag-->
              <img src="img/w3newbie.png">
          </div>
        </div>
        
      </footer>
      
      </body>
      </html>