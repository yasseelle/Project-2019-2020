<?php
/**
 * WPLMS MODERN functions and actions.
 *
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	Vibe Projects/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wplms_Modern_Init{


	public static $instance;
    
    public static function init(){
    	
        if ( is_null( self::$instance ) )
            self::$instance = new Wplms_Modern_Init();
        return self::$instance;
    }

	private function __construct(){
		add_action('wp_footer',array($this,'login_modal'));
		add_action('wp_enqueue_scripts',array($this,'load_scripts'));
		add_filter('vibe_builder_thumb_styles',array($this,'custom_vibe_builder_thumb_styles'));  
		add_filter('vibe_featured_thumbnail_style',array($this,'custom_vibe_featured_thumbnail_style'),1,3);
		add_filter('vibe_option_custom_sections',array($this,'wplms_modern_section'));
		add_action('wp_ajax_nopriv_create_user',array($this,'create_user'));
		add_action('wp_ajax_nopriv_forgot_password',array($this,'forgot_password'));
		add_filter('bp_course_single_item_view',array($this,'bp_course_single_item_view'));
		add_action('init',array($this,'init_actions'));
		add_action('widgets_init',array($this,'register_sidebars'));
		add_action('wplms_customizer_custom_css',array($this,'wplms_customizer'),10,1);		
		add_filter('wplms_course_metabox',array($this,'upload_bg'));
		add_filter('vibe_projects_registration_fields',array($this,'registration_code'));
		//add_filter('bp_course_display_rating',array($this,'bp_course_display_rating'),10,2);
		add_filter( 'template_include',array($this,'wplms_check_instructing_courses_endpoint'),99,2);
		add_action('wplms_modern_after_course_front',array($this,'wplms_modern_course_front'));
		add_action('template_redirect',array($this,'restrict_edit_course_page'),99);

		add_filter('body_class',array($this,'add_body_class'));
		add_action('wp_head',array($this,'title_background'));
		add_action('wplms_customizer_custom_css',array($this,'modern_theme_header_compatibility'),10,1);
		add_action('wplms_customizer_config',array($this,'limit_modern_theme'));
	}

	function add_body_class($class){
		$class[] = 'modern-theme';
		return $class;
	}

	function limit_modern_theme($config){
		unset($config['layouts']['course_layout']['choices']['c4']);
		unset($config['layouts']['course_layout']['choices']['c5']);
		unset($config['layouts']['directory_layout']['choices']['d4']);
		return $config;
	}
	function modern_theme_header_compatibility($customiser){
		echo 'body header.sleek.fixed,body header.standard.fixed{background:'.$customiser['header_top_bg'].' !important;}';
	}
	function title_background(){
		$url = $this->option('hero_img');
		if(empty($url))
			$url = get_stylesheet_directory_uri().'/assets/images/default.jpeg';


		global $post;
		
		if($post->post_type == 'course'){
			$img = get_post_meta($post->ID,'vibe_course_bg',true);
			if(!empty($img)){
				$bg = wp_get_attachment_image_src($img,'full');
				if(!empty($bg))
					$url = $bg[0];
			}
		}else{
			if(has_post_thumbnail() && !is_singular('product') && !is_archive() && !is_search()){
				$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
				if(!empty($img)){
					$url = $img[0];	
				}
			}
		}
		
		echo '<style>#buddypress .course_header div#item-header, #buddypress .group_header div#item-header, #buddypress .member_header div#item-header{background:url('.$url.');}#title{background:url('.$url.') !important; background-size: cover;}#title h1,#title h5,#title h3,#title a,#title,#breadcrumbs li+li:before{color:#fff !important;}</style>';

		if(function_exists('vibe_get_customizer')){
			$header = vibe_get_customizer('header_style');
			if(in_array($header,array('standard'))){
				echo '<style>#headertop,header{position:relative !important;top:auto !important;}header.fixed{position:fixed !important;top:0 !important;}</style>';
			}
		}
	}

	function init_actions(){
		remove_filter( 'comment_text', 'modify_comment');	
		if(function_exists('wplms_exlude_courses_directroy')){
            add_filter('wplms_modern_related_courses','wplms_exlude_courses_directroy');    
        }
	}

	function load_scripts(){
		if(defined('WPLMS_VERSION') && (WPLMS_VERSION == '2.0')){
			wp_enqueue_style('dashicons');
			wp_enqueue_style( 'wplms-modern-css', get_stylesheet_directory_uri().'/assets/css/wplms_modern.min.css',array('wplms-style','dashicons'));
		}else{
			wp_enqueue_style( 'wplms-modern-css', get_stylesheet_directory_uri().'/assets/css/wplms_modern.min.css');
		}
		wp_enqueue_script( 'wplms-modern-js', get_stylesheet_directory_uri().'/assets/js/wplms_modern.min.js');
	}

	function register_sidebars(){
		if(function_exists('register_sidebar')){     
		    register_sidebar( array(
				'name' => 'Member Sidebar',
				'id' => 'member',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget_title">',
				'after_title' => '</h4>',
		        'description'   => __('Sidebar Displayed on Member profile','wplms_modern')
			) );
			register_sidebar( array(
				'name' => 'Group Sidebar',
				'id' => 'group',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget_title">',
				'after_title' => '</h4>',
		        'description'   => __('Sidebar Displayed on single Group','wplms_modern')
			) );
		}
	}
	function login_modal(){
	    if(is_user_logged_in())
	      return;

	    include_once get_stylesheet_directory().'/views/login_modal.php';
	}

	function option($ref){
		if(empty($this->option))
			$this->option = get_option(THEME_SHORT_NAME);

		return $this->option[$ref];
	}

	
	function wplms_modern_section($sections){
		$sections[1]['fields'][] = array(
							'id' => 'hero_img',
							'type' => 'upload',
							'title' => __('Upload Default Background image', 'wplms_modern'), 
							'sub_desc' => __('Upload big default background image', 'wplms_modern'),
							'desc' => __('This image is shown in header.', 'wplms_modern'),
	                        'std' => ''
							);
		$sections[1]['fields'][] = array(
							'id' => 'alternate_logo',
							'type' => 'upload',
							'title' => __('Upload Alternate Logo [Modern Theme]', 'wplms_modern'), 
							'sub_desc' => __('upload alternate logo', 'wplms_modern'),
							'desc' => '',
							'std' => ''
							);
		$sections[11]['fields'][] = array(
							'id' => 'disable_ajax_registration',
							'title' => __('Disable Ajax Registration', 'wplms_modern'), 
							'sub_desc' => __('use standard BuddyPress registration', 'wplms_modern'),
							'desc' => __('Enables standard buddypress registration on clicking Create account in login popup', 'wplms_modern'),
							'type' => 'button_set',
							'options' => array('' => __('No, keep enabled','wplms_modern'),1 => __('Yes, disable ajax registration','wplms_modern')),
							'std' => ''
							);
		$sections[11]['fields'][] = array(
							'id' => 'registration_code',
							'type' => 'text',
							'title' => __('Registration Code for Ajax', 'wplms_modern'), 
							'sub_desc' => __('signup registration code', 'wplms_modern'),
							'desc' => __('Enter a registration code for signup, leave blank for default', 'wplms_modern'),
							'std' => ''
							);
		$v_thumb_styles = apply_filters('vibe_builder_thumb_styles',array(
                            ''=> plugins_url('images/thumb_1.png',__FILE__),
                            'course'=> plugins_url('images/thumb_2.png',__FILE__),
                            'course2'=> plugins_url('images/thumb_8.png',__FILE__),
                            'side'=> plugins_url('images/thumb_3.png',__FILE__),
                            'blogpost'=> plugins_url('images/thumb_6.png',__FILE__),
                            'images_only'=> plugins_url('images/thumb_4.png',__FILE__),
                            'testimonial'=> plugins_url('images/thumb_5.png',__FILE__),
                            'event_card'=> plugins_url('images/thumb_7.png',__FILE__),
                                ));
		$options = array_keys($v_thumb_styles);
		$featured_style = array();
		foreach($options as $option){
			if(!empty($option))
				$featured_style[$option]=$option;
		}
		$featured_style[]= __('Remove Related courses block','wplms_modern');
		$sections[4]['fields'][] = array(
							'id' => 'related_course_style',
							'type' => 'select',
							'options'=>$featured_style,
							'title' => __('Related Course style', 'wplms_modern'), 
							'sub_desc' => '',
							'desc' => __('related course block in single course page style', 'wplms_modern'),
							'std' => ''
							);
		return $sections;
	}


	function custom_vibe_builder_thumb_styles($styles){
		$styles['modern1'] =  get_stylesheet_directory_uri().'/assets/images/thumb_modern.png';
		return $styles;
	}

	function custom_vibe_featured_thumbnail_style($thumbnail_html,$post,$style){

		if($style == 'modern1'){ 
			
	        $thumbnail_html ='';
	        $thumbnail_html .= '<div class="block modern_course"  data-id="'.$post->ID.'">';
	        $thumbnail_html .= '<div class="block_media">';
	        $thumbnail_html .= '<a href="'.get_permalink($post->ID).'">'.featured_component($post->ID,'medium').'</a>';
	        $thumbnail_html .= '</div>';
	        $thumbnail_html .= '<div class="block_content">';
	        $thumbnail_html .= '<h4 class="block_title"><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">'.$post->post_title.'</a></h4>';
	        $thumbnail_html .= '<div class="course_price">'.bp_course_get_course_credits().'</div>';
	        $thumbnail_html .= '<a href="'.bp_core_get_user_domain($post->post_author).'" class="modern_course_instructor" 
	        title="'.sprintf(__('Course Author %s','wplms_modern'),bp_core_get_user_displayname($post->post_author )).'">'.
	        bp_core_fetch_avatar(array(
						'item_id' => $post->post_author, 
						'type' => 'thumb', 
						'width' => 64, 
						'height' => 64)).'</a>';

	        $thumbnail_html .= '<div class="course_meta">';
	        $reviews = get_post_meta(get_the_ID(),'average_rating',true);
			$students = get_post_meta(get_the_ID(),'vibe_students',true);
			$thumbnail_html .='<span class="dashicons dashicons-groups">'.$students.'</span> ';
			$thumbnail_html .='<div class="modern-star-rating">';
			for($i=1;$i<=5;$i++){
				if($reviews >= 1){
					$thumbnail_html .= '<span class="dashicons dashicons-star-filled"></span>';
				}elseif(($reviews < 1 ) && ($reviews >= 0.4 ) ){
					$thumbnail_html .= '<span class="dashicons dashicons-star-half"></span>';
				}else{
					$thumbnail_html .= '<span class="dashicons dashicons-star-empty"></span>';
				}
				$reviews--;
			}
			$thumbnail_html .= '</div></div>';
	        $thumbnail_html .= '</div></div>';
	    }
	    return $thumbnail_html;
	}
	function vibe_better_comments($comment, $args, $depth) {
	    $GLOBALS['comment'] = $comment;
	   ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
	       <div class="comment-body-inner">
	           <div class="comment-avatar">
	             <?php echo get_avatar($comment, $size = '120', $default = ''); ?>
	           </div><!-- END avatar -->
	           <div class="comment-body-content">
	             <div class="comment-meta">
	               <?php echo get_comment_author_link(); 
	                     echo '<a href="'.htmlspecialchars( get_comment_link( $comment->comment_ID ) ) .'">'.sprintf(__('%1$s at %2$s','wplms_modern'), get_comment_date(),  get_comment_time()).'</a>'; 
	                     comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); 
	                     edit_comment_link(__('(Edit)','wplms_modern'),'  ','');
	               ?>
	             </div><!-- END comment-author vcard -->
	             <?php if ($comment->comment_approved == '0') : ?>
	               <em><?php _e('Your comment is awaiting moderation.','wplms_modern') ?></em>
	               <br />
	             <?php endif; ?>
	             <div class="comment-text">
	             <?php comment_text() ?>
	             </div>
	          </div> 
	       </div>
	     </div>
	   </li>
	   <?php
	 }

	function vibe_reviews ($comment, $args, $depth) {
	    $GLOBALS['comment'] = $comment;
	   ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
	       <div class="comment-body-inner">
	           <div class="comment-avatar">
	             <?php echo get_avatar($comment, $size = '120', $default = ''); ?>
	           </div><!-- END avatar -->
	           <div class="comment-body-content">
	             <div class="comment-meta">
	               <?php echo get_comment_author_link(); 
	                     echo '<a href="'.htmlspecialchars( get_comment_link( $comment->comment_ID ) ) .'">'.sprintf(__('%1$s at %2$s','wplms_modern'), get_comment_date(),  get_comment_time()).'</a>'; 
	                     comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); 
	                     edit_comment_link(__('(Edit)','wplms_modern'),'  ','');
	               ?>
	             </div><!-- END comment-author vcard -->
	             <?php if ($comment->comment_approved == '0') : ?>
	               <em><?php _e('Your comment is awaiting moderation.','wplms_modern') ?></em>
	               <br />
	             <?php endif; ?>
	             <div class="comment-text">
	             <?php
   					$commenttitle = get_comment_meta( $comment->comment_ID, 'review_title', true );
   					$commentrating = get_comment_meta( $comment->comment_ID, 'review_rating', true );
      				echo '<h3>'.$commenttitle.'</h3>';
      				echo '<div class="modern-star-rating">';
			          for($i=1;$i<=5;$i++){
			            if($commentrating >= 1){
			              echo '<span class="dashicons dashicons-star-filled"></span>';
			            }elseif(($commentrating < 1 ) && ($commentrating >= 0.3 ) ){
			              echo '<span class="dashicons dashicons-star-half"></span>';
			            }else{
			              echo '<span class="dashicons dashicons-star-empty"></span>';
			            }
			            $commentrating--;
			          }
			          echo '</div>';
	             	comment_text() ?>
	             </div>
	          </div> 
	       </div>
	     </div>
	   </li>
	   <?php
	 }

	function create_user(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security')){
	       _e('Security check Failed. Contact Administrator.','wplms_modern');
	       die();
	    }

	    $disable_ajax_registration = vibe_get_option('disable_ajax_registration');
        if(!empty($disable_ajax_registration))
        	return;

	    $fields = json_decode(stripslashes($_POST['fields']));
	    $user_fields = array();
	    $profile_fields = array();
	    $meta_fields = array();
	    $all_fields = array();

	    foreach($fields as $field){
	    	$all_fields[$field->id] = $field->value;
	    	if(in_array($field->id,array('user_login','user_email','user_pass','display_name'))){
	    		$user_fields[$field->id] = $field->value;
	    	}
	    }

	    $registration_code = self::option('registration_code');
	    if(!empty($registration_code)){
	    	if($all_fields['registration_code'] != $registration_code){
	    		_e('Registration code mismatch','wplms_modern');
	    		die;
	    	}
	    }
	    
	    if(!username_exists($user_fields['user_login'])){
	    	if( email_exists( $user_fields['user_email'] )) { // user is a member 
				  _e('User email already exists','wplms_modern');
				  die();
		    }else{ 
			    $user_id = wp_create_user( $user_fields['user_login'], $user_fields['user_pass'], $user_fields['user_email'] );
			    if(is_numeric($user_id)){
			    	$user = get_userdata($user_id);
				    wp_set_current_user( $user->ID, $user->user_login );
					wp_set_auth_cookie( $user->ID, $remember );
					do_action('vibe_projects_user_registered',$all_fields,$user_id);
					echo 1;	
			    }else{
			    	if(is_wp_error($user_id)){
			    		$error_string = $user_id->get_error_message();
   						echo $error_string;
			    	}
			    }
			    
				die();
		    }
	    }else{
	    	_e('Username already exists','wplms_modern');
	    }
		
		die();
    }

    function forgot_password(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security')){
	       _e('Security check Failed. Contact Administrator.','wplms_modern');
	       die();
	    }

	    $fields = json_decode(stripslashes($_POST['fields']));
	    
	    if(!empty($_POST['user_login'])){
	    	$user = get_user_by( 'email', $_POST['user_login']);
	    	if(is_wp_error($user)){
	    		$error_string = $message->get_error_message();
    			echo '<div class="message error">' . $error_string . '</div>';
	    	}else{
	    		$message = vibe_projects_retrieve_password();
	    		if(is_wp_error($message)){
	    			$error_string = $message->get_error_message();
	    			echo '<div class="message error">' . $error_string . '</div>';
	    		}else{
	    			echo '<div class="message success">'.__('Password reset link has been sent to your email.','wplms_modern').'</div>';
	    		}
	    	}
	    }else{
	    	echo '<div class="message error">'.__('Email address is required for password reset.','wplms_modern').'</div>';
	    }

	    die();
    } 

    function bp_course_single_item_view($flag){
    	global $post,$bp;
    	$course_post_id = $post->ID;
   		$course_classes = apply_filters('bp_course_single_item','modern_course_single_item',get_the_ID());

   		if(current_user_can('edit_posts') && in_array($post->post_status,array('draft','pending')) ){
			$user_id = get_current_user_id();
			$instructors = array($post->post_author);
			$instructors = apply_filters('wplms_course_instructors',$instructors,$post->ID);
			if(!in_array($user_id,$instructors)){
				return 1;
			}
		}
		if(bp_is_my_profile() && bp_is_current_action( BP_COURSE_INSTRUCTOR_SLUG ))
			return 1;

   		?>	
   		<li class="<?php echo $course_classes; ?>">
   			<div class="row">
				<div class="col-md-4">
					<div class="item-avatar" data-id="<?php echo get_the_ID(); ?>" itemprop="photo">
						<?php bp_course_avatar(); ?>
					</div>
				</div>

				<div class="col-md-6">
					<div class="item-title">
						<?php bp_course_title(); if(get_post_status() != 'publish'){echo '<i> ( '.get_post_status().' ) </i>';} ?>
					</div>
					<div class="item-desc"><?php 
					echo get_the_term_list(get_the_ID(),'course-cat','<ul class="course-category"><li>','</li><li>','</li></ul>');
					bp_course_desc(); 
					$instructors = apply_filters('wplms_course_instructors',get_post_field('post_author',get_the_ID()),get_the_ID());
					if(!is_array($instructors)){
						$instructors = array($instructors);
					}
					echo '<div class="instructors">';
					foreach($instructors as $instructor){
						echo '<a href="'.bp_core_get_user_domain($instructor).'" title="'.bp_core_get_user_displayname($instructor).'">'.bp_core_fetch_avatar(array(
    						'item_id' => $instructor, 
    						'type' => 'thumb')).'</a>';
					}
					?></div></div>
				</div>
				<div class="col-md-2">
					<div class="course-meta">
						<?php
							$reviews = get_post_meta(get_the_ID(),'average_rating',true);
							$students = get_post_meta(get_the_ID(),'vibe_students',true);
							$seats = get_post_meta(get_the_ID(),'vibe_max_students',true);
							$date = get_post_meta(get_the_ID(),'vibe_start_date',true);
							$duration = get_post_meta(get_the_ID(),'vibe_duration',true);
							$course_duration_parameter = apply_filters('vibe_course_duration_parameter',86400);

							echo '<ul>
								<li><span class="dashicons dashicons-groups"></span> '.$students.((empty($seats) || $seats > 9998 )?'':' / '.$seats).'</li>
								<li><span class="dashicons dashicons-clock"></span> '.(($duration > 9998)?__('UNLIMITED','wplms_modern'):$duration.' '.calculate_duration_time($course_duration_parameter)).'</li>';

							if(strtotime($date) > time()){
								echo '<li>'. date_i18n( get_option( 'date_format' ), strtotime( $date ) ).'</li>';
							}

							echo '</ul><div class="modern-star-rating">';
							for($i=1;$i<=5;$i++){
								if($reviews >= 1){
									echo '<span class="dashicons dashicons-star-filled"></span>';
								}elseif(($reviews < 1 ) && ($reviews >= 0.4 ) ){
									echo '<span class="dashicons dashicons-star-half"></span>';
								}else{
									echo '<span class="dashicons dashicons-star-empty"></span>';
								}
								$reviews--;
							}
							echo '</div>';
														
						?>
						<div class="item-credits">
							<?php 
							if(bp_is_my_profile() && (function_exists('wplms_user_course_active_check') && wplms_user_course_active_check(get_current_user_id(),$course_post_id))){
								the_course_button($course_post_id);
							}else{
								bp_course_credits(); 	
							}
							?>
						</div>
					</div>
				</div>	
				<?php do_action( 'bp_directory_course_item' ); ?>
			</div>
		</li>	
   	<?php
   		return 1;
    }

    function get_students_undertaking($args){
    	$defaults = array(
		'course_id'=>get_the_ID(),
		'number' => 9,
		'user_id'=>get_current_user_id()
		);

		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );
		global $wpdb;
		$course_meta=$wpdb->get_results($wpdb->prepare("SELECT DISTINCT user_id FROM {$wpdb->usermeta} WHERE meta_key = %s ORDER BY user_id DESC LIMIT %d, %d",'course_status'.$course_id,0,$number), ARRAY_A);
		
		$course_members = array();
		if(!empty($course_meta)){
			foreach($course_meta as $meta){
				if(is_numeric($meta['user_id']))  // META KEY is NUMERIC ONLY FOR USERIDS
					$course_members[] = $meta['user_id'];
			}
		}
		return $course_members;
    }



    function get_rating_breakup($id = null){
    	if(empty($id))
    		$id = get_the_ID();

    	global $wpdb;
    	$breakup = $wpdb->get_results($wpdb->prepare("SELECT meta_value as val,count(meta_value) as count FROM {$wpdb->commentmeta} WHERE meta_key = %s AND comment_id IN (SELECT comment_ID FROM {$wpdb->comments} WHERE comment_post_ID = %d) GROUP BY meta_value LIMIT 0,999",'review_rating',$id));

    	return $breakup;
    }

    function wplms_customizer($css){
    	if(isset($css['primary_bg'])){
    		echo '.directory:not(.d2,.d3,.d4,.d5) #buddypress div.item-list-tabs ul>li.selected>a,#buddypress div.item-list-tabs ul>li>a:hover{color:'.$css['primary_bg'].'}';
    	}
    }

    function upload_bg($metabox){
    	$metabox['vibe_course_bg']=array( // Text Input
			'label'	=> __('Course Background image','wplms_modern'), // <label>
			'desc'	=> __('Background image','wplms_modern'), // description
			'id'	=> 'vibe_course_bg',
			'type'	=> 'image' 
		);
    	return $metabox;
    }
    function registration_code($fields){
    	$registration_code =  self::option('registration_code');
    	if(!empty($registration_code)){
    		$fields[] = array(
                          'id'=> 'registration_code',
                          'label'=> __('Registration Code','wplms_modern'),
                          'placeholder'=> __('Enter Registration code','wplms_modern'),
                          'field' => 'text',
                          'validation'=>'text',
                          'set' => 'meta',
                          'class'=> 'form-control no-border',
                          'required' => 1,
                        );
    	}
    	return $fields;
    }
    function bp_course_display_rating($meta,$reviews){
    	$reviews = 5 + $reviews;
		$thumbnail_html .='<div class="modern-star-rating">';
		for($i=1;$i<=5;$i++){
			if($reviews >= 1){
				$thumbnail_html .= '<span class="dashicons dashicons-star-filled"></span>';
			}elseif(($reviews < 1 ) && ($reviews >= 0.4 ) ){
				$thumbnail_html .= '<span class="dashicons dashicons-star-half"></span>';
			}else{
				$thumbnail_html .= '<span class="dashicons dashicons-star-empty"></span>';
			}
			$reviews--;
		}
		$thumbnail_html .= '</div>';
		return $thumbnail_html;
	}
	
	function wplms_check_instructing_courses_endpoint($template){
	  if(!is_author())
	    return $template;
	  global $wp_query;
	  $instructing_courses=apply_filters('wplms_instructing_courses_endpoint','instructing-courses');
	  if ( !isset( $wp_query->query_vars[$instructing_courses] ) ){
	     $wp_query->set( 'post_type',  array('post') );
	     return get_stylesheet_directory().'/author.php';
	  }else{
	    $wp_query->set( 'post_type',  array('course') );
	    return get_stylesheet_directory().'/author-course.php';
	  }
	}

	function get_instructor_student_count($instructor_id){
		global $wpdb;
		$count = $wpdb->get_var("SELECT sum(meta_value) FROM {$wpdb->postmeta} as m LEFT JOIN {$wpdb->posts} as p ON p.ID = m.post_id WHERE p.post_author = $instructor_id AND p.post_status = 'publish' AND p.post_type = 'course' AND m.meta_key = 'vibe_students'");
		if(empty($count))
			$count = 0;

		return $count;
	}

	function get_instructor_average_rating($instructor_id){
		global $wpdb;
		$count = $wpdb->get_var("SELECT avg(meta_value) FROM {$wpdb->postmeta} as m LEFT JOIN {$wpdb->posts} as p ON p.ID = m.post_id WHERE p.post_author = $instructor_id AND p.post_status = 'publish' AND p.post_type = 'course' AND m.meta_key = 'average_rating'");
		if(empty($count))
			$count = 0;

		return $count;
	}

	function wplms_modern_course_front(){
		$style = vibe_get_option('related_course_style');
		if(isset($style) && empty($style))
			return;

		?>
		<div class="related_courses">
		<h2><?php _e('Related Courses','wplms_modern');?></h2>
		<?php
			$terms = wp_get_post_terms(get_the_ID(),'course-cat');
			$categories = array();
			if(!empty($terms)){
				foreach($terms as $term)
				$categories[] = $term->term_id;
			}
			$args = apply_filters('wplms_modern_related_courses',array(
				'post_type' => 'course',
				'posts_per_page'=>3,
				'post__not_in'=>array(get_the_ID()),
				'tax_query' => array(
						'relation' => 'OR',
						array(
							'taxonomy' => 'course-cat',
							'field'    => 'id',
							'terms'    => $categories,
						),
				),
				));
			$courses = new WP_Query($args);
			
			if($courses->have_posts()):
			?>
			<ul class="row">
			<?php	
			while($courses->have_posts()): $courses->the_post();
			global $post;
			echo '<li class="col-md-4">';
			

			if(empty($style))
				$style = 'modern1';

			echo thumbnail_generator($post,$style,'medium');
			echo '</li>';
			endwhile;
			?>
			</ul>
			<?php
			else:
				?>
			<div class="message">
			<p><?php _e('No related courses found','wplms_modern');?></p>
			</div>
			<?php
			endif;
			wp_reset_postdata();
		?>
		</div>
		<?php
	}

	function restrict_edit_course_page(){
		if(is_page()){
			$id =  self::option('create_course');
			if(!empty($id) && is_page($id)){
				if(!is_user_logged_in() || !current_user_can('edit_posts')){
					wp_die(__('Access denied','wplms_modern'));
				}
			}
		}
	}
}

$vibe = Wplms_Modern_Init::init();

if(!function_exists('vibe_better_comments')){
	function vibe_better_comments($comment, $args, $depth){
		Wplms_Modern_Init::vibe_better_comments($comment, $args, $depth);
	}
}

if(!function_exists('vibe_reviews')){
	function vibe_reviews($comment, $args, $depth){
		Wplms_Modern_Init::vibe_reviews($comment, $args, $depth);
	}
}


/**
 * COPY OF RETRIVE PASSWORD FROM WP LOGIN ..
 * 
 * Handles sending password retrieval email to user.
 *
 * @global wpdb         $wpdb      WordPress database abstraction object.
 * @global PasswordHash $wp_hasher Portable PHP password hashing framework.
 *
 * @return bool|WP_Error True: when finish. WP_Error on error
 */
function vibe_projects_retrieve_password() {
	global $wpdb, $wp_hasher;

	$errors = new WP_Error();

	if ( empty( $_POST['user_login'] ) ) {
		$errors->add('empty_username', __('<strong>ERROR</strong>: Enter a username or e-mail address.','wplms_modern'));
	} elseif ( strpos( $_POST['user_login'], '@' ) ) {
		$user_data = get_user_by( 'email', trim( $_POST['user_login'] ) );
		if ( empty( $user_data ) )
			$errors->add('invalid_email', __('<strong>ERROR</strong>: There is no user registered with that email address.','wplms_modern'));
	} else {
		$login = trim($_POST['user_login']);
		$user_data = get_user_by('login', $login);
	}

	/**
	 * Fires before errors are returned from a password reset request.
	 *
	 * @since 2.1.0
	 */
	do_action( 'lostpassword_post' );

	if ( $errors->get_error_code() )
		return $errors;

	if ( !$user_data ) {
		$errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid username or e-mail.','wplms_modern'));
		return $errors;
	}

	// Redefining user_login ensures we return the right case in the email.
	$user_login = $user_data->user_login;
	$user_email = $user_data->user_email;

	/**
	 * Fires before a new password is retrieved.
	 *
	 * @since 1.5.0
	 * @deprecated 1.5.1 Misspelled. Use 'retrieve_password' hook instead.
	 *
	 * @param string $user_login The user login name.
	 */
	do_action( 'retreive_password', $user_login );

	/**
	 * Fires before a new password is retrieved.
	 *
	 * @since 1.5.1
	 *
	 * @param string $user_login The user login name.
	 */
	do_action( 'retrieve_password', $user_login );

	/**
	 * Filter whether to allow a password to be reset.
	 *
	 * @since 2.7.0
	 *
	 * @param bool true           Whether to allow the password to be reset. Default true.
	 * @param int  $user_data->ID The ID of the user attempting to reset a password.
	 */
	$allow = apply_filters( 'allow_password_reset', true, $user_data->ID );

	if ( ! $allow ) {
		return new WP_Error( 'no_password_reset', __('Password reset is not allowed for this user','wplms_modern') );
	} elseif ( is_wp_error( $allow ) ) {
		return $allow;
	}

	// Generate something random for a password reset key.
	$key = wp_generate_password( 20, false );

	/**
	 * Fires when a password reset key is generated.
	 *
	 * @since 2.5.0
	 *
	 * @param string $user_login The username for the user.
	 * @param string $key        The generated password reset key.
	 */
	do_action( 'retrieve_password_key', $user_login, $key );

	// Now insert the key, hashed, into the DB.
	if ( empty( $wp_hasher ) ) {
		require_once ABSPATH . WPINC . '/class-phpass.php';
		$wp_hasher = new PasswordHash( 8, true );
	}
	$hashed = time() . ':' . $wp_hasher->HashPassword( $key );
	$wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $user_login ) );

	$message = __('Someone requested that the password be reset for the following account:','wplms_modern') . "\r\n\r\n";
	$message .= network_home_url( '/' ) . "\r\n\r\n";
	$message .= sprintf(__('Username: %s','wplms_modern'), $user_login) . "\r\n\r\n";
	$message .= __('If this was a mistake, just ignore this email and nothing will happen.','wplms_modern') . "\r\n\r\n";
	$message .= __('To reset your password, visit the following address:','wplms_modern') . "\r\n\r\n";
	$message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

	if ( is_multisite() )
		$blogname = $GLOBALS['current_site']->site_name;
	else
		/*
		 * The blogname option is escaped with esc_html on the way into the database
		 * in sanitize_option we want to reverse this for the plain text arena of emails.
		 */
		$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

	$title = sprintf( __('[%s] Password Reset','wplms_modern'), $blogname );

	/**
	 * Filter the subject of the password reset email.
	 *
	 * @since 2.8.0
	 *
	 * @param string $title Default email title.
	 */
	$title = apply_filters( 'retrieve_password_title', $title );

	/**
	 * Filter the message body of the password reset mail.
	 *
	 * @since 2.8.0
	 * @since 4.1.0 Added `$user_login` and `$user_data` parameters.
	 *
	 * @param string  $message    Default mail message.
	 * @param string  $key        The activation key.
	 * @param string  $user_login The username for the user.
	 * @param WP_User $user_data  WP_User object.
	 */
	$message = apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data );

	if ( $message && !wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) )
		wp_die( __('The e-mail could not be sent.','wplms_modern') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function.','wplms_modern') );

	return true;
}


function wplms_modern_get_header(){
	if(function_exists('vibe_get_header')){
		return vibe_get_header();
	}
	return '';
}

function wplms_modern_get_footer(){
	if(function_exists('vibe_get_footer')){
		return vibe_get_footer();
	}
	return '';
}

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}