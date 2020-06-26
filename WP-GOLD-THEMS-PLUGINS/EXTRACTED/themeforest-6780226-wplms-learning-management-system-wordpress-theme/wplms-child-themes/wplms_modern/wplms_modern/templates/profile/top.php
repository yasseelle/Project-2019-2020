<?php

/**
 * BuddyPress - Users Home
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( wplms_modern_get_header() ); 
?>

<section id="content">
	<div id="buddypress">
		<div class="member_header">
			<?php

			/**
			 * Fires before the display of member home content.
			 *
			 * @since BuddyPress (1.2.0)
			 */
			do_action( 'bp_before_member_home_content' ); ?>

			<div id="item-header" role="complementary">
				<?php bp_get_template_part( 'members/single/member-header' ) ?>
			</div>
		</div><!-- #item-header -->
		<div id="item-nav" class="">
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<div class="container">
					<div class="col-md-9 col-md-offset-3">
						<ul>

							<?php bp_get_displayed_user_nav(); ?>

							<?php do_action( 'bp_member_options_nav' ); ?>

						</ul>
					</div>
				</div>
			</div>
		</div><!-- #item-nav -->
	    <div class="container">
	        <div class="row">	
	        	<div class="col-md-3 col-sm-4">
	        		<div class="buddypress_sidebar">
		        		<?php
		        		global $bp;
	                    $sidebar = apply_filters('wplms_member_sidebar','member',$bp->displayed_user->id);
	                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
	                    <?php endif; ?>
                    </div>
	        	</div>
				<div class="col-md-9 col-sm-8">