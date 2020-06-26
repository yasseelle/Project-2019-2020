jQuery(document).ready(function($){

  /*================ Login Modal ==================*/
  $('#login_modern_trigger').click(function(){
    $('#login-modal-overlay').addClass('show');
    $('#login-modal').addClass('show');
  });
  $('#close-modal').click(function(){
    $('#login-modal-overlay').removeClass('show');
    $('#login-modal').removeClass('show');
  });
  $('#forgot_password_trigger').click(function(){
    if($('#login_register_form').hasClass('slidehide')){
      $('#login_register_form').removeClass('slidehide');  
    }else{
      $('#login_register_form').addClass('slidehide');  
    }
    if($('#forgot_password').hasClass('slideshow')){
      $('#forgot_password').removeClass('slideshow');  
    }else{
      $('#forgot_password').addClass('slideshow');  
    }
  });
  $('#create_account_trigger').click(function(){
    $('#login_register_form').toggleClass('slidehide');
    $('#create_account').toggleClass('slideshow');
    $('#create_account').trigger('active');
  });
  $('#forgot_password .link,#create_account .link').click(function(){
    $('.slideshow').toggleClass('slideshow');
    $('#login_register_form').toggleClass('slidehide');
  });
  $('#logged_in_menu .hasmenu>a').click(function(event){
      $('#logged_in_menu .hasmenu').removeClass('active');
      if(!$(this).parent().hasClass('active')){
        $(this).parent().toggleClass('active');
      }
  });
  
  $('#forgot_password').find('form').each(function(){
      var $this = $(this);
      $('#forgot_password_submit').on('click',function(){
          $this.parent().find('.message').remove();
          
          if($this.parsley().validate()){
              var fields = [];
              var user_login;
              

              $this.parent().find('.form-control').each(function(){
              var f = {id:$(this).attr('id'),value:$(this).val() };
                if($(this).attr('id') == 'user_email'){
                  user_login = $(this).val();
                }
                fields.push(f);
              });
              $.ajax({
                type: "POST",
                url: ajaxurl,
                data: { action: 'forgot_password', 
                      security: $('#security').val(),
                      user_login: user_login,
                      fields:JSON.stringify(fields),
                    },
                cache: false,
                success: function (html) {
                  $this.parent().prepend(html);
                }
            });
          }
      });
  });

  $('#create_account').on('active',function(){
    var $form = $(this).find('form');
    $('#create_account_button').on('click',function(){
      if ( $form.parsley().validate() ){
          var $this = $(this);
          var fields = [];
          $this.parent().find('.form-control').each(function(){
          var f = {id:$(this).attr('id'),value:$(this).val() };
            fields.push(f);
          });
          $.ajax({
              type: "POST",
              url: ajaxurl,
              data: { action: 'create_user', 
                    security: $('#security').val(),
                    fields:JSON.stringify(fields),
                  },
              cache: false,
              success: function (html) {
                if($.isNumeric(html)) {
                  location.reload();
                }else{
                  $this.parent().prepend('<div id="message" class="error">'+html+'</div>');
                }
              }
          });
      }
    });
  });

});