<?php

/**
 * Template Name: BuddyPress - Activity Directory
 *
 * @package BuddyPress
 * @subpackage Theme
 */


get_header( wplms_modern_get_header() ); 

$id= vibe_get_bp_page_id('activity');
$vibe = Wplms_Modern_Init::init();
 if(has_post_thumbnail($id)){ 
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); 
	$url = $url[0];
}else{
	$url = $vibe->option('hero_img');
}
if(empty($url))
		$url = get_stylesheet_directory_uri().'/assets/images/default.jpeg';
?>

<?php do_action( 'bp_before_directory_activity_page' ); ?>
<section id="title" style="background:url(<?php echo $url; ?>);">
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
	    	<div class="padder">
	    	<div class="row">
	    		<div class="col-md-3 col-sm-4">
						<?php do_action( 'bp_before_directory_activity' ); ?>
						<div id="members-activity">	
						<div class="item-list-tabs activity-type-tabs" role="navigation">
							<ul>
								<?php do_action( 'bp_before_activity_type_tab_all' ); ?>

								<li class="selected" id="activity-all"><a href="<?php bp_activity_directory_permalink(); ?>" title="<?php _e( 'The public activity for everyone on this site.', 'wplms_modern' ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'wplms_modern' ), bp_get_total_member_count() ); ?></a></li>

								<?php if ( is_user_logged_in() ) : ?>

									<?php do_action( 'bp_before_activity_type_tab_friends' ); ?>

									<?php if ( bp_is_active( 'friends' ) ) : ?>

										<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

											<li id="activity-friends"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php _e( 'The activity of my friends only.', 'wplms_modern' ); ?>"><?php printf( __( 'My Friends <span>%s</span>', 'wplms_modern' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>

										<?php endif; ?>

									<?php endif; ?>

									<?php do_action( 'bp_before_activity_type_tab_groups' ); ?>

									<?php if ( bp_is_active( 'groups' ) ) : ?>

										<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

											<li id="activity-groups"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>" title="<?php _e( 'The activity of groups I am a member of.', 'wplms_modern' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'wplms_modern' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

										<?php endif; ?>

									<?php endif; ?>

									<?php do_action( 'bp_before_activity_type_tab_favorites' ); ?>

									<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>

										<li id="activity-favorites"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>" title="<?php _e( "The activity I've marked as a favorite.", 'wplms_modern' ); ?>"><?php printf( __( 'My Favorites <span>%s</span>', 'wplms_modern' ), bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

									<?php endif; ?>

									<?php if ( bp_activity_do_mentions() ) : ?>

										<?php do_action( 'bp_before_activity_type_tab_mentions' ); ?>

										<li id="activity-mentions"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>" title="<?php _e( 'Activity that I have been mentioned in.', 'wplms_modern' ); ?>"><?php _e( 'Mentions', 'wplms_modern' ); ?><?php if ( bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ) : ?> <strong><span><?php printf( _nx( '%s new', '%s new', bp_get_total_mention_count_for_user( bp_loggedin_user_id() ), 'Number of new activity mentions', 'wplms_modern' ), bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ); ?></span></strong><?php endif; ?></a></li>

									<?php endif; ?>

								<?php endif; ?>

								<?php do_action( 'bp_activity_type_tabs' ); ?>
							</ul>
						</div><!-- .item-list-tabs -->
					</div>	
						<?php 
		            		do_action('wplms_be_instructor_button');	
						?>
					<?php
		                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('buddypress') ) : ?>
	               	<?php endif; ?>
	               	
				</div>
	    		<div class="col-md-9 col-sm-9">
	    			<?php do_action( 'template_notices' ); ?>

					
					
					<?php do_action( 'bp_before_directory_activity_content' ); ?>

					<?php if ( is_user_logged_in() ) : ?>
						<div id="activityform">
					<?php locate_template( array( 'activity/post-form.php'), true ); ?>
						</div>
					<?php endif; ?>
				

							
			
					<div id="content" class="activity_content" role="main">
						<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
							<ul>
								<li class="feed"><a href="<?php bp_sitewide_activity_feed_link(); ?>" title="<?php _e( 'RSS Feed', 'wplms_modern' ); ?>"><?php _e( 'RSS', 'wplms_modern' ); ?></a></li>

								<?php do_action( 'bp_activity_syndication_options' ); ?>

								<li id="activity-filter-select" class="last">
									<label for="activity-filter-by"><?php _e( 'Show:', 'wplms_modern' ); ?></label>
									<select id="activity-filter-by">
										<option value="-1"><?php _e( 'Everything', 'wplms_modern' ); ?></option>
										<option value="activity_update"><?php _e( 'Updates', 'wplms_modern' ); ?></option>

										<?php if ( bp_is_active( 'blogs' ) ) : ?>

											<option value="new_blog_post"><?php _e( 'Posts', 'wplms_modern' ); ?></option>
											<option value="new_blog_comment"><?php _e( 'Comments', 'wplms_modern' ); ?></option>

										<?php endif; ?>

										<?php if ( bp_is_active( 'forums' ) ) : ?>

											<option value="new_forum_topic"><?php _e( 'Forum Topics', 'wplms_modern' ); ?></option>
											<option value="new_forum_post"><?php _e( 'Forum Replies', 'wplms_modern' ); ?></option>

										<?php endif; ?>

										<?php if ( bp_is_active( 'groups' ) ) : ?>

											<option value="created_group"><?php _e( 'New Groups', 'wplms_modern' ); ?></option>
											<option value="joined_group"><?php _e( 'Group Memberships', 'wplms_modern' ); ?></option>

										<?php endif; ?>

										<?php if ( bp_is_active( 'friends' ) ) : ?>

											<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'wplms_modern' ); ?></option>

										<?php endif; ?>

										<option value="new_member"><?php _e( 'New Members', 'wplms_modern' ); ?></option>

										<?php do_action( 'bp_activity_filter_options' ); ?>

									</select>
								</li>
							</ul>
						</div><!-- .item-list-tabs -->

					<?php do_action( 'bp_before_directory_activity_list' ); ?>

						<div class="activity" role="main">

						<?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>

						</div><!-- .activity -->

					<?php do_action( 'bp_after_directory_activity_list' ); ?>

					<?php do_action( 'bp_directory_activity_content' ); ?>

					<?php do_action( 'bp_after_directory_activity_content' ); ?>

					<?php do_action( 'bp_after_directory_activity' ); ?>

					</div>
				</div>	
			</div>
		</div><!-- .padder -->
	</div><!-- #content -->

	<?php do_action( 'bp_after_directory_activity_page' ); ?>
</div>
</section>

<?php get_footer( wplms_modern_get_footer() ); ?>
