<?php

/**
 * BuddyPress Delete Account
 *
 * @package BuddyPress
 * @subpackage bp-default
 */


get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">

	<?php do_action( 'bp_before_member_body' ); ?>
	<div class="item-list-tabs no-ajax" id="subnav">
		<ul>

			<?php bp_get_options_nav(); ?>

			<?php do_action( 'bp_member_plugin_options_nav' ); ?>

		</ul>
	</div><!-- .item-list-tabs -->

	<h3><?php _e( 'Capabilities', 'vibe' ); ?></h3>
	<?php do_action('bp_before_member_settings_template'); ?>
	<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/capabilities/'; ?>" name="account-capabilities-form" id="account-capabilities-form" class="standard-form" method="post">

		<?php do_action( 'bp_members_capabilities_account_before_submit' ); ?>

		<label>
			<input type="checkbox" name="user-spammer" id="user-spammer" value="1" <?php checked( bp_is_user_spammer( bp_displayed_user_id() ) ); ?> />
			 <?php _e( 'This user is a spammer.', 'vibe' ); ?>
		</label>

		<div class="submit">
			<input type="submit" value="<?php _e( 'Save', 'vibe' ); ?>" id="capabilities-submit" name="capabilities-submit" />
		</div>

		<?php do_action( 'bp_members_capabilities_account_after_submit' ); ?>

		<?php wp_nonce_field( 'capabilities' ); ?>

	</form>

	<?php do_action( 'bp_after_member_body' ); ?>

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_settings_template' ); ?>


<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  	