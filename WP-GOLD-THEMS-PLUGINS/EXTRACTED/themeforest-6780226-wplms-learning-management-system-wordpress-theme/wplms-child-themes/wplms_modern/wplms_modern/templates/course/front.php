<?php

/**
 * The template for displaying Course font
 *
 * Override this template by copying it to yourtheme/course/single/front.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.0
 */

global $post;
$id= get_the_ID();

do_action('wplms_course_before_front_main');


?>

<?php
do_action('wplms_before_course_description');
?>
<div class="course_description" itemprop="description">
	<div class="small_desc">
	<?php 
		$more_flag = 1;
		$content=get_the_content(); 
		$middle=strpos( $post->post_content, '<!--more-->' );
		if($middle){
			echo apply_filters('the_content',substr($content, 0, $middle));
		}else{
			$limit=apply_filters('wplms_course_excerpt_limit',1200);
			$middle = strrpos(substr($content, 0, $limit), " ");

			if(strlen($content) < $limit){
				$more_flag = 0;
			}
			$check_vc=strpos( $post->post_content, '[vc_row]' );
			if ( isset($check_vc) ) {
				$more_flag=0;
				echo apply_filters('the_content',$content);
			}else{
				echo apply_filters('the_content',substr($content, 0, $middle));
			}
		}
	?>
	<?php 
		if($more_flag)
			echo '<a href="#" id="more_desc" class="link" data-middle="'.$middle.'">'.__('READ MORE','wplms_modern').'</a>';
	?>
	</div>
	<?php if($more_flag){ ?>
	<div class="full_desc">
	<?php 
		echo apply_filters('the_content',substr($content, $middle,-1));
	?>
	<?php 
		echo '<a href="#" id="less_desc" class="link">'.__('LESS','wplms_modern').'</a>';
	?>
	</div>
	<?php
		}
	?>
</div>
<?php
do_action('wplms_after_course_description');
?>

<div class="course_reviews">
<ol class="reviewlist commentlist"> 
	  <?php 
	        wp_list_comments('type=comment&avatar_size=120&reverse_top_level=false'); 
	        paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') )
	    ?>  
	  </ol> 
	  
<?php
	 comments_template('/course-review.php',true);
?>
</div>
<?php
do_action('wplms_modern_after_course_front');