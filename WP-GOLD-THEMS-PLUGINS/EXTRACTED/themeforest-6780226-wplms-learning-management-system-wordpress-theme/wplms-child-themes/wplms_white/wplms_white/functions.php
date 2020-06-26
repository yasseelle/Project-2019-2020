<?php


if ( !defined( 'VIBE_CHILD_URL' ) )
define('VIBE_CHILD_URL',get_stylesheet_directory_uri());

if ( !defined( 'VIBE_CHILD_PATH' ) )
define('VIBE_CHILD_PATH',get_theme_root().'/wplms_white');


// Setup Necessary plugins for Points system

add_filter('wplms_required_plugins','wplms_points_system_plugins');
function wplms_points_system_plugins($plugins){
    $plugins[]=array(
        'name'                  => 'MyCred', // The plugin name
        'slug'                  => 'mycred', // The plugin slug (typically the folder name)
        'required'              => false, // If false, the plugin is only 'recommended' instead of required
    );
    $plugins[]=array(
        'name'                  => 'MyCred WPLMS Addon', // The plugin name
        'slug'                  => 'wplms-mycred-addon', // The plugin slug (typically the folder name)
        'source'                => VIBE_CHILD_URL . '/setup/wplms-mycred-addon.zip', // The plugin source
        'required'              => false, // If false, the plugin is only 'recommended' instead of required
        'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
    );
    return $plugins;
}
// ADD NEW BLOCK STYLE

add_filter('vibe_builder_thumb_styles','custom_vibe_builder_thumb_styles');  
add_filter('vibe_featured_thumbnail_style','custom_vibe_featured_thumbnail_style',1,3);

function custom_vibe_builder_thumb_styles($styles){
	$styles['modern_block'] =  VIBE_CHILD_URL.'/thumb_modern.png';
	return $styles;
}

function custom_vibe_featured_thumbnail_style($thumbnail_html,$post,$style){

	if($style == 'modern_block'){ 
		$instructors = apply_filters('wplms_course_instructors',$post->post_author,$post->ID);
        $thumbnail_html ='';
        $thumbnail_html .= '<div class="block modern_course">';
        $thumbnail_html .= '<div class="block_media">';
        $thumbnail_html .= '<a href="'.get_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID,'medium').'</a>';
        $thumbnail_html .= '</div>';
        $thumbnail_html .= '<div class="block_content">';
        $thumbnail_html .= '<h4 class="block_title"><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">'.$post->post_title.'</a></h4>';
        $thumbnail_html .= '<span>'.__('by ','vibe');
        if(is_array($instructors) && count($instructors) > 1){
        	 $thumbnail_html .= bp_core_get_user_displayname($post->post_author).' ( & '.(count($instructors)-1).' more )';
		}else{
			 $thumbnail_html .= bp_core_get_user_displayname($post->post_author);
		}
        $thumbnail_html .= '</span>';
        $thumbnail_html .= '<div class="course_meta">
        <i class="icon-users"></i> '.get_post_meta($post->ID,'vibe_students',true).'
        '.bp_course_get_course_credits().'
        </div>';
        $thumbnail_html .= '';
        $thumbnail_html .= '</div></div>';
    }
    return $thumbnail_html;
}


// ADD ONE CLICK SETUP SUPPORT

add_filter('wplms_setup_sidebars_file','wplms_child_one_sidebars_file');
function wplms_child_one_sidebars_file($file){
    return VIBE_CHILD_PATH.'/setup/sidebars.txt';
}

add_filter('wplms_setup_widgets_file','wplms_child_one_widgets_file');
function wplms_child_one_widgets_file($file){
    return VIBE_CHILD_PATH.'/setup/widgets.txt';
}

add_filter('wplms_setup_import_file_path','wplms_child_one_import_file_path',10,2);

function wplms_child_one_import_file_path($file_path,$file){
    $file_path = VIBE_CHILD_PATH.'/setup/points_system.xml';
    return $file_path;
}

add_filter('wplms_data_import_url','wplms_child_one_data_import_url');
function wplms_child_one_data_import_url(){
    return VIBE_CHILD_URL.'/setup/uploads/';
}


// Setup  Customizer 

add_action('wplms_after_sample_data_import','wplms_customizer_options',30);
function wplms_customizer_options(){ 
    $customizer_file = apply_filters('wplms_setup_mycred_file',VIBE_CHILD_PATH.'/setup/customizer.txt');
    if(file_exists($customizer_file)){
        $myfile = fopen($customizer_file , "r") or die("Unable to open file!".$customizer_file );
        while(!feof($myfile)) {
            $string = fgets($myfile);
        }
        fclose($myfile);
        $code = base64_decode(trim($string)); 
        if(is_string($code)){
            $code = unserialize($code);
            if(is_array($code)){
                update_option('vibe_customizer',$code);
            }
        }
    }
}
// SETUP MYCRED OPTIONS

add_action('wplms_after_sample_data_import','wplms_mycred_options',40);
function wplms_mycred_options(){
    $mycred_file = apply_filters('wplms_setup_mycred_file',VIBE_CHILD_PATH.'/setup/mycred.txt');
    if(file_exists($mycred_file)){
        $myfile = fopen($mycred_file , "r") or die("Unable to open file!".$mycred_file );
        while(!feof($myfile)) {
            $string = fgets($myfile);
        }
        fclose($myfile);
        $code = base64_decode(trim($string)); 
        if(is_string($code)){
            $code = unserialize($code);
            if(is_array($code)){
                foreach($code as $key=>$option){
                    update_option($key,$option);
                }
            }
        }
    }
}
