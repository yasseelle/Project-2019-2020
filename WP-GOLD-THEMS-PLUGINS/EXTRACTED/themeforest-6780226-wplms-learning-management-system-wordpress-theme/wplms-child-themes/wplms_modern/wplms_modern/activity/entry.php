<?php

/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
global $bp;

if(is_numeric($bp->current_action)){
	$vibe = Wplms_Modern_Init::init();
	?>
	<style>
		body.activity-permalink .activity.no-ajax{
			max-width:100%;
			margin:0;
			padding:0;
		}
	</style>
	<section id="title" class="title-area">
		<div class="title-content">
			<div class="container">
				<div class="title-text">
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
	<section>
		<div class="container">
	<?php
}
?>

<?php do_action( 'bp_before_activity_entry' ); ?>

<li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">
	<div class="activity-avatar">
		<a href="<?php bp_activity_user_link(); ?>">

			<?php bp_activity_avatar(); ?>

		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<?php bp_activity_action(); ?>

		</div>

		<?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>

			<div class="activity-inreplyto">
				<strong><?php _e( 'In reply to: ', 'wplms_modern' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" class="view" title="<?php _e( 'View Thread / Permalink', 'wplms_modern' ); ?>"><?php _e( 'View', 'wplms_modern' ); ?></a>
			</div>

		<?php endif; ?>

		<?php if ( bp_activity_has_content() ) : ?>

			<div class="activity-inner">

				<?php bp_activity_content_body(); ?>

			</div>

		<?php endif; ?>

		<?php do_action( 'bp_activity_entry_content' ); ?>

		<?php if ( is_user_logged_in() ) : ?>

			<div class="activity-meta">

				<?php if ( bp_activity_can_comment() ) : ?>

					<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'wplms_modern' ), bp_activity_get_comment_count() ); ?></a>

				<?php endif; ?>

				<?php if ( bp_activity_can_favorite() ) : ?>

					<?php if ( !bp_get_activity_is_favorite() ) : ?>

						<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'wplms_modern' ); ?>"><?php _e( 'Favorite', 'wplms_modern' ); ?></a>

					<?php else : ?>

						<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'wplms_modern' ); ?>"><?php _e( 'Remove Favorite', 'wplms_modern' ); ?></a>

					<?php endif; ?>

				<?php endif; ?>

				<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

				<?php do_action( 'bp_activity_entry_meta' ); ?>

			</div>

		<?php endif; ?>

	</div>

	<?php do_action( 'bp_before_activity_entry_comments' ); ?>

	<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

		<div class="activity-comments">

			<?php bp_activity_comments(); ?>

			<?php if ( is_user_logged_in() ) : ?>

				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>
					<div class="ac-reply-avatar"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
						</div>
						<input type="submit" name="ac_form_submit" value="<?php _e( 'Post', 'wplms_modern' ); ?>" /> &nbsp; <?php _e( 'or press esc to cancel.', 'wplms_modern' ); ?>
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					</div>

					<?php do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

				</form>

			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'bp_after_activity_entry_comments' ); ?>

</li>

<?php do_action( 'bp_after_activity_entry' ); 

if(is_numeric($bp->current_action)){ ?>
		</div>
	</section>
<?php } ?>

