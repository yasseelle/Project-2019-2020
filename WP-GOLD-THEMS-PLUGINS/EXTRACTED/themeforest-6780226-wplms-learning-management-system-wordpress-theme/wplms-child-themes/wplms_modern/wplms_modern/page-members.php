<?php
/**
 * Template Name: Members Access Only
 */

if(!is_user_logged_in())
    wp_die('<h2>'.__('This Page is only accessible to Members','wplms_modern').'</h2>'.'<p>'.__('The page is only accessible to site Users, please register in site to see this content.','wplms_modern').'</p>',__('Members only page','wplms_modern'),array('back_link'=>true));

get_header(wplms_modern_get_header());


if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part('title','area');

    $v_add_content = get_post_meta( $post->ID, '_add_content', true );
 
?>
<section id="content">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12">

                <div class="<?php echo $v_add_content;?> content">
                    <?php
                        the_content();
                     ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endwhile;
endif;
?>

<?php
get_footer(vibe_get_footer());
?>