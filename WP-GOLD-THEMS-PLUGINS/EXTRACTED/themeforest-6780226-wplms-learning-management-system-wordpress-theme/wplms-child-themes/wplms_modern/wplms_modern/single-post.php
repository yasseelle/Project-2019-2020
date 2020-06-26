<?php
/**
 * Single.php
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	wplms_modern/single
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(wplms_modern_get_header());

$vibe = Wplms_Modern_Init::init();

if(have_posts()):
	while(have_posts()):the_post();
?>
<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
						<?php 
	                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
	                        if(!empty($breadcrumbs) && vibe_validate($breadcrumbs)){
	                            vibe_breadcrumbs();
	                        }   
	                    ?>
						<?php
						global $post;

						echo '<a href="'.bp_core_get_user_domain($post->post_author).'" title="'.sprintf(__('Posted by %s','wplms_modern'),bp_core_get_username($post->post_author)).'" class="clear" style="display:block;">'.bp_core_fetch_avatar(array(
    						'item_id' => $post->post_author, 
    						'type' => 'thumb')).'</a>';
						
						echo '<h1>';the_title();echo '</h1>';
						the_sub_title();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="content">
                    <?php the_content();
                     ?>
                     <div class="tags">
                    <?php echo '<div class="indate"><i class="icon-clock"></i> ';the_date();echo '</div>';the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
                    <?php wp_link_pages('before=<div class="page-links"><ul>&link_before=<li>&link_after=</li>&after=</ul></div>'); ?>
                        <div class="social_sharing">
                            <?php 
                             if(function_exists('social_sharing'))
                                echo social_sharing(); 
                            ?>   
                        </div>
                    </div>
                </div>
                <?php
                        $prenex=get_post_meta(get_the_ID(),'vibe_prev_next',true);
                        if(vibe_validate($prenex)){
                    ?>
                    <div class="prev_next_links">
                        <ul class="prev_next">
                            <?php 
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            echo '<li>';
                            if(!empty($prev_post))
                            echo '<a href="'.get_permalink($prev_post->ID).'" class="prev">'.get_the_post_thumbnail($prev_post->ID,'thumbnail').'<span>'.$prev_post->post_title.'</span></a>';

                            echo '<li>';
                            if(!empty($next_post))
                            echo '<a href="'.get_permalink($next_post->ID).'" class="next">'.get_the_post_thumbnail($next_post->ID,'thumbnail').'<span>'.$next_post->post_title.'</span></a>';
                            echo '</li>';
                            ?>
                        </ul>    
                    </div>
                    <?php
                        }
                    ?>
                </div>
                
                <?php
                    $author = getPostMeta($post->ID,'vibe_author',true);
                    if(vibe_validate($author)){ ?>
                    <div class="postauthor">
                        <div class="auth_image">
                            <?php
                                echo get_avatar( get_the_author_meta('email'), '160');
                                $instructing_courses=apply_filters('wplms_instructing_courses_endpoint','instructing-courses');
                             ?>
                        </div>
                        <div class="author_info">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="readmore link"><?php _e('Posts','wplms_modern'); ?></a><a class="readmore">&nbsp;|&nbsp;</a><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ).$instructing_courses; ?>" class="readmore link"><?php _e('Courses','wplms_modern'); ?></a>
                            <h6><?php the_author_meta( 'display_name' ); ?></h6>
                            <div class="author_desc">
                                <p>
                                    <?php  the_author_meta( 'description' );?>
                                </p>
                                <p class="website"><?php _e('Website','wplms_modern');?> : <a href="<?php  the_author_meta( 'url' );?>" target="_blank"><?php  the_author_meta( 'url' );?></a></p>
                                <?php
                                    $author_id=  get_the_author_meta('ID');
                                    vibe_author_social_icons($author_id);
                                ?>  
                            </div>     
                        </div>    
                    </div>
                    <?php
                    } 
                
                comments_template();
                endwhile;
                endif;
                ?>
            </div>
            </div>
		</div>
	</div>
</section>		
<?php
get_footer(wplms_modern_get_footer());
