<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>
<div class="step step5">
<?php
if ( $order ) : ?>

	<?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'wplms_modern' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'wplms_modern' );
			else
				_e( 'Please attempt your purchase again.', 'wplms_modern' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'wplms_modern' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'wplms_modern' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<p><?php _e( 'Thank you. Your order has been received.', 'wplms_modern' ); ?></p>

		<ul class="order_details">
			<li class="order">
				<?php _e( 'Order:', 'wplms_modern' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e( 'Date:', 'wplms_modern' ); ?>
				<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
			</li>
			<li class="total">
				<?php _e( 'Total:', 'wplms_modern' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php if ( $order->payment_method_title ) : ?>
			<li class="method">
				<?php _e( 'Payment method:', 'wplms_modern' ); ?>
				<strong><?php echo $order->payment_method_title; ?></strong>
			</li>
			<?php endif; ?>
		</ul>
		<div class="clear"></div>
		<?php
									$items = $order->get_items();
									foreach($items as $item){
										$product_name = $item['name'];
    									$product_id = $item['product_id'];
    									$subs='';

    									$subscribed=get_post_meta($product_id,'vibe_subscription',true);
    									if(vibe_validate($subscribed)){

    										$duration=get_post_meta($product_id,'vibe_duration',true);
    										$product_duration_parameter = apply_filters('vibe_product_duration_parameter',86400);
											$date=tofriendlytime($duration*$product_duration_parameter);
											$subs= '<strong>'.__('COURSE SUBSCRIBED FOR ','wplms_modern').' : <span>'.$date.'</span></strong>';
    									}else{	
    										$subs= '<strong>'.__('SUSBSCRIBED FOR FULL COURSE','wplms_modern').'</strong>';
    									}

    									$vcourses=vibe_sanitize(get_post_meta($product_id,'vibe_courses',false));
    									if(count($vcourses)){
    										echo '<h3 class="heading">'.__('Courses Subscribed','wplms_modern').'</h3>
    										<ul class="order_details">
    										<li><a>'.__('COURSE','wplms_modern').'</a>
    											<strong>'.__('SUBSCRIPTION','wplms_modern').'</strong></li>';

    											
    											if($order->status == 'completed' || $order->status == 'complete'){
    												$ostatus=__('START COURSE','wplms_modern');
    											}else if($order->status == 'pending'){
    												do_action('wplms_force_woocommerce_order_complete',$order);
    												$ostatus =__('WAITING FOR ORDER CONFIRMATION TO START COURSE','wplms_modern');
    											}else{
    												$ostatus=__('WAITING FOR ADMIN APPROVAL','wplms_modern');
    											}
    										foreach($vcourses as $course){
    											echo '<li>
													  <a class="course_name">'.get_the_title($course).'</a>
													  <a href="'.get_permalink($course).'"  class="button">
													  '.$ostatus.'</a>'.$subs.
													  '</li>';  

												if(count($vcourses) == 1 && ($order->status == 'completed' || $order->status == 'complete')){
													$thankyou_redirect=vibe_get_option('thankyou_redirect');
													if(isset($thankyou_redirect) && $thankyou_redirect){
    													echo '<script>
														jQuery(location).attr("href","'.get_permalink($course).'");
    													</script>';
													}
    											}	  
    										}
    										echo '</ul>';
    									}
    									
									}


								?>
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<div class="expand">
		<a class="minmax"><i class="icon-plus-1"></i></a>
		<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	</div>

<?php else : ?>

	<p><?php _e( 'Thank you. Your order has been received.', 'wplms_modern' ); ?></p>

<?php endif; ?>
</div>
