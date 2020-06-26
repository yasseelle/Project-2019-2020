/* 
 * Enter your Custom Javascript Functions here
*/

jQuery(document).ready(function($){
  
  var headerheight=$('header').height();
  var windowheight= $(window).height()+headerheight;
  $('.homescreen').css('height',windowheight+'px');

	 $(window).scroll(function(event){
    var st = $(this).scrollTop();
    if($('header').hasClass('fix')){
      
      if(st > windowheight){
        $('header').addClass('fixed');
      }else{
        $('header').removeClass('fixed');
      }
    }
  });

  $('.open-popup-link').magnificPopup({
    type:'inline',
    midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
  });
});

jQuery(document).ready(function($) { 
 // Cache selectors
 var lastId;
 var topMenu = $("header.fixed nav"); 
 var topMenuHeight = 180;
     // All list items
 var menuItems = topMenu.find("a"),
     // Anchors corresponding to menu items
     scrollItems = menuItems.map(function(){
       var item = $($(this).attr("href"));
       
       if (item.length) { return item; }
     });
  

       // Bind click handler to menu items
       // so we can get a fancy scroll animation
       menuItems.live('click', function(event){
        var $this=$(this);
         var href = $(this).attr("href"),
             offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+50;
             
          $('html, body').stop().animate({ 
             scrollTop: offsetTop
         }, 600);
       
         event.preventDefault();
       });


        $(window).scroll( function ()
        {
            var fromTop = $(this).scrollTop()+225;
            
            var cur = scrollItems.map(function(){
              if ($(this).offset().top < fromTop)
                return this;
            });

            cur = cur[cur.length-1];
            var id = cur && cur.length ? cur[0].id : "";
            if (lastId !== id) {
                lastId = id; 
                menuItems
                  .removeClass("active");
                  menuItems.filter("[href=#"+id+"]").addClass("active"); 
                                
                   }
              
        });
});