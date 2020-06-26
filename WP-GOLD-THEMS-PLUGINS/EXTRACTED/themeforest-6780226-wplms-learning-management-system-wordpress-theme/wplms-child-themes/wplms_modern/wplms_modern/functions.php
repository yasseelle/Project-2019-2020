<?php

include_once 'includes/init.php';
include_once 'includes/create.php';

add_action( 'after_setup_theme', 'wplms_modern_theme_setup' );
function wplms_modern_theme_setup() {

    $locale = get_locale();
    $locale_file = get_stylesheet_directory() . "/languages/";
    $global_file = WP_LANG_DIR . "/themes/wplms_modern/";

    if ( file_exists( $global_file.$locale.'.mo' ) ) {
        load_child_theme_textdomain( 'wplms_modern', $global_file );
    }else {
       load_child_theme_textdomain( 'wplms_modern',  $locale_file );
    }
}


/*-----------------------------------------------------------------------------------*/
/*	SETUP
/*-----------------------------------------------------------------------------------*/

add_filter('woocommerce_enable_setup_wizard','disable_woocommerce_setup_wizard');
function disable_woocommerce_setup_wizard($setup_wizard){
	return false;
}

add_filter('wplms_required_plugins','wplms_instructor_required_plugs');

function wplms_instructor_required_plugs($plugins){
	
	$plugins[]=array(
            'name'                  => 'BP Social Connect', // The plugin name
            'slug'                  => 'bp-social-connect', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        );
	$plugins[]=array(
            'name'                  => 'CoAuthors Plus', // The plugin name
            'slug'                  => 'co-authors-plus', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        );
	$plugins[]=array(
            'name'                  => 'WPLMS CoAuthors', // The plugin name
            'slug'                  => 'wplms-coauthors-plus', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        );
	return $plugins;
}

add_filter('wplms_setup_import_file_path','wplms_child_one_import_file_path',10,2);
function wplms_child_one_import_file_path($file_path,$file){
    $file_path = get_theme_root().'/wplms_modern/setup/modern.xml';
    return $file_path;
}


add_filter('wplms_data_import_url','wplms_child_one_data_import_url');
function wplms_child_one_data_import_url(){
    return get_stylesheet_directory_uri().'/setup/uploads/';
}

add_filter('wplms_setup_options_panel','wplms_one_instructor_options');
function wplms_one_instructor_options($panel){
	$panel['hero_img']= get_stylesheet_directory_uri().'/assets/images/default.jpeg';
	$panel['alternate_logo']=get_stylesheet_directory_uri().'/setup/uploads/logo_black.png';
	return $panel;
}