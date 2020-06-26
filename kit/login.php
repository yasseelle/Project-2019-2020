<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Connexion  K-I-T</title>
 <!-- <script src="script1.js" ></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--- bootstap--> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



    <link href="css/stylelogin.css" rel="stylesheet" />
</head>


<body style="background-image: url(img/1234.jpg)">
<div id="Home">
<div id="container">
  <main id="main">
    <div id="loginuicontainer">
      <div onclick="document.getElementById('verefy-code').style.display='none';document.getElementById('registercontainer').style.display='none'; document.getElementById('register-tab').style.backgroundColor='#0000' ;document.getElementById('login-tab').style.backgroundColor='#337ab7';document.getElementById('logincontainer').style.display='block';document.getElementById('forget-email').style.display='none';" name="log" id="login-tab" class="actives">Login</div><div onclick="document.getElementById('verefy-code').style.display='none';document.getElementById('registercontainer').style.display='block';  document.getElementById('logincontainer').style.display='none'; document.getElementById('login-tab').style.backgroundColor='#0000'; document.getElementById('register-tab').style.backgroundColor='#8B0000';document.getElementById('forget-email').style.display='none';"   name="log" id="register-tab">s'inscrire</div>   
      <div id="logincontainer">
   

      <form action="inc/connexion.php" method="POST">
        <div class="form-group">
   
    <?php
            if(isset($_GET['error']))
            {
              if($_GET['error']=="ivalidemail")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'> inscription refuser car Email Format Invalide</label>";

              }
              else if($_GET['error']=="ivalidusername")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car Username invalide essey d'autre</label>";

              }
              else if($_GET['error']=="les deux mot de pass sans pas les méme")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car les deux mot de pass sans pas les méme</label>";

              }
              else if($_GET['error']=="connexion")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>probléme d'inscription esseyer apres </label>";

              }
              else if($_GET['error']=="user taken")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car username est déjà pris esseyer d'autre usernme </label>";

              }
              else if($_GET['error']=="email taken")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car email est déjà pris esseyer d'autre usernme </label>";

              }

              else if($_GET['error']=="err")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>login refuser username/email  ou mot de pass incorect  </label>";

              }
              else if($_GET['error']=="nouser")
              {
                echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>login refuser cett email ou  nom d'utilisateur  nexist pas </label>";

              }
            } 
               
            else if(isset( $_GET['succes']))
            {
              if($_GET['succes']=="inscription compet bienvenue")
              {
                echo "<label class='form-contol inputbox' style='color: lightgreen;text-align: center; font-size: large;'>inscription complet bienvenue sur KIT connecter vous ^^</label>";
              }
            }

            
            
            

            
            ?>
          <input type="text" class="form-contol inputbox" id="login-username" name="logemailid" placeholder="EmailID / Username" required>
        </div>

        <div class="form-group">
          <input type="password" class="form-contol inputbox" id="login-password" name="logpassword" placeholder="mot de pass "required>
        </div>


        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Connexion" name="loginnow">
        </div>

        <div class="textcenter singuptxt"> Tu n'ai pas de compte ?<a onclick="document.getElementById('registercontainer').style.display='block';document.getElementById('forget-email').style.display='none';  document.getElementById('logincontainer').style.display='none'; document.getElementById('login-tab').style.backgroundColor='#0000'; document.getElementById('register-tab').style.backgroundColor='#8B0000';" href="#" class="link registerlink">s'inscrire</a></div>
       <p class="textcenter"> <a href="#" class="link forgetlink" onclick="document.getElementById('logincontainer').style.display='none';document.getElementById('login-tab').style.backgroundColor='#0000';document.getElementById('forget-email').style.display='block';document.getElementById('registercontainer').style.display='none'; ">mot de pass oublié?</a></p>
 </div>
</form> 
 <form action="inc/registr.php" method="POST" id="reg">
            <div id="registercontainer" style="display: none;" >
            
            <div class="form-group">
            <?php
               if(isset($_GET['error']))
               {
                 if($_GET['error']=="ivalidemail")
                 {
                   echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'> inscription refuser car Email Format Invalide</label>";
   
                 }
                 else if($_GET['error']=="ivalidusername")
                 {
                   echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car Username invalide essey d'autre</label>";
   
                 }
                 else if($_GET['error']=="les deux mot de pass sans pas les méme")
                 {
                   echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car les deux mot de pass sans pas les méme</label>";
   
                 }
                 else if($_GET['error']=="connexion")
                 {
                   echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>probléme d'inscription esseyer apres </label>";
   
                 }
                 else if($_GET['error']=="user taken")
                 {
                   echo "<label class='form-contol inputbox' style='color: red;text-align: center; font-size: large;'>inscription refuser car username est déjà pris esseyer d'autre usernme </label>";
   
                 }
               }
             
             ?>

            
            
          <input type="text" class="form-contol inputbox" id="registration-fname" placeholder=" Nom" name="nom" required>
            </div>
            <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-lname" placeholder="Prenome" name="prenome" required>
            </div>
             <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
          <input type="email" class="form-contol inputbox" id="registration-email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
          <input type="date" class="form-contol inputbox" id="registration-date"  name="dateness" required>
            </div>
            <div class="form-group">
                <select name="gander" class="form-contol inputbox" required>
                    <option value="" disabled selected>votre gendre</option>
                    <option value="m">masculin</option>
                  
                    <option value="f">féminin</option>
                </select>
            </div>
            <div class="form-group">
                <select name="secrety_question" class="form-contol inputbox" required>
                    <option value="" disabled selected>choisir une question de securité</option>
                    <option value="0">Mother's maiden name.</option> 
                    <option value="1">Name of town where you were born.</option> 
                    <option value="2">Name of first pet.</option> 
                </select>
            </div>
            <div class="form-group">
          <input type="text" class="form-contol inputbox" id="registration-security-answer" placeholder="repense de a question de securité" name="sequrity_answer" required>
            </div>
             <div class="form-group">
          <input type="password" class="form-contol inputbox" id="registration-password" placeholder="mot de pass" name="password" required>
            </div>
            <div class="form-group">
          <input type="password" class="form-contol inputbox" id="registration-cnfmpassword" placeholder="repetrer mot de pass" name="password2" required>
            </div>
           
            <div class="form-group">
          <input type="submit" class="btn btn-primary" value="s'inscrire" name="singup_btn" >
        </div>
          <div class="textcenter singuptxt"> vous avez ont déjà un compte ?<a  onclick="document.getElementById('registercontainer').style.display='none'; document.getElementById('register-tab').style.backgroundColor='#0000' ;document.getElementById('login-tab').style.backgroundColor='#337ab7';document.getElementById('logincontainer').style.display='block';document.getElementById('forget-email').style.display='none';" href="#" class="link loginlink"> connexion </a></div>
          </div>
</form>
    <form action="fppaswordemail.php" method="POST">
          <div class="forget-password" id="forget-email" hidden>
            <div class="form-group">
              <input type="email" class="form-contol inputbox" id="forget-email" placeholder="email Addresse" name="passforget"required>
                </div>
                <div class="form-group">
              <input type="submit" class="btn btn-primary" onclick="document.getElementById('verefy-code').style.display='block';document.getElementById('forget-email').style.display='none';" value="verfify">
            </div>
          </div>
</form>

    <form action="emailrecovry.php" method="post">
          <div class="verify-code" id="verefy-code" hidden>
            <div class="form-group">
              <input type="text" class="form-contol inputbox" id="code-email" placeholder="code sur vote boit electronique"required>
            </div>
                <div class="form-group">
                  <input type="password" class="form-contol inputbox" id="new-password" placeholder="new-password"required>
                </div>
                    <div class="form-group">
                      <input type="password" class="form-contol inputbox" id="conf-new-password" placeholder="confirm-new-password"required>
                    </div>
                <div class="form-group">
              <input type="submit" class="btn btn-primary" value="update">
            </div>
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