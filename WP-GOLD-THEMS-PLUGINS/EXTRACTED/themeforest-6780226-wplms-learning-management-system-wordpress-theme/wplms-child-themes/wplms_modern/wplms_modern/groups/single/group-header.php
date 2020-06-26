<?php
do_action( 'bp_before_group_header' ); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div id="item-header-avatar">
				<a href="<?php bp_group_permalink(); ?>" title="<?php bp_current_group_name(); ?>">
					<?php bp_group_avatar(); ?>
				</a>
			</div><!-- #item-header-avatar -->
		</div>
		<div class="col-md-9">
			<div id="item-header-content">
				<span class="highlight"><?php bp_group_type(); ?></span>
				<h3><a href="<?php bp_group_permalink(); ?>"><?php bp_current_group_name(); ?></a></h3>
				 <span class="activity"><?php printf( __( 'active %s', 'wplms_modern' ), bp_get_group_last_active() ); ?></span>

				<?php do_action( 'bp_before_group_header_meta' ); ?>

				<div id="item-meta">

					<?php bp_group_description(); ?>

					<div id="item-buttons"> 

						<?php do_action( 'bp_group_header_actions' ); ?>

					</div><!-- #item-buttons -->

					<?php do_action( 'bp_group_header_meta' ); ?>

				</div>
			</div><!-- #item-header-content -->

			<div id="item-actions">

				<?php if ( bp_group_is_visible() ) : ?>

					<?php bp_group_list_admins();

					do_action( 'bp_after_group_menu_admins' );

					if ( bp_group_has_moderators() ) :
						do_action( 'bp_before_group_menu_mods' ); ?>

						<h3><?php _e( 'Moderators' , 'wplms_modern' ); ?></h3>

						<?php bp_group_list_mods();

						do_action( 'bp_after_group_menu_mods' );

					endif;

				endif; ?>

			</div><!-- #item-actions -->
		</div>
	</div>
</div>			
<?php

do_action( 'bp_after_group_header' );
?>