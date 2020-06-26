<?php

if ( !defined( 'VIBE_CHILD_URL' ) )
define('VIBE_CHILD_URL',get_stylesheet_directory_uri());

add_action('wp_enqueue_scripts', 'vibe_wplms_child_js');
function vibe_wplms_child_js(){
  wp_enqueue_script( 'child-custom-js', get_stylesheet_directory_uri().'/custom.js',array('jquery')); 
}

// Hide Admin Toolbar
add_filter('show_admin_bar', '__return_false');


/*===== Theme customizer ====*/

add_action('wplms_customizer_custom_css','wplms_childone_changes',10,1);
function wplms_childone_changes($customiser){
  if(isset($customiser) && isset($customiser['primary_bg'])){
        echo '.heading:after{
              background:'.$customiser['primary_bg'].';
              }
              section.stripe.fullwidthwhite li i,.homethreesteps i{
                color:'.$customiser['primary_bg'].';
              }
              section.stripe.fullwidthsteps{
                background:'.$customiser['primary_bg'].';
              }
              ';
        }
}

/*==== One Course site usage ======*/

add_filter('wplms_post_metabox','wplms_child_header_bg_image');
add_filter('wplms_page_metabox','wplms_child_header_bg_image');
add_filter('wplms_course_metabox','wplms_child_header_bg_image');
function wplms_child_header_bg_image($args){
  $prefix ='vibe_';
  $args[]=array( // Text Input
      'label' => 'Header Image', // <label>
      'desc'  =>'Header Image', // description
      'id'  => $prefix.'header_image', // field id and name
      'type'  => 'image' // type of field
    );
  return $args;
}

function wplms_one_course_enqueue_head(){
  if(is_admin())
    return;
  
  wp_enqueue_script( 'child-js', VIBE_CHILD_URL.'/custom_child.js');
  $theme_customizer=get_option('vibe_customizer');
  echo '<style>';
  if(isset($theme_customizer['header_bg'])){
        echo 'header.fixed{
                background:'.$theme_customizer['main_button_color'].'}';
        }
  echo '</style>';

  if(is_single() || is_page()){
    $id = get_the_ID();
    $bg_img_id = get_post_meta($id,'vibe_header_image',true);
    if(isset($bg_img_id) && is_numeric($bg_img_id)){
      $bg_img = wp_get_attachment_info($bg_img_id);
      //print_r($bg_img);
      echo '<style>section.title,section#title{
        background: url('.$bg_img['src'].');
        background-size: 100% auto;
      }</style>'; 
    }else{
      $bg_img = vibe_get_option('default_bg_image');
      if(isset($bg_img)){
        echo '<style>section.title,section#title{
          background: url('.$bg_img.');
          background-size: 100% 100%;
        }</style>'; 
      }else{

      }
    }
  }else if(is_archive()){
    $bg_img = vibe_get_option('default_bg_image');
      if(isset($bg_img)){
        echo '<style>section.title,section#title{
          background: url('.$bg_img.');
          background-size: 100% 100%;
        }</style>'; 
      }else{
        
      }
  }
}
add_action('wp_enqueue_scripts', 'wplms_one_course_enqueue_head',100);

/*-----------------------------------------------------------------------------------*/
/*  Course Button shortcode
/*-----------------------------------------------------------------------------------*/

if(!function_exists('vibe_course_button')){
  function vibe_course_button($atts, $content = null ) {
        extract(shortcode_atts(array(
      'id'   => ''
            ), $atts));
        if(!isset($id) || !is_numeric($id)){
          $id = vibe_get_option('one_course_id');
        } 
        $return ='';
        if(is_numeric($id)){
          ob_start();
          the_course_button($id);
          $return=ob_get_clean();
        }
        return $return;
  }
  add_shortcode('course_button','vibe_course_button');
}



/*-----------------------------------------------------------------------------------*/
/*  Login shortcode
/*-----------------------------------------------------------------------------------*/

if(!function_exists('vibe_wplms_login')){
  function vibe_wplms_login($atts, $content = null ) {
        $return = '';
        if(is_user_logged_in()){
          $return .= __('Welcome','vibe').' '.bp_get_loggedin_user_fullname();  
        }else{
          $return .= '<a href="#wplms-login-form" class="open-popup-link">'.__('Already registered ? Click here to login','vibe').'</a>';
          ob_start();
          ?>
          <form name="login-form" id="wplms-login-form" class="standard-form white-popup mfp-hide" action="<?php echo apply_filters('wplms_login_widget_action',vibe_site_url( 'wp-login.php', 'login-post' )); ?>" method="post">
        <label><?php _e( 'Username', 'vibe' ); ?><br />
        <input type="text" name="log" id="side-user-login" class="input" tabindex="1" value="<?php echo esc_attr( stripslashes( $user_login ) ); ?>" /></label>
        
        <label><?php _e( 'Password', 'vibe' ); ?> <a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" tabindex="5" class="tip" title="<?php _e('Forgot Password','vibe'); ?>"><i class="icon-question"></i></a><br />
        <input type="password" tabindex="2" name="pwd" id="sidebar-user-pass" class="input" value="" /></label>
        
        <p class=""><label><input name="rememberme" tabindex="3" type="checkbox" id="sidebar-rememberme" value="forever" /><?php _e( 'Remember Me', 'vibe' ); ?></label></p>
        
        <?php do_action( 'bp_sidebar_login_form' ); ?>
        <input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e( 'Log In','vibe' ); ?>" tabindex="100" />
        <input type="hidden" name="testcookie" value="1" />
          <?php do_action( 'login_form' ); //BruteProtect FIX ?>
      </form>
      <?php     
      $return .= ob_get_clean();  
    } 
      
        return $return;
  }
  add_shortcode('wplms_login','vibe_wplms_login');
}

add_filter('wplms_setup_import_file_path','wplms_one_page_import_file_path',10,2);
function wplms_one_page_import_file_path($file_path,$file){
    $file_path = get_theme_root().'/wplms_one_page/setup/sampledata_one_course.xml';
    return $file_path;
}


add_filter('wplms_data_import_url','wplms_child_one_data_import_url');
function wplms_child_one_data_import_url(){
    return get_stylesheet_directory_uri().'/setup/uploads/';
}

add_action('wplms_after_sample_data_import','wplms_one_course_set_menu',60);
function wplms_one_course_set_menu(){

    $wplms_menus = array(
      'mobile-menu'=>'main',
      'main-menu'=>'main'
    );

    $vibe_menus  = wp_get_nav_menus();
    if(!empty($vibe_menus) && !empty($wplms_menus)){

      global $wpdb;
      foreach($wplms_menus as $key=>$menu_item){
        $term_id = $wpdb->get_var( $wpdb->prepare( "SELECT term_id FROM {$wpdb->terms} WHERE slug = %s LIMIT 1;", "{$menu_item}" ) );
        if(isset($term_id) && is_numeric($term_id)){
          $wplms_menus[$key]=$term_id;
        }else{
          unset($wplms_menus[$key]);
        }
      }

      set_theme_mod( 'nav_menu_locations', $wplms_menus);
    }
}