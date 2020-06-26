<?php 

$redirect_course_cat_directory = vibe_get_option('redirect_course_cat_directory');
if(!empty($redirect_course_cat_directory)){
	locate_template( array( 'course/index.php' ), true );	
	exit;	
}



get_header(wplms_modern_get_header()); ?>
<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
						<?php
                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                        if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                            vibe_breadcrumbs(); 
	                    ?>
						<h1><?php single_cat_title(); ?></h1>
                    	<h5><?php echo category_description(); ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<section id="content">
	<div id="buddypress">
    <div class="container">
		<div class="padder">
		<?php do_action( 'bp_before_directory_course' ); ?>	
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<div class="content padding_adjusted">
				<?php
					if ( have_posts() ) : while ( have_posts() ) : the_post();

					echo '<div class="col-md-4 col-sm-6 clear3">'.thumbnail_generator($post,'modern1','3','0',true,true).'</div>';
				
					endwhile;
					pagination();
					endif;
				?>
				</div>
			</div>	
			<div class="col-md-3 col-sm-3">
				<?php
                    $sidebar = apply_filters('wplms_sidebar','coursesidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                <?php endif; ?>
			</div>
		</div>	
		<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
</div>
</section>

<?php get_footer( wplms_modern_get_footer() ); ?>