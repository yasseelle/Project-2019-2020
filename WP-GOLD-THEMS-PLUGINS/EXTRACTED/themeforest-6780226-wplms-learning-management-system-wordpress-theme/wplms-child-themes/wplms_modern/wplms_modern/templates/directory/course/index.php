<?php 
/**
 * The template for displaying course directory.
 *
 * Override this template by copying it to yourtheme/course/index.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.0.5
 */

get_header( wplms_modern_get_header() ); 

$vibe = Wplms_Modern_Init::init();
global $bp;
$id= vibe_get_bp_page_id('course');

if(bp_is_course_component()){
	if(bp_is_single_item()){
		bp_core_load_template('course/single/home');
	}
}
$bg = $vibe->option('hero_img');
?>

<section id="title" style="background:url(<?php echo (empty($bg)?get_stylesheet_directory_uri().'/assets/images/default.jpeg':stripslashes($vibe->option('hero_img'))); ?>);">
    <div class="container">
        <div class="pagetitle">
        	<?php
            $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                vibe_breadcrumbs(); 
            ?>
        	<h1>
        	<?php
        	$title=get_post_meta($id,'vibe_title',true);
        	if(!isset($title) || !$title || (vibe_validate($title))){
        		echo get_the_title($id); 
        	}
        	?>
        	</h1>
            <?php the_sub_title($id); ?>
        </div>
    </div>
</section>
<section id="content">
	<div id="buddypress">
    <div class="container">

	<?php do_action( 'bp_before_directory_course_page' ); ?>

		<div class="padder">

		<?php do_action( 'bp_before_directory_course' ); ?>
		<div class="row">
				<form action="" method="post" id="course-directory-form" class="dir-form">
					<div class="col-md-3 col-sm-4">
						<div class="item-list-tabs" role="navigation">
							<ul>
								<li class="selected" id="course-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_course_root_slug() ); ?>"><?php printf( __( 'All Courses <span>%s</span>', 'wplms_modern' ), bp_course_get_total_course_count( ) ); ?></a></li>

								<?php if ( is_user_logged_in() ) : ?>

									<li id="course-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug() . BP_COURSE_SLUG ); ?>"><?php printf( __( 'My Courses <span>%s</span>', 'wplms_modern' ), bp_course_get_total_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

									<?php if(is_user_instructor()): ?>
										<li id="course-instructor"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug() . BP_COURSE_SLUG ); ?>"><?php printf( __( 'Instructing Courses <span>%s</span>', 'wplms_modern' ), bp_course_get_instructor_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>
									<?php endif; ?>		
								<?php endif; ?>
								<?php do_action( 'bp_course_directory_filter' ); ?>
							</ul>
						</div><!-- .item-list-tabs -->
						<?php 
		            		do_action('wplms_be_instructor_button');	
						?>
					<div id="course-dir-search" class="dir-search" role="search">
						<?php bp_directory_course_search_form(); ?>
					</div><!-- #group-dir-search -->	
					<?php
				 		$sidebar = apply_filters('wplms_sidebar','coursesidebar',$id);
		                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
	               	<?php endif; ?>
	               	
				</div>
				<div class="col-md-9 col-sm-8">
					<?php do_action( 'bp_before_directory_course_content' ); ?>

					<?php do_action( 'template_notices' ); ?>

					
					<div class="item-list-tabs" id="subnav" role="navigation">
						<ul>
							<?php do_action( 'bp_course_directory_course_types' ); ?>
							<li class="switch_view"><a id="list_view" class="active"><i class="icon-list-1"></i></a><a id="grid_view"><i class="icon-grid"></i></a>
							</li>
							<li id="course-order-select" class="last filter">

								<label for="course-order-by"><?php _e( 'Order By:', 'wplms_modern' ); ?></label>
								<select id="course-order-by">
									<?php
									?>
									<option value=""><?php _e( 'Select Order', 'wplms_modern' ); ?></option>
									<option value="newest"><?php _e( 'Newly Published', 'wplms_modern' ); ?></option>
									<option value="alphabetical"><?php _e( 'Alphabetical', 'wplms_modern' ); ?></option>
									<option value="popular"><?php _e( 'Most Members', 'wplms_modern' ); ?></option>
									<option value="rated"><?php _e( 'Highest Rated', 'wplms_modern' ); ?></option>

									<?php do_action( 'bp_course_directory_order_options' ); ?>
								</select>
							</li>
						</ul>
					</div>
					<div id="course-dir-list" class="course dir-list">

					<?php locate_template( array( 'course/course-loop.php' ), true ); ?>

					</div><!-- #courses-dir-list -->

					<?php do_action( 'bp_directory_course_content' ); ?>

					<?php wp_nonce_field( 'directory_course', '_wpnonce-course-filter' ); ?>

					<?php do_action( 'bp_after_directory_course_content' ); ?>

				</form><!-- #course-directory-form -->
			</div>	
		</div>	
		<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
</div>
</section>

<?php get_footer( wplms_modern_get_footer() ); 

