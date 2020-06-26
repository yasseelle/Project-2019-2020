<?php
/**
 * Page
 *
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	wplms_modern/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(wplms_modern_get_header());
?>
<?php get_template_part('title','area'); ?>
<section>
	<div class="container">
		<?php

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<div class="content">
						<?php the_content(); ?>
					</div>
					<div class="testimonial-author">
                        <?php
                            if(has_post_thumbnail()){
                                echo get_the_post_thumbnail();    
                            }else{
                                echo get_avatar( 'email@example.com', 96 );
                            }
                            
                            echo '<h4>'.get_post_meta(get_the_ID(),'vibe_testimonial_author_name',true).'
                            <span>'.get_post_meta(get_the_ID(),'vibe_testimonial_author_designation',true).'</span></h4>';
                        ?>
                    </div>
					<?php
				}
			} 
		?>
	</div>
</section>

<?php
get_footer(wplms_modern_get_footer());
