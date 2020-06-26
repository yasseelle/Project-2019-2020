<?php
//Header File
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title>
<?php echo wp_title('|',true,'right'); ?>
</title>
<?php

$layout = vibe_get_option('layout');
if(!isset($layout) || !$layout)
    $layout = '';

wp_head();
?>
</head>
<body <?php body_class($layout); ?>>
<div id="global" class="global">
    <div class="pagesidebar">
        <div class="sidebarcontent">    
            <h2 id="sidelogo">
            <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
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
        <header class="<?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <?php

                            if(is_home()){
                                echo '<h1 id="logo">';
                            }else{
                                echo '<h2 id="logo">';
                            }
                        ?>
                        
                            <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                        <?php
                            if(is_home()){
                                echo '</h1>';
                            }else{
                                echo '</h2>';
                            }

                            $args = apply_filters('wplms-main-menu',array(
                                 'theme_location'  => 'main-menu',
                                 'container'       => 'nav',
                                 'menu_class'      => 'menu',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><a id="new_searchicon"><i class="fa fa-search"></i></a></li></ul>',
                                 'walker'          => new vibe_walker,
                                 'fallback_cb'     => 'vibe_set_menu'
                             ));
                            wp_nav_menu( $args ); 
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?php
                            if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                                ?>
                                <ul class="topmenu">
                                    <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><span><?php bp_loggedin_user_fullname(); ?></span></a></li>
                                    <?php
                                    do_action('wplms_child_one_page_header');
                                    ?>
                                </ul>
                            <?php
                            else :
                                ?>
                                <ul class="topmenu">
                                    <li><a href="#login" class="smallimg vbplogin"><span><?php _e('LOGIN','vibe'); ?></span></a></li>
                                </ul>
                            <?php
                            endif;
                        ?>
                        <div id="vibe_bp_login">
                        <?php
                            if ( function_exists('bp_get_signup_allowed')){
                                the_widget('vibe_bp_login',array(),array());   
                            }
                        ?>
                       </div> 
                    </div>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a>
                </div>
            </div>
        </header>
