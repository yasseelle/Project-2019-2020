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

    <div id="Home">
        <div class="container">
            <div class="slider">
               <div class="slide slide1">
                <div class="caption">
                    <h2>Ford Fiesta Sedàn</h2>
                    <p>Enjoy elegance and comfortable driving with Ford Fiesta</p>
                </div>
               </div> 
               <div class="slide slide2">
                <div class="caption">
                    <h2>Hyundai Accent</h2>
                    <p>New Thinking. New Possibilities</p>
                </div>
               </div> 
               <div class="slide slide3">
                <div class="caption">
                    <h2>Citroen Elysee</h2>
                    <p>Enjoy elegance and comfortable driving with citroen elysee </p>
                </div>
               </div> 
               <div class="slide slide4">
                <div class="caption">
                    <h2>Dacia Logane</h2>
                    <p>Enjoy elegance and comfortable driving with Dacia Logane </p>
                </div>
               </div> 
               <div class="slide slide1">
                <div class="caption">
                    <h2>Ford Fiesta Sedàn</h2>
                    <p>Enjoy elegance and comfortable driving with Ford Fiesta</p>
                </div>
            </div>
        </div>
        </div>
    </div>

  <div  id="reserv" class="reserv">

  <div class="selected-date">
    <div class="row">
    <h1 style="color: cornsilk">First Step Select Date</h1>
    </div>
    <div class="row">
           <form action="cars2.php" method="POST">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datepicker'>
                        
                        <input type='text' class="form-control" placeholder="Start Day" required name="startdt"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                       
                    </div>
                    
                </div>
            </div>
            <div class='col-sm-6'>
                  <div class="form-group">
                      <div class='input-group date' id='datepicker1'>
                          
                          <input type='text' class="form-control" placeholder="return Day" required name="returndt"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          
                      </div>
                      
                  </div>
              
              </div>
              <h3>
                  <input type="submit" class="btn btn-primary" value="confirm">
              </h3>
              </form>
        </div>
        
    </div>
  </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script >
        $(function () {
            $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            required:true,
            orientation: "button"
            });
        });
    </script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
     <script >
         $(function () {
             $('#datepicker1').datepicker({
                 format: "yyyy-mm-dd",
                 autoclose: true,
                 required:true,
                 todayHighlight: true,
             showOtherMonths: true,
             selectOtherMonths: true,
             autoclose: true,
             changeMonth: true,
             changeYear: true,
             orientation: "button"
             });
         });
     </script>

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