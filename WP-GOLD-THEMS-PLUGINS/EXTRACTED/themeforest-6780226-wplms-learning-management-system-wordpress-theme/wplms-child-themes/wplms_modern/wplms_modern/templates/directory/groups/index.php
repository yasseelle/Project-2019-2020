<?php

/**
 * BuddyPress - Groups Directory
 *
 * @package BuddyPress
 * @subpackage bp-default
 */



get_header( wplms_modern_get_header() ); 

$id= vibe_get_bp_page_id('groups');

$vibe = Wplms_Modern_Init::init();
?>

<?php do_action( 'bp_before_directory_groups_page' ); 


 if(has_post_thumbnail($id)){ 
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); 
	$url = $url[0];
}else{
	$url = $vibe->option('hero_img');
}
?>
<section id="title" style="background:url(<?php echo (empty($url)?get_stylesheet_directory_uri().'/assets/images/default.jpeg':$url); ?>)">
    <div class="container">
        <div class="pagetitle">
        	<?php
            $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                vibe_breadcrumbs(); 
            ?>
        	<h1><?php echo get_the_title($id); ?></h1>
            <?php the_sub_title($id); ?>
        </div>
    </div>
</section>
<section id="content">
	<div id="buddypress">
	    <div class="container">
	    	<div class="padder">
				<?php do_action( 'bp_before_directory_groups' ); ?>

					<form action="" method="post" id="groups-directory-form" class="dir-form">
						<div class="row">	
							<div class="col-md-3 col-sm-4">
								<?php do_action( 'bp_before_directory_groups_content' ); ?>
								<div class="item-list-tabs" role="navigation">
									<ul>
										<li class="selected" id="groups-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() ); ?>"><?php printf( __( 'All Groups <span>%s</span>', 'wplms_modern' ), bp_get_total_group_count() ); ?></a></li>

										<?php if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

											<li id="groups-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_groups_slug() . '/my-groups' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'wplms_modern' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

										<?php endif; ?>

										<?php do_action( 'bp_groups_directory_group_filter' ); ?>

									</ul>
								</div><!-- .item-list-tabs -->
								<?php if ( is_user_logged_in() && bp_user_can_create_groups() && $flag ) : ?> 
									<a class="button create-group-button full" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/create' ); ?>"><?php _e( 'Create a Group', 'wplms_modern' ); ?></a>
								<?php endif; ?>
								<div id="group-dir-search" class="dir-search" role="search">
									<?php bp_directory_groups_search_form(); ?>
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

										<?php do_action( 'bp_groups_directory_group_types' ); ?>
										<li class="switch_view"><a id="list_view" class="active"><i class="icon-list-1"></i></a><a id="grid_view"><i class="icon-grid"></i></a>
										</li>
										<li id="groups-order-select" class="last filter">

											<label for="groups-order-by"><?php _e( 'Order By:', 'wplms_modern' ); ?></label>
											<select id="groups-order-by">
												<option value="active"><?php _e( 'Last Active', 'wplms_modern' ); ?></option>
												<option value="popular"><?php _e( 'Most Members', 'wplms_modern' ); ?></option>
												<option value="newest"><?php _e( 'Newly Created', 'wplms_modern' ); ?></option>
												<option value="alphabetical"><?php _e( 'Alphabetical', 'wplms_modern' ); ?></option>

												<?php do_action( 'bp_groups_directory_order_options' ); ?>

											</select>
										</li>
									</ul>
								</div>
								<?php do_action( 'template_notices' ); ?>
								<div id="groups-dir-list" class="groups dir-list">

									<?php locate_template( array( 'groups/groups-loop.php' ), true ); ?>

								</div><!-- #groups-dir-list -->

								<?php do_action( 'bp_directory_groups_content' ); ?>

								<?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

								<?php do_action( 'bp_after_directory_groups_content' ); ?>
							</div>	
						</div>
					</form><!-- #groups-directory-form -->

						<?php do_action( 'bp_after_directory_groups' ); ?>

					</div><!-- .padder -->
				</div><!-- #container -->
			</div>
</section>
</div> <!-- Extra Global div in header -->									
<?php do_action( 'bp_after_directory_groups_page' ); ?>

<?php get_footer( wplms_modern_get_footer() ); ?>