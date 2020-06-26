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
        <li> <a href="cars.php" >cars and Reservation </a></li> 
        <li> <a href="contact.php" >Contact </a></li> 
        <li> <a class="active" href="loginpage.php" >login </a></li>

      </ul>
    </div>
  </div>
</nav>
<div id="Home">
<div id="container">
  <main id="main">
      <form action="includes/recupass.inc.php" method="POST">
                <div id="loginuicontainer">
            <div class="verify-code" id="verefy-code" >
            <div class="form-group">
              <input type="text" class="form-contol inputbox" id="code-email" name="codemail" placeholder="Code from your inbox" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-contol inputbox" id="new-password" name="pswd1" placeholder="new-password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-contol inputbox" id="conf-new-password" name="pswd2" placeholder="confirm-new-password" required>
                        </div>
                <div class="form-group">
              <input type="submit" class="btn btn-primary" value="update">
            </div>
          </div>
        </div>
      </form>
      </main>
    </div>
  </div>