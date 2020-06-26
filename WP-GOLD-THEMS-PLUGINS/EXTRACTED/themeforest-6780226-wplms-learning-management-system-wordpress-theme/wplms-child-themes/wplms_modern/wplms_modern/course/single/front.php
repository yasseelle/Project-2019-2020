<?php

/**
 * The template for displaying Course font
 *
 * Override this template by copying it to yourtheme/course/single/front.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     1.8.1
 */


global $post;
$id= get_the_ID();

do_action('wplms_course_before_front_main');


?>

<?php
do_action('wplms_before_course_description');
?>
<div class="course_description">
	<h6><?php if(!empty($post->post_excerpt) && strpos($post->post_content,$post->post_excerpt) === false){ the_excerpt();} ?></h6>
	<div class="small_desc">
	<?php 
		$more_flag = 1;
		$content=get_the_content(); 
		$middle=strpos( $post->post_content, '<!--more-->' );
		if($middle){
			echo apply_filters('the_content',substr($content, 0, $middle));
		}else{
			$more_flag=0;
			echo apply_filters('the_content',$content);
		}
	?>
	<?php 
		if($more_flag){
			echo '<a href="#" id="more_desc" class="link" data-middle="'.$middle.'">'.__('READ MORE','wplms_modern').'</a>';
		}
	?>
	</div>
	<?php 
		if($more_flag){ 
	?>
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


?>