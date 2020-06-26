<?php 
global $wp_query;
$curauth = $wp_query->get_queried_object();

get_header(wplms_modern_get_header()); 


$ifield = vibe_get_option('instructor_field');
if(!isset($ifield) || $ifield =='')$ifield='Speciality';

$bio = vibe_get_option('instructor_about');
if(empty($bio))$bio='Bio';
?>
<section id="title" class="title-area">
<?php 
        $vibe = Wplms_Modern_Init::init();
?>
    <div class="title-content">
        <div class="container">
            <div class="title-text">
                <div class="row">
                	<div class="col-md-3">
                		<div class="instructor-avatar">
                			<?php echo bp_core_fetch_avatar( array( 'item_id' => $curauth->data->ID,'type'=>'full', 'html' => true ) ); ?>
                		</div>
                	</div>
                    <div class="col-md-6">
                    	<div class="about_instructor">
	                    	<?php 
	                    		echo '<h1>'. $curauth->display_name.'</h1>';
			                    if(bp_is_active('xprofile'))
			                    echo '<h3>'.bp_get_profile_field_data( 'field='.$ifield.'&user_id=' .$curauth->data->ID ).'</h3>'; 
		                    ?>
		                    <?php
		                    	if(bp_is_active('xprofile'))
			                    echo '<div class="instructor_bio">'.bp_get_profile_field_data( 'field='.$bio.'&user_id=' .$curauth->data->ID ).'</div>'; 
		                    ?>
	                    </div>
                    </div>
                    <div class="col-md-3">
                    	<ul class="instructor_stats">
                    		<li><span class="dashicons dashicons-groups"></span><strong><?php echo $vibe->get_instructor_student_count($curauth->data->ID); ?></strong>
                    		<label><?php _e('# Students in Courses','wplms_modern'); ?></label></li>
                    		<li><?php 
                    		$reviews = $vibe->get_instructor_average_rating($curauth->data->ID); 
                    		echo '<div class="modern-star-rating">';
							for($i=1;$i<=5;$i++){
								if($reviews >= 1){
									echo  '<span class="dashicons dashicons-star-filled"></span>';
								}elseif(($reviews < 1 ) && ($reviews >= 0.4 ) ){
									echo  '<span class="dashicons dashicons-star-half"></span>';
								}else{
									echo  '<span class="dashicons dashicons-star-empty"></span>';
								}
								$reviews--;
							}
							echo '</div><label>'.__('Average Rating','wplms_modern').'</label>';
                    		?></li>
                    	</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
<section id="content">
	<div id="buddypress">
    <div class="container">

		<div class="padder">

		<div class="row">
			<div class="col-md-12">
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				global $post;
				$style=apply_filters('wplms_instructor_courses_style','modern1');
				echo '<div class="col-md-3 col-sm-6">'.thumbnail_generator($post,$style,'3','0',true,true).'</div>';
				endwhile;
				pagination();
				endif;
			?>
			</div>	
		</div>	
		<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
</div>
</section>

<?php get_footer( 'wplms_modern' ); ?>