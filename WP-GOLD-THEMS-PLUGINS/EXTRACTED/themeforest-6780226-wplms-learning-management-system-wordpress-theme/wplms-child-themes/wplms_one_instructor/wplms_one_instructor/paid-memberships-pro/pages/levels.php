<?php 
global $wpdb, $pmpro_msg, $pmpro_msgt, $pmpro_levels, $current_user, $pmpro_currency_symbol;
if(is_user_logged_in()){
	$course_id = url_to_postid($_SERVER['HTTP_REFERER']);
	if(is_numeric($course_id) && $course_id){
		$membership_levels = vibe_sanitize(get_post_meta($course_id,'vibe_pmpro_membership',false));

		if(isset($current_user->membership_level->ID) && is_array($membership_levels)){
			if(in_array($current_user->membership_level->ID,$membership_levels)){
				$course_duration = get_post_meta($course_id,'vibe_duration',true);
				$course_duration_parameter = apply_filters('vibe_course_duration_parameter',86400);
				$course_duration = time() + $course_duration * $course_duration_parameter;
				$user_id = get_current_user_id();
				update_user_meta($user_id,$course_id,$course_duration);
				echo '<p class="message success">'.__('Course Renewed','vibe').' <a href="'.get_permalink($course_id).'" class="link right">'.__('Back to course','vibe').'</a></p>';
			}
		}
	}
}

?>
<div class="pmpro_content"> 
<?php if($pmpro_msg){ ?>
<div class="pmpro_message <?php echo $pmpro_msgt?>"><?php echo $pmpro_msg?></div>
<?php } ?>
<ul class="pmpro_pricing_table">
	<?php	
	$count = 0;
	foreach($pmpro_levels as $level)
	{
	  if(isset($current_user->membership_level->ID))
		  $current_level = ($current_user->membership_level->ID == $level->id);
	  else
		  $current_level = false;
	?>
	<li <?php if($current_level) echo 'class="current"';?>>
		<ul class="level_info ">
			<li><h2><?php echo $current_level ? "<strong>{$level->name}</strong>" : $level->name?></h2></li>
			<li>
				<?php
					if(pmpro_isLevelFree($level))
						$cost_text = '<strong>'.__('Free','vibe').'</strong>';
					else
						$cost_text = vibe_pmpro_getLevelCost($level, true, true); 

					echo '<span class="pmpro_price">'.$cost_text.'</span>';
				?>
			</li>
			<li>
			<?php 
				
				$expiration_text = pmpro_getLevelExpiration($level);
				if(!empty($expiration_text))
					echo  $expiration_text;
			?>
			</li>
			<li>
				<?php echo do_shortcode($level->description); ?>
			</li>
			<li>
			<?php if(empty($current_user->membership_level->ID)) { ?>
				<a class="button" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo _x('Select', 'Choose a level from levels page', 'vibe');?></a>
			<?php } elseif ( !$current_level ) { ?>                	
				<a href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo _x('Select', 'Choose a level from levels page', 'vibe');?></a>
			<?php } elseif($current_level) { ?>      
			<?php
				//if it's a one-time-payment level, offer a link to renew				
				if(!pmpro_isLevelRecurring($current_user->membership_level))
				{
				?>
					<a class="button primary" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo _x('Renew', 'Clicking to renew from levels page', 'vibe');?></a>
				<?php
				}
				else
				{
				?>
					<a class="disabled" href="<?php echo pmpro_url("account")?>"><?php _e('Your&nbsp;Level', 'vibe');?></a>
				<?php
				}
			?>
			
			<?php } ?>
			</li>
		</ul>
	</li>
	<?php
	}
	?>
</ul>

</div>
