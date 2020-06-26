<?php

/**
 * BuddyPress - Blogs Directory
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header(wplms_modern_get_header()); 

$id=0;
$page_array=get_option('bp-pages');
if(isset($page_array['blogs'])){
	$id = $page_array['blogs'];
}

$flag=1;

$capability=vibe_get_option('blog_create');
if(isset($capability)){
	$flag=0;
	switch($capability){
                case 1: 
			$flag=1;
		break;
		case 2: 
			if(current_user_can('edit_posts'))
			$flag=1;
		break;
		case 3:
			if(current_user_can('manage_options'))
			$flag=1;
		break;
	}

}

$vibe = Wplms_Modern_Init::init();
do_action('bp_before_directory_blogs_page');
 if(has_post_thumbnail($id)){ 
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); 
}else{
	$url = $vibe->option('hero_img');
}
?>
<section id="coursestitle" style="background:url(<?php echo (empty($url)?get_stylesheet_directory_uri().'/assets/images/default.jpeg':$url); ?>)">
    <div class="container">
        <div class="pagetitle">
        	<h1><?php echo get_the_title($id); ?></h1>
            <?php the_sub_title($id); ?>
        </div>
    </div>
</section>

<section id="memberstitle">
    <div class="container">
        <div class="row">
             <div class="col-md-9 col-sm-8">
                <div class="pagetitle">
                    <h1><?php the_title(); ?></h1>
                    <?php the_sub_title($id); ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
            	
            </div>
        </div>
    </div>
</section>

<section id="content">
	<div id="buddypress">
	    <div class="container">
	    	<div class="padder">
				<?php do_action( 'bp_before_directory_blogs' ); ?>

					<form action="" method="post" id="blogs-directory-form" class="dir-form">
						<div class="row">	
							<div class="col-md-3 col-sm-4">
								<?php do_action( 'bp_before_directory_blogs_content' ); ?>
								<div class="item-list-tabs" role="navigation">
									<ul>
										<li class="selected" id="blogs-all"><a href="<?php bp_root_domain(); ?>/<?php bp_blogs_root_slug(); ?>"><?php printf( __( 'All Sites <span>%s</span>', 'wplms_modern' ), bp_get_total_blog_count() ); ?></a></li>

										<?php if ( is_user_logged_in() && bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) : ?>

											<li id="blogs-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_blogs_slug(); ?>"><?php printf( __( 'My Sites <span>%s</span>', 'wplms_modern' ), bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

										<?php endif; ?>

										<?php do_action( 'bp_blogs_directory_blog_types' ); ?>
									</ul>
								</div><!-- .item-list-tabs -->
								<?php if ( is_user_logged_in() && bp_blog_signup_enabled() && $flag ) : ?> &nbsp;
				            		<a class="button create-group-button full" href="<?php echo bp_get_root_domain() . '/' . bp_get_blogs_root_slug() . '/create/' ?>">
				            		<?php _e( 'Create a Site', 'wplms_modern' ); ?></a>
				            	<?php endif; ?>
								<div id="blog-dir-search" class="dir-search" role="search">
									<?php bp_directory_blogs_search_form(); ?>
								</div><!-- #group-dir-search -->
								<div class="buddysidebar">
									<?php
						                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('buddypress') ) : ?>
					               	<?php endif; ?>
								</div>
							</div>
							<div class="col-md-9 col-sm-8">
								<div class="item-list-tabs" id="subnav" role="navigation">
									<ul>

										<?php do_action( 'bp_blogs_directory_blog_sub_types' ); ?>
										<li class="switch_view"><a id="list_view" class="active"><i class="icon-list-1"></i></a><a id="grid_view"><i class="icon-grid"></i></a>
															</li>
										<li id="blogs-order-select" class="last filter">

											<label for="blogs-order-by"><?php _e( 'Order By:', 'wplms_modern' ); ?></label>
											<select id="blogs-order-by">
												<option value="active"><?php _e( 'Last Active', 'wplms_modern' ); ?></option>
												<option value="newest"><?php _e( 'Newest', 'wplms_modern' ); ?></option>
												<option value="alphabetical"><?php _e( 'Alphabetical', 'wplms_modern' ); ?></option>

												<?php do_action( 'bp_blogs_directory_order_options' ); ?>

											</select>
										</li>
									</ul>
								</div>	
								<?php do_action( 'template_notices' ); ?>
								<div id="blogs-dir-list" class="blogs dir-list">

									<?php locate_template( array( 'blogs/blogs-loop.php' ), true ); ?>

								</div><!-- #blogs-dir-list -->


								<?php do_action( 'bp_directory_blogs_content' ); ?>

								<?php wp_nonce_field( 'directory_blogs', '_wpnonce-blogs-filter' ); ?>

								<?php do_action( 'bp_after_directory_blogs_content' ); ?>
							</div>
						</div>
					</form><!-- #blogs-directory-form -->

					<?php do_action( 'bp_after_directory_blogs' ); ?>

				</div><!-- .padder -->
			</div><!-- #content -->

		<?php do_action( 'bp_after_directory_blogs_page' ); ?>
	</div>
</section>	
<?php get_footer( wplms_modern_get_footer() ); ?>
