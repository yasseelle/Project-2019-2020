<?php
/**
 * Template Name: Notes and Discussion
 */

$vibe = Wplms_Modern_Init::init();
get_header(wplms_modern_get_header());
$url = $vibe->option('hero_img');

do_action('wplms_before_notes_discussion');



$user_id = get_current_user_id();  

//postid , user_id, status, comment_type and pagination
/*array(
	'author_email'        => '',
	'author__in'          => '',
	'author__not_in'      => '', 
	'ID'                  => '',
	'karma'               => '',
	'number'              => '',
	'offset'              => '',
	'orderby'             => '',
	'order'               => 'DESC',
	'parent'              => '',
	'post_author__in'     => '',
	'post_author__not_in' => '',
	'post_id'             => 0,
	'post_author'         => '',
	'post_name'           => '',
	'post_parent'         => '',
	'post_status'         => 'publish',
	'post_type'           => 'unit',
	'status'              => 'approve',
	'type'                => '',
	'user_id'             => $user_id,
	'search'              => '',
	'count'               => false,
	'meta_key'            => '',
	'meta_value'          => '',
	'meta_query'          => ''
)
*/
$number = vibe_get_option('loop_number');
if(!is_numeric($number))
	$number = 5;
$args = apply_filters('wplms_notes_dicussion_args',array(
	'number'              => $number,
	'post_status'         => 'publish',
	'post_type'           => 'unit',
	'status'              => 'approve',
));
?>
<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
	                   <h1><?php the_title(); ?></h1>
	                   <h5> <?php the_sub_title(); ?></h5>
            		</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
            	<form action="" method="post" id="notes-discussion-form">
					<div class="note-tabs">
						<ul>
							<li id="wplms_all"class="selected"><a href=""><?php _e('All Notes & Discussions','wplms_modern'); ?></a></li>
							<?php $selected = 1;
							if(current_user_can('manage_options')){
								$selected =0;
								?>
								<li id="wplms_all_public_discussions"><a href=""><?php _e('All Discussions','wplms_modern'); ?></a></li>
								<?php
							}
							if(current_user_can('edit_posts')){
								?>
								<li id="wplms_instructor_unit_notes"><a href=""><?php _e('Unit Notes','wplms_modern'); ?></a></li>
								<li id="wplms_instructor_unit_discussions"><a href=""><?php _e('Unit Discussions','wplms_modern'); ?></a></li>
								<?php
								$selected =0;
							}
							?>
							<li id="wplms_my_notes_public"><a href=""><?php _e('My Discussions','wplms_modern'); ?></a></li>
							<li id="wplms_my_notes_private"><a href=""><?php _e('My Notes','wplms_modern'); ?></a></li>
						</ul>
					</div><!-- .item-list-tabs -->
				</form>

                <div class="content">
                	<div id="notes_query"><?php echo json_encode($args); ?></div>
                	<div id="notes_discussions">
                    <?php
                    if(is_user_logged_in() || (!is_user_logged_in() && count($args['comment__in']))){
                    	$comments_query = new WP_Comment_Query;
						$comments = $comments_query->query( $args );

						// Comment Loop
						$vibe_notes_discussions= new vibe_notes_discussions();
						$vibe_notes_discussions->comments_loop($comments);
                    }else{
                    	?>
                    	<div class="message"><?php _e('No public comments found !','wplms_modern') ?></div>
                    	<?php
                    }
					
					?>
					</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="sidebar">
                    <?php
                    $sidebar = apply_filters('wplms_sidebar','mainsidebar',get_the_ID());
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer(wplms_modern_get_footer());