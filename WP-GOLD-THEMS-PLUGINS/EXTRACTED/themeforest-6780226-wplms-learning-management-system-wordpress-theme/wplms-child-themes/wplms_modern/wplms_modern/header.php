<?php
//Header File
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php

$layout = vibe_get_option('layout');
if(!isset($layout) || !$layout)
    $layout = '';

$vibe = Wplms_Modern_Init::init();
wp_head();
?>
</head>
<body <?php body_class($layout); ?>>
<div id="global" class="global">
    <div class="pagesidebar">
        <div class="sidebarcontent">    
            <h2 id="sidelogo">
            <a href="<?php echo vibe_site_url(); ?>">
                <img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
            </a>
            </h2>
            <?php
                $args = apply_filters('wplms-mobile-menu',array(
                    'theme_location'  => 'mobile-menu',
                    'container'       => '',
                    'items_wrap' => '<div class="mobile_icons"><a id="mobile_searchicon"><i class="fa fa-search"></i></a>'.( (function_exists('WC')) ?'<a href="'.WC()->cart->get_cart_url().'"><span class="fa fa-shopping-basket"><em>'.WC()->cart->cart_contents_count.'</em></span></a>':'').'</div><ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class'      => 'sidemenu',
                    'fallback_cb'     => 'vibe_set_menu',
                ));

                wp_nav_menu( $args );
            ?>
        </div>
        <a class="sidebarclose"><span></span></a>
    </div>  
    <div class="pusher">
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
        <div id="headertop">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-3">
                       <a href="<?php echo vibe_site_url(); ?>" class="homeicon">
                        <img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                        <span><img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></span>
                        </a> 
                    </div>
                    <div class="col-md-8 col-sm-9">
                    <?php
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                        <ul class="topmenu">
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>
                        </ul>
                    <?php
                    else :
                        ?>
                        <ul class="topmenu">
                            <li><a href="#login" id="login_modern_trigger" class="smallimg"><?php _e('Login / Signup','wplms_modern'); ?></a></li>
                        </ul>
                    <?php
                    endif;
                            $args = apply_filters('wplms-top-menu',array(
                                'theme_location'  => 'top-menu',
                                'container'       => '',
                                'menu_class'      => 'topmenu',
                                'fallback_cb'     => 'vibe_set_menu',
                            ));

                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <header class="<?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <?php

                            if(is_home()){
                                echo '<h1 id="logo">';
                            }else{
                                echo '<h2 id="logo">';
                            }
                        ?>
                        
                        <a href="<?php echo vibe_site_url(); ?>">
                        <img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                        <span>
                            <img src="<?php  echo $vibe->option('alternate_logo'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                        </span></a>
                        <?php
                            if(is_home()){
                                echo '</h1>';
                            }else{
                                echo '</h2>';
                            }
                        ?>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <?php
                            $args = apply_filters('wplms-main-menu',array(
                                 'theme_location'  => 'main-menu',
                                 'container'       => 'nav',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><a id="new_searchicon"><i class="fa fa-search"></i></a></li></ul>',
                                 'menu_class'      => 'menu',
                                 'walker'          => new vibe_walker,
                                 'fallback_cb'     => 'vibe_set_menu'
                             ));
                            wp_nav_menu( $args ); 
                        ?> 
                    </div>
                    <div id="vibe_bp_login">
                    <?php
                        if ( function_exists('bp_get_signup_allowed')){
                            the_widget('vibe_bp_login',array(),array());   
                        }
                    ?>
                   </div>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a>
                </div>
            </div>
        </header>
