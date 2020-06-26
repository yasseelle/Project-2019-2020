<?php 
	get_header( wplms_modern_get_header() );
	$vibe = Wplms_Modern_Init::init();
	$bg = get_post_meta(get_the_ID(),'vibe_course_bg',true);
	if(empty($bg)){
		$url = $vibe->option('hero_img');
	}else{
		$url = wp_get_attachment_image_src($bg,'full');
	}
?>
<?php if ( bp_course_has_items() ) : while ( bp_course_has_items() ) : bp_course_the_item(); ?>

<section id="content">
	<div id="buddypress">
		<div class="course_header">

			<?php do_action( 'bp_before_course_home_content' ); ?>

			<div id="item-header" role="complementary" <?php echo (empty($url)?'':'style="background:url('.(is_array($url)?$url[0]:$url).') 50% 50% no-repeat;"');?>> 

				<?php locate_template( array( 'course/single/course-header.php' ), true ); ?>

			</div><!-- #item-header -->
		</div>
		<div id="item-nav">
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<div class="container">
			        <div class="row">
			            <div class="col-md-9 col-md-offset-3">
							<ul>
								<?php bp_get_options_nav(); ?>
								<?php

								if(function_exists('bp_course_nav_menu'))
									bp_course_nav_menu();
								else{
								?>	
								<li id="home" class="<?php echo (!isset($_GET['action'])?'selected':''); ?>"><a href="<?php bp_course_permalink(); ?>"><?php  _e( 'Home', 'wplms_modern' ); ?></a></li>
								<li id="curriculum" class="<?php echo (($_GET['action']=='curriculum')?'selected':''); ?>"><a href="<?php bp_course_permalink(); ?>?action=curriculum"><?php  _e( 'Curriculum', 'wplms_modern' ); ?></a></li>
								<li id="members" class="<?php echo (($_GET['action']=='members')?'selected':''); ?>"><a href="<?php bp_course_permalink(); ?>?action=members"><?php  _e( 'Members', 'wplms_modern' ); ?></a></li>
								
								<?php
								}
								$vgroup=get_post_meta(get_the_ID(),'vibe_group',true);
								if(isset($vgroup) && $vgroup && function_exists('groups_get_group')){
									$group=groups_get_group(array('group_id'=>$vgroup));
								?>
								<li id="group"><a href="<?php echo bp_get_group_permalink($group); ?>"><?php  _e( 'Group', 'wplms_modern' ); ?></a></li>
								<?php
								}
								$forum=apply_filters('wplms_course_forum_privacy',get_post_meta(get_the_ID(),'vibe_forum',true));
								if(isset($forum) && $forum){
									//echo '<li id="forum" class="'.(($_GET['action']=='forum')?'selected':'').'"><a href="?action=forum">'._e( 'Forum', 'wplms_modern' ).'</a></li>';
								?>
								<li id="forum"><a href="<?php echo get_permalink($forum); ?>"><?php  _e( 'Forum', 'wplms_modern' ); ?></a></li>
								<?php 
								}
								if(is_super_admin() || is_instructor()){
									?>
									<li id="admin" class="<?php echo ((isset($_GET['action']) && $_GET['action']=='admin')?'selected':''); ?>"><a href="<?php bp_course_permalink(); ?>?action=admin"><?php  _e( 'Admin', 'wplms_modern' ); ?></a></li>
									<?php
								}
								?>
								<?php do_action( 'bp_course_options_nav' ); ?>
							</ul>
						</div>
					</div><!-- #item-nav -->
				</div>
			</div>		
		</div>
	    <div class="container">
	        <div class="row">
	           <div class="col-md-3 col-sm-4">	
	           <div class="course_essentials">
					<?php 
					global $post;
					$instructor = apply_filters('wplms_course_instructors',get_post_field('post_author',$post->ID),$post->ID);
					if(!is_array($instructor)){
						$instructor = array($instructor);
					}
					foreach($instructor as $instructor_id){
						if(function_exists('vibe_get_option'))
							$field = vibe_get_option('instructor_field');
						else
							$field = 'Speciality';	

						$displayname = bp_core_get_user_displayname($instructor_id);
						$special='';
						if(bp_is_active('xprofile'))
						$special = bp_get_profile_field_data('field='.$field.'&user_id='.$instructor_id);

						?>
					<div class="instructor_course">
						<div class="item-avatar"><?php echo bp_course_get_instructor_avatar(array('item_id'=>$instructor_id)) ?></div>
						<h5 class="course_instructor">
						<a href="<?php echo bp_core_get_user_domain($instructor_id); ?>"><?php echo $displayname; ?><span><?php echo $special; ?></span></a>
						</h5>
						<?php
						echo apply_filters('wplms_instructor_meta','',$instructor_id);
						$instructor_about = vibe_get_option('instructor_about');
						if(bp_is_active('xprofile')){
							$data = apply_filters('the_content',bp_get_profile_field_data('field='.$instructor_about.'&user_id='.$instructor_id));
							echo '<div class="instructor_more">'.$data.'<a class="more_description link" data-default="'.__('Show Less','wplms_modern').'">'.__('Show More','wplms_modern').'</a></div>';			
						}
						?>
					</div>
						<?php
					}
					the_course_details(); ?>
				</div>
				<div class="students_undertaking">
					<?php
					$students_undertaking = $vibe->get_students_undertaking(array('number'=>9));
					$students=get_post_meta(get_the_ID(),'vibe_students',true);

					echo '<strong>'.$students.__(' STUDENTS ENROLLED','wplms_modern').'</strong>';

					echo '<ul>';
					$i=0;
					foreach($students_undertaking as $student){
						$i++;
						echo '<li>'.get_avatar($student).'</li>';
						if($i>5)
							break;
					}
					echo '</ul>';
					?>
				</div>
			 	<?php
			 		$sidebar = apply_filters('wplms_sidebar','coursesidebar',get_the_ID());
	                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
               	<?php endif; ?>
			</div>
				<div class="col-md-9 col-sm-8">	
				<?php do_action( 'template_notices' ); ?>
				<div id="item-body">

					<?php 
					
					do_action( 'bp_before_course_body' );

					/**
					 * Does this next bit look familiar? If not, go check out WordPress's
					 * /wp-includes/template-loader.php file.
					 *
					 * @todo A real template hierarchy? Gasp!
					 */

					if(isset($_GET['action']) && $_GET['action']):

						switch($_GET['action']){
							case 'curriculum':
								locate_template( array( 'course/single/curriculum.php'  ), true );
							break;
							case 'members':
								locate_template( array( 'course/single/members.php'  ), true );
							break;
							case 'events':
								locate_template( array( 'course/single/events.php'  ), true );
							break;
							case 'forum':
								locate_template( array( 'course/single/forums.php'  ), true );
							break;
							case 'admin':
								$uid = bp_loggedin_user_id();
								$authors=array($post->post_author);
								$authors = apply_filters('wplms_course_instructors',$authors,$post->ID);
								
								if(current_user_can( 'manage_options' ) || in_array($uid,$authors)){
									locate_template( array( 'course/single/admin.php'  ), true );	
								}else{
									locate_template( array( 'course/single/front.php' ),true );
								}
							break;
							default:
								$action = $_GET['action']; 
								$template = array( 'course/single/front.php' );
								$template = apply_filters('wplms_course_locate_template',$template,$action);

								if (is_array($template) && isset($template[0]) && file_exists($template[0])) {
									locate_template( $template,true );
								} else {
									locate_template( array( 'course/single/front.php' ),true );
								}
							break;
						}
						do_action('wplms_load_templates');
					else :
						
						if ( isset($_POST['review_course']) && isset($_POST['review']) && wp_verify_nonce($_POST['review'],get_the_ID()) ){
							 global $withcomments;
						      $withcomments = true;
						      ?>
						      <div class="course_reviews">
									<?php
										 comments_template('/course-review.php',true);
									?>
								</div>
						      <?php
						}else if(isset($_POST['submit_course']) && isset($_POST['review']) && wp_verify_nonce($_POST['review'],get_the_ID())){ // Only for Validation purpose

							bp_course_check_course_complete();
							$user_id=get_current_user_id();
							
						// Looking at home location
						}else if ( bp_is_course_home() ){

							// Use custom front if one exists
							$custom_front = locate_template( array( 'course/single/front.php' ) );
							if     ( ! empty( $custom_front   ) ) : load_template( $custom_front, true );
							
							elseif ( bp_is_active( 'structure'  ) ) : locate_template( array( 'course/single/structure.php'  ), true );

							// Otherwise show members
							elseif ( bp_is_active( 'members'  ) ) : locate_template( array( 'course/single/members.php'  ), true );

							endif;

						// Not looking at home
						}else {

							// Course Admin/Instructor
							if     ( bp_is_course_admin_page() ) : locate_template( array( 'course/single/admin.php'        ), true );

								// Course Members
							elseif ( bp_is_course_members()    ) : locate_template( array( 'course/single/members.php'      ), true );

							// Anything else (plugins mostly)
							else                                : locate_template( array( 'course/single/plugins.php'      ), true );

							endif;
						}
					endif;
						
					do_action( 'bp_after_course_body' ); ?>

				</div><!-- #item-body -->

				<?php do_action( 'bp_after_course_home_content' ); ?>

				</div>
			</div><!-- .padder -->
		
		</div><!-- #container -->
	</div>
</section>	
<?php endwhile; endif; ?>
<?php 
get_footer( wplms_modern_get_footer() ); 