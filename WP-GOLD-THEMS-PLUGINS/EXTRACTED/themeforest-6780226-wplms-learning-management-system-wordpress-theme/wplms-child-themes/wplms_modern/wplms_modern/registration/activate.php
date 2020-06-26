<?php get_header( wplms_modern_get_header() ); ?>
<?php get_template_part('title','area'); ?>
<section id="content">
	<div class="container">
		<div class="col-md-9 col-sm-8">
		
		<div class="content padder">

		<?php do_action( 'bp_before_activation_page' ); ?>

		<div class="page" id="activate-page">

			<h3><?php if ( bp_account_was_activated() ) :
				_e( 'Account Activated', 'wplms_modern' );
			else :
				_e( 'Activate your Account', 'wplms_modern' );
			endif; ?></h3>

			<?php do_action( 'template_notices' ); ?>

			<?php do_action( 'bp_before_activate_content' ); ?>

			<?php if ( bp_account_was_activated() ) : ?>

				<?php if ( isset( $_GET['e'] ) ) : ?>
					<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'wplms_modern' ); ?></p>
				<?php else : ?>
					<p><?php printf( __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'wplms_modern' ), wp_login_url( bp_get_root_domain() ) ); ?></p>
				<?php endif; ?>

			<?php else : ?>

				<p><?php _e( 'Please provide a valid activation key.', 'wplms_modern' ); ?></p>

				<form action="" method="get" class="standard-form" id="activation-form">

					<label for="key"><?php _e( 'Activation Key:', 'wplms_modern' ); ?></label>
					<input type="text" name="key" id="key" value="" />

					<p class="submit">
						<input type="submit" name="submit" class="button" value="<?php _e( 'Activate', 'wplms_modern' ); ?>" />
					</p>

				</form>

			<?php endif; ?>

			<?php do_action( 'bp_after_activate_content' ); ?>

		</div><!-- .page -->

		<?php do_action( 'bp_after_activation_page' ); ?>

		</div><!-- .padder -->
	</div>
	<div class="col-md-3 col-sm-4">
		<div class="sidebar">
			<?php
		 		$sidebar = apply_filters('wplms_sidebar','wplms_modern',get_the_ID());
                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
           	<?php endif; ?>
		</div>
	</div>
</div>	
</section><!-- #content -->


<?php get_footer( wplms_modern_get_footer()); ?>
