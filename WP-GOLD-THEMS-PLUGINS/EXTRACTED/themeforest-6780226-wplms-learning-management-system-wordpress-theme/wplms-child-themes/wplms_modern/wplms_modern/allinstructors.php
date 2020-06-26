<?php
/**
 * Template Name: All Instructors
 */
get_header(wplms_modern_get_header());


$no=999;
$args = apply_filters('wplms_allinstructors',array(
                'role' => 'instructor', // instructor
    			'number' => $no, 
                'orderby' => 'post_count', 
                'order' => 'DESC' 
    		));

$user_query = new WP_User_Query( $args );

$args = array(
                'role' => 'administrator', // instructor
                'number' => $no, 
                'orderby' => 'post_count', 
                'order' => 'DESC' 
            );
$flag = apply_filters('wplms_show_admin_in_instructors',1);
if(isset($flag) && $flag)
    $admin_query = new WP_User_Query( $args );

$instructors=array();
if ( isset($admin_query) && !empty( $admin_query->results ) ) {
    foreach ( $admin_query->results as $user ) {
        $instructors[]=$user->ID;
    }
}

if ( !empty( $user_query->results ) ) {
    foreach ( $user_query->results as $user ) {
        $instructors[]=$user->ID;
    }
}

$instructors=array_unique($instructors);

$ifield = vibe_get_option('instructor_field');
if(!isset($ifield) || $ifield =='')$ifield='Expertise';

$title=get_post_meta(get_the_ID(),'vibe_title',true);
if(vibe_validate($title)){
?>
<section id="title" class="title-area">
    <div class="title-content">
        <div class="container">
            <div class="title-text">
                <div class="row">
                    <div class="col-md-12">
                   <?php
                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                        if(vibe_validate($breadcrumbs)){
                         vibe_breadcrumbs();
                        }
                        echo '<h1>'.get_the_title().'</h1>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
<?php
}

?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="content padding_adjusted">
                <?php
                    if(isset($instructors) && is_array($instructors) && count($instructors)){
                        foreach($instructors as $instructor){

			             ?>
			             	<div class="col-md-4 col-sm-4 clear3">
			             		<div class="instructor">
									<?php echo bp_core_fetch_avatar( array( 'item_id' => $instructor,'type'=>'full', 'html' => true ) ); ?>
									<span><?php 
                                    if(bp_is_active('xprofile'))
                                    echo bp_get_profile_field_data( 'field='.$ifield.'&user_id=' .$instructor ); 
                                    ?></span>
									<h3><?php echo bp_core_get_userlink( $instructor ); ?></h3>
									<strong><a href="<?php echo get_author_posts_url(  $instructor ).'instructing-courses/'; ?>"><?php _e('Courses by Instructor ','wplms_modern'); echo  '<span>'.count_user_posts_by_type($instructor,'course').'</span></a>'; ?></strong>
								</div>
			             		<?php
			             			
			             		?>
			             	</div>

			             <?php
				        }
				    }else {
					 echo '<div id="message"><p>'.__('No Instructors found.','wplms_modern').'</p></div>';
					}
                 ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer(wplms_modern_get_footer());

?>