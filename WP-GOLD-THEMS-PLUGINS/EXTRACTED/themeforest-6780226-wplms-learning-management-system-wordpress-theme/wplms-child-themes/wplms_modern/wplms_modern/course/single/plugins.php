<?php 

do_action('wplms_before_single_course_plugin');
	get_header(vibe_get_header());
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
					bp_course_instructor();
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
					<?php do_action( 'bp_course_before_plugin_body' ); ?>
					<?php do_action( 'bp_course_plugin_template_content' ); ?>

					<?php do_action( 'bp_course_after_plugin_body' ); ?>

				</div><!-- #item-body -->

				<?php do_action( 'bp_after_course_plugin_content' );  ?>

				</div>
			</div><!-- .padder -->
		
		</div><!-- #container -->
	</div>
</section>	
<?php endwhile; endif; ?>
<?php 
get_footer( 'buddypress' ); 