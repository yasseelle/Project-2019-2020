<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bulma.css" type="text/css">
    <link rel="stylesheet" href="css/w3.css" type="text/css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <section class="imgSect">
    <div id="imageback" class="w3-content w3-section">
        <img class="mySlides" src="img/back2.jpg" id="img1" />
        <img class="mySlides" src="img/back4.jpg" id="img12" />
        <img class="mySlides" src="img/back5.jpg" id="img13" />
        <img class="mySlides" src="img/back6.jpg" id="img14" />
        <img src="img/logo2.png" id="imglogo"/>
    </div>
    </section>
    
    
    <section>
        
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="#">Acceuil</a></li>
            <li><a href="/work/">Contact</a></li>
            <li><a href="/clients/">Shop</a></li>
            <li><a href="/contact/">A Propos</a></li>
            <li><a href="/contact/">Login</a></li>
        </ul>
        
    </section>
    <header class="navheader">
        <div id="navbarTest">
            <ul class="nav2">
                <li><a href="/">Home</a></li>
                <li><a href="/work/">Contact</a></li>
                <li><a href="/clients/">Shop</a></li>
                <li><a href="/contact/">About</a></li>
                <li><a href="/contact/">Login</a></li>
                <div>
                    <img src="img/logo2.png" id="imglogoNav"/>
                    <p id="slogon">
                        kawtar ilyass tawfiq
                    </p>
                </div>
            </ul>
        
        </div>
    </header>
    <section class="bodydephoto">
       <p class="txt"> LSSKDsdjbhvsgdgsbdjbsvdsbdvsdvscgdvhsdcgsvdcsgdvsdcgsvdcgsvdscgdvsdcgsvdcsdgscdsg</p>
    </section>
   
        <script>
            var myIndex = 0;
            carousel();
            
            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 4000); // Change image every 2 seconds
            }

            //Scroll?!?!?!?!?!?

            /*This code is the correct one for scroll Xd
            */
            /* var zero=0;
                $(document).ready();
                $(window).on('scroll',function() {
                    $('.nav2').toggleClass('hide',$(window).scrollTop()>zero);
                    
                })*/

            //Test #1
           /* var zero=0;
            var Navigat=document.getElementsByClassName(".nav");
                $(document).ready();
                $(window).on('scroll',function() {
                    $('.nav2').hide();
                    
                    
                })*/
             //Test #2   
                let navbar = $(".nav2");
                let firstnav = $(".nav");

                $(window).scroll(function () {
                // get the complete hight of window
                let oTop = $(".bodydephoto").offset().top - window.innerHeight;
                let oBot = $(".bodydephoto").offset().top + window.innerHeight; 
                if ($(window).scrollTop() > oTop) {
                    firstnav.addClass("visNav1");
                    navbar.addClass("visHide");
                } else {
                    navbar.removeClass("visHide");
                    firstnav.removeClass("visNav1");
                }
                });
       

         </script>
</body>
</html>