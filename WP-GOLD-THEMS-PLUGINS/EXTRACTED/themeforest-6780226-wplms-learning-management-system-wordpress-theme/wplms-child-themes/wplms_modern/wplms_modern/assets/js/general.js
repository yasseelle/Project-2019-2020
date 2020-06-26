
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

   $('.show_reviews').on('click',function(){
      var parent = $(this).parent();
      if(parent.hasClass('active')){
        parent.removeClass('active');
        $(this).text($(this).attr('data-default'));
      }else{
        parent.addClass('active');
        $(this).text($(this).attr('data-less'));
      }
   });
   
  $('#item-nav').each(function(){  
      $(this).find('.item-list-tabs ul').flexMenu({
        'linkText' : wplms.more, 
        'linkTitle' : wplms.view_more,
        'linkTextAll' : wplms.menu,
        'linkTitleAll' : wplms.open_menu, 
      });
  });

   jQuery('.instructor_more .more_description').on('click',function(){
      var defaulttext = $(this).attr('data-default');
      $(this).parent().toggleClass('active');
      var text = $(this).text();
      $(this).attr('data-default',text);
      $(this).text(defaulttext);
   });
   
   jQuery('.ajax_unit').magnificPopup({
          type: 'ajax',
        alignTop: true,
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        callbacks: {
          parseAjax: function(mfpResponse) {
             mfpResponse.data = jQuery(mfpResponse.data).find('.unit_wrap');
          },
          ajaxContentAdded: function() {
              jQuery('video,audio').mediaelementplayer();
              jQuery('.fitvids').fitVids();
              jQuery('.tip').tooltip();
              jQuery('.nav-tabs li:first a').tab('show');
              $('audio,video').mediaelementplayer();
              jQuery('.nav-tabs li a').click(function(event){
                  event.preventDefault();
                jQuery(this).tab('show');
              });
          }
        }
    });
});