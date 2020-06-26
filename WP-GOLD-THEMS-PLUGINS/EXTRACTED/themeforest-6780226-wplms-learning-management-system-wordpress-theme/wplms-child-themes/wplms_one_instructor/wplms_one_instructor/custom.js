
jQuery(document).ready(function($){
	 $(window).scroll(function(event){
    var st = $(this).scrollTop();
    if($('header').hasClass('fix')){
      var headerheight=$('header').height();
      if(st > headerheight){
        $('header').addClass('fixed');
      }else{
        $('header').removeClass('fixed');
      }
    }
  });
});