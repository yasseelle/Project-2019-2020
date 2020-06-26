<?php
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login M.S.T.E Moussaouate</title>
 <!-- <script src="script1.js" ></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="stylelogin.css" rel="stylesheet" />
  
</head>
<body>
$conn;
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
        <li> <a href="index.html" >Home </a></li> 
        <li> <a href="cars.html" >cars and Reservation </a></li> 
        <li> <a href="contact.html" >Contact </a></li> 
        <li> <a class="active" href="loginpage.php" >login </a></li>

      </ul>
    </div>
  </div>
</nav>
<div id="Home">
<div id="container">
  <main id="main">
    <div id="loginuicontainer">
      <div onclick="document.getElementById('registercontainer').style.display='none'; document.getElementById('register-tab').style.backgroundColor='#0000' ;document.getElementById('login-tab').style.backgroundColor='#337ab7';document.getElementById('logincontainer').style.display='block';" name="log" id="login-tab" class="actives">Login</div><div onclick="document.getElementById('registercontainer').style.display='block';  document.getElementById('logincontainer').style.display='none'; document.getElementById('login-tab').style.backgroundColor='#0000'; document.getElementById('register-tab').style.backgroundColor='#8B0000';"   name="log" id="register-tab">Register</div> 
      <form action="includes/loginin.inc.php" method="POST">  
      <div id="logincontainer">
        <div class="form-group">
          <input type="text" class="form-contol inputbox" id="login-username" name="login" placeholder="EmailID / Username" required>
        </div>

        <div class="form-group">
          <input type="password" class="form-contol inputbox" id="login-password" name="pswd" placeholder="Password"required>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>

        <div class="textcenter singuptxt"> Don't have an acount ?<a onclick="document.getElementById('registercontainer').style.display='block';  document.getElementById('logincontainer').style.display='none'; document.getElementById('login-tab').style.backgroundColor='#0000'; document.getElementById('register-tab').style.backgroundColor='#8B0000';" href="#" class="link registerlink">Sing Up</a></div>
       <p class="textcenter"> <a href="#" class="link forgetlink">Forget Password ?</a></p>

      </div> 
    </form>
    <form action="includes/signup.inc.php" method="POST">
            <div id="registercontainer" style="display: none;" >

            <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-fname" name="first" placeholder="First Name"required>
            </div>
            <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-lname" name="last" placeholder="Last Name"required>
            </div>
             <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-email" placeholder="Email ID / Username"required>
            </div>
            <div class="form-group">
          <input type="driver's license" class="form-contol inputbox" id="login-password" placeholder="DriveLicence"required>
            </div>
             <div class="form-group">
          <input type="password" class="form-contol inputbox" id="registration-password" placeholder="Password"required>
            </div>
            <div class="form-group">
          <input type="password" class="form-contol inputbox" id="registration-cnfmpassword" placeholder="Confirm Password"required>
            </div>
            <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Register">
        </div>
          <div class="textcenter singuptxt"> already have an acount ?<a  onclick="document.getElementById('registercontainer').style.display='none'; document.getElementById('register-tab').style.backgroundColor='#0000' ;document.getElementById('login-tab').style.backgroundColor='#337ab7';document.getElementById('logincontainer').style.display='block';" href="#" class="link loginlink"> Login </a></div>
          </div>
        </div>
      </main>
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