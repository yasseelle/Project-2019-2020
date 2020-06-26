<?php
/**
 * Template Name: Left Sidebar Page
 */

get_header(wplms_modern_get_header());
if ( have_posts() ) : while ( have_posts() ) : the_post();

get_template_part('title','area'); 
?>
<section id="content">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-md-push-3 col-sm-push-3">
                <div class="content">
                    <?php
                        the_content();
                        $page_comments = vibe_get_option('page_comments');
                        if(!empty($page_comments))
                            comments_template();
                     ?>
                </div>
                <?php
                
                endwhile;
                endif;
                ?>
            </div>
            <div class="col-md-3 col-sm-4 col-md-pull-9 col-sm-pull-8">
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
get_footer(vibe_get_footer());
?>