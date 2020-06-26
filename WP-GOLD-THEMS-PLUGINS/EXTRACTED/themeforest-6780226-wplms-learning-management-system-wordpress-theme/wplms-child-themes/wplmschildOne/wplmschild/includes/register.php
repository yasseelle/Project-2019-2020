<?php
/* REGISTER FILE 
Registers Scripts/Styles in WPLMS
*/


add_action('wp_enqueue_scripts', 'vibe_wplms_child_js');
function vibe_wplms_child_js(){
	wp_enqueue_script( 'child-custom-js', get_stylesheet_directory_uri().'/custom.js',array('jquery'));	
}


add_filter('vibe_builder_thumb_styles','custom_vibe_builder_thumb_styles');  
add_filter('vibe_featured_thumbnail_style','custom_vibe_featured_thumbnail_style',1,3);

function custom_vibe_builder_thumb_styles($styles){
	$styles['modern_block1'] =  VIBE_CHILD_URL.'/images/thumb_modern.png';
	return $styles;
}

function custom_vibe_featured_thumbnail_style($thumbnail_html,$post,$style){

	if($style == 'modern_block1'){ 
        $thumbnail_html ='';
        $thumbnail_html .= '<div class="block modern_course">';
        $thumbnail_html .= '<div class="block_media">';
        $thumbnail_html .= '<a href="'.get_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID,'medium').'</a>';
        $thumbnail_html .= '<a href="'.bp_core_get_user_domain($post->post_author) .'" class="course_block_instructor">'.bp_course_get_instructor_avatar().'</a>';
        $thumbnail_html .= '</div>';
        $thumbnail_html .= '<div class="block_content">';
        $thumbnail_html .= '<h4 class="block_title"><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">'.$post->post_title.'</a></h4>';
        $thumbnail_html .= bp_course_get_type();
        $thumbnail_html .= '</div></div>';
    }
    return $thumbnail_html;
}


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
