<?php


if ( !defined( 'VIBE_CHILD_URL' ) )
define('VIBE_CHILD_URL',get_stylesheet_directory_uri());

if ( !defined( 'VIBE_CHILD_PATH' ) )
define('VIBE_CHILD_PATH',get_theme_root().'/wplms_one_instructor');


add_filter('show_admin_bar', 'wplms_hide_admin_for_non_logged_in');
function wplms_hide_admin_for_non_logged_in($status){
  if(!current_user_can('edit_posts'))
    return false;
 return $status;
}
add_action('wp_enqueue_scripts', 'vibe_wplms_child_js');
function vibe_wplms_child_js(){
	wp_enqueue_style( 'wplms-instructor-css', get_stylesheet_directory_uri().'/style.css',array('wplms-style'));	
	wp_enqueue_script( 'child-custom-js', get_stylesheet_directory_uri().'/custom.js',array('jquery'));	
}


add_action('wplms_customizer_custom_css','wplms_child_customizer_custom_css',10,1);
function wplms_child_customizer_custom_css($customizer){

	if(isset($customizer['header_top_bg'])){
          echo '.boxed header.fixed .container{
					background: '.$customizer['header_top_bg'].';
				}';
        }

        
    if(isset($customizer['header_top_color'])){
          echo 'header.fixed nav .menu li a,
				header.fixed .topmenu,header.fixed #searchicon,
				header.fixed .topmenu li a{color: '.$customizer['header_top_color'].';}
				header.fixed #trigger .lines,header.fixed .lines:before,header.fixed .lines:after{
					background:'.$customizer['header_top_color'].';
				}
				';
        }    
}

add_filter('vibe_option_custom_sections','wplms_one_course_section');
function wplms_one_course_section($sections){
	$sections[1]['fields'][] = array(
						'id' => 'logo_fixed',
						'type' => 'upload',
						'title' => __('Upload Logo for Fixed header', 'vibe'), 
						'sub_desc' => __('Upload your logo', 'vibe'),
						'desc' => __('This Logo is shown in header.', 'vibe'),
                        'std' => VIBE_URL.'/images/logo.png'
						);
	$sections[4]['fields'][] = array(
						'id' => 'show_instructor',
						'type' => 'button_set',
						'title' => __('Hide Instructor', 'vibe'), 
						'sub_desc' => __('Hides instructor from site', 'vibe'),
						'desc' => __('Hide instructor in site.', 'vibe'),
						'options' => array('' => __('Show','vibe'),1 => __('Hide','vibe')),
						'std' => 0
						);
	return $sections;
}

add_action('wp_footer','wplms_hide_instructor_hook');

function wplms_hide_instructor_hook(){
	$show_instructor = vibe_get_option('show_instructor');
	if(isset($show_instructor) && is_numeric($show_instructor)){
		echo '<style>
			.single-course #item-admins,.item-instructor{display:none;}
			.unit_title .instructor, .unit_title ul+.instructor, #unit.page_title .instructor, #unit.page_title ul+.instructor{opacity:0;}
		</style>';
	}
}


/*==========================================================================================*/
/*   PMPro Shortcode
/*==========================================================================================*/
if (!function_exists('vibe_pmpro_levels')) {
	function vibe_pmpro_levels( $atts, $content = null ) {

		$pmpro_levels_page_id = get_option('pmpro_levels_page_id');
		if(!is_numeric($pmpro_levels_page_id))
			return;

		global $pmpro_page_name; 

        require_once(PMPRO_DIR . "/preheaders/" . $pmpro_page_name . ".php"); 
        global $pmpro_page_name;
		ob_start();
		if(file_exists(get_stylesheet_directory() . "/paid-memberships-pro/pages/" . $pmpro_page_name . ".php"))
			include(get_stylesheet_directory() . "/paid-memberships-pro/pages/" . $pmpro_page_name . ".php");
		else
			include(PMPRO_DIR . "/pages/" . $pmpro_page_name . ".php");
		
		$return = ob_get_contents();
		ob_end_clean();
        return $return;
	}
	add_shortcode('vibe_pmpro_levels', 'vibe_pmpro_levels');
}

function vibe_pmpro_getLevelCost(&$level, $tags = true, $short = false)
{
	//initial payment
	if(!$short)
		$r = sprintf(__('The price for membership is <strong>%s</strong> now', 'pmpro'), pmpro_formatPrice($level->initial_payment));
	else
		$r = sprintf(__('<strong>%s</strong> now', 'pmpro'), pmpro_formatPrice($level->initial_payment));

	//recurring part
	if($level->billing_amount != '0.00')
	{
		if($level->billing_limit > 1)
		{
			if($level->cycle_number == '1')
			{
				$r .= sprintf(__(' and then <strong>%s</strong> per %s for %d more %s.', 'pmpro'), pmpro_formatPrice($level->billing_amount), pmpro_translate_billing_period($level->cycle_period), $level->billing_limit, pmpro_translate_billing_period($level->cycle_period, $level->billing_limit));
			}
			else
			{
				$r .= sprintf(__(' and then <strong>%s/strong> every %d %s for %d more %s<.', 'pmpro'), pmpro_formatPrice($level->billing_amount), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number), $level->billing_limit, pmpro_translate_billing_period($level->cycle_period, $level->billing_limit));
			}
		}
		elseif($level->billing_limit == 1)
		{
			$r .= sprintf(__(' and then <strong>%s</strong> after %d %s.', 'pmpro'), pmpro_formatPrice($level->billing_amount), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number));
		}
		else
		{
			if( $level->billing_amount === $level->initial_payment ) {
				if($level->cycle_number == '1')
				{
					if(!$short)
						$r = sprintf(__('The price for membership is <strong>%s per %s</strong>.', 'pmpro'), pmpro_formatPrice($level->initial_payment), pmpro_translate_billing_period($level->cycle_period) );
					else
						$r = sprintf(__('<strong>%s <span>/ %s.</span></strong>', 'pmpro'), pmpro_formatPrice($level->initial_payment), pmpro_translate_billing_period($level->cycle_period) );
				}
				else
				{
					if(!$short)
						$r = sprintf(__('The price for membership is <strong>%s</strong> every %d %s.', 'pmpro'), pmpro_formatPrice($level->initial_payment), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number) );
					else
						$r = sprintf(__('<strong>%s <span>/ %s.</span></strong>', 'pmpro'), pmpro_formatPrice($level->initial_payment), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number) );
				}
			} else {
				if($level->cycle_number == '1')
				{
					$r .= sprintf(__(' and then <strong>%s</strong> per %s.', 'pmpro'), pmpro_formatPrice($level->billing_amount), pmpro_translate_billing_period($level->cycle_period));
				}
				else
				{
					$r .= sprintf(__(' and then <strong>%s</strong> every %d %s.', 'pmpro'), pmpro_formatPrice($level->billing_amount), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number));
				}
			}
		}
	}
	else
		$r .= '.';

	//add a space
	$r .= ' ';

	//trial part
	if($level->trial_limit)
	{
		if($level->trial_amount == '0.00')
		{
			if($level->trial_limit == '1')
			{
				$r .= ' ' . __('After your initial payment, your first payment is Free.', 'pmpro');
			}
			else
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first %d payments are Free.', 'pmpro'), $level->trial_limit);
			}
		}
		else
		{
			if($level->trial_limit == '1')
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first payment will cost %s.', 'pmpro'), pmpro_formatPrice($level->trial_amount));
			}
			else
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first %d payments will cost %s.', 'pmpro'), $level->trial_limit, pmpro_formatPrice($level->trial_amount));
			}
		}
	}

	//taxes part
	$tax_state = pmpro_getOption("tax_state");
	$tax_rate = pmpro_getOption("tax_rate");

	if($tax_state && $tax_rate && !pmpro_isLevelFree($level))
	{
		$r .= sprintf(__('Customers in %s will be charged %s%% tax.', 'pmpro'), $tax_state, round($tax_rate * 100, 2));
	}

	if(!$tags)
		$r = strip_tags($r);

	$r = apply_filters("pmpro_level_cost_text", $r, $level, $tags, $short);	//passing $tags and $short since v2.0
	return $r;
}
/*==========================================================================================*/
/*   ADD NEW BLOCK STYLE
/*==========================================================================================*/

add_filter('vibe_builder_thumb_styles','custom_vibe_builder_thumb_styles');  
add_filter('vibe_featured_thumbnail_style','custom_vibe_featured_thumbnail_style',1,3);

function custom_vibe_builder_thumb_styles($styles){
	$styles['modern_block'] =  VIBE_CHILD_URL.'/thumb_modern.png';
	return $styles;
}

function custom_vibe_featured_thumbnail_style($thumbnail_html,$post,$style){

	if($style == 'modern_block'){ 
        $thumbnail_html ='';
        $thumbnail_html .= '<div class="block modern_course">';
        $thumbnail_html .= '<div class="block_media">';
        $thumbnail_html .= '<a href="'.get_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID,'medium').'</a>';
        $thumbnail_html .= '</div>';
        $thumbnail_html .= '<div class="block_content">';
        $thumbnail_html .= '<h4 class="block_title"><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">'.$post->post_title.'</a></h4>';
        $thumbnail_html .= '<span>';
        $thumbnail_html .= get_the_term_list($post->ID,'course-cat','',',');
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



/*-----------------------------------------------------------------------------------*/
/*	SETUP
/*-----------------------------------------------------------------------------------*/

add_filter('wplms_required_plugins','wplms_instructor_required_plugs');

function wplms_instructor_required_plugs($plugins){
	
	$plugins[]=array(
            'name'                  => 'PMPRO', // The plugin name
            'slug'                  => 'paid-memberships-pro', // The plugin slug (typically the folder name)
            'source'                => 'https://downloads.wordpress.org/plugin/paid-memberships-pro.1.8.2.2.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        );
	return $plugins;
}

add_filter('wplms_setup_import_file_path','wplms_child_one_import_file_path',10,2);
function wplms_child_one_import_file_path($file_path,$file){
    $file_path = VIBE_CHILD_PATH.'/setup/oneinstructor.xml';
    return $file_path;
}


add_filter('wplms_data_import_url','wplms_child_one_data_import_url');
function wplms_child_one_data_import_url(){
    return VIBE_CHILD_URL.'/setup/uploads/';
}

// Options panel

add_filter('wplms_setup_options_panel','wplms_one_instructor_options');
function wplms_one_instructor_options($panel){
	$panel['layout']='boxed';
	$panel['footerbottom_right']='1';
	return $panel;
}
// Setup  Customizer 

add_action('wplms_after_sample_data_import','wplms_customizer_options',30);
function wplms_customizer_options(){ 
    $customizer_file = VIBE_CHILD_PATH.'/setup/customizer.txt';
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

    //PMPRo Levels
    
    // Setup Menus
	$wplms_menus = array(
		'top-menu'=>1,
		'main-menu'=>1,
		'mobile-menu'=>1,
		'footer-menu'=>1,
	);
	// End HomePage setup
	//Set Menus to Locations
	$vibe_menus  = wp_get_nav_menus();
	if(!empty($vibe_menus) && !empty($wplms_menus)){ // Check if menus are imported
		//Grab Menu values
		foreach($wplms_menus as $key=>$menu_item){
			global $wpdb;
			$term_id = $wpdb->get_var( $wpdb->prepare( "SELECT term_id FROM {$wpdb->terms} WHERE slug = %s LIMIT 1;", "{$key}" ) );	
			if(isset($term_id) && is_numeric($term_id)){
				$wplms_menus[$key]=$term_id;
			}else{
				unset($wplms_menus[$key]);
			}
		}
		//update the theme
		set_theme_mod( 'nav_menu_locations', $wplms_menus);
	}
	//End Menu setup
    
}