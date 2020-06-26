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
		<div class="row">
			<div class="col-md-9 col-sm-8">
				<?php

					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							?>
							<div class="content">
								<?php the_content(); ?>
							</div>
							<?php
						}
					} 
				?>
			</div>
			<div class="col-md-3 col-sm-4">
				<?php
                $sidebar = apply_filters('wplms_sidebar','bbpress',get_the_ID());
                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                <?php endif; ?>
            </div>
		</div>
	</div>
</section>

<?php
get_footer(wplms_modern_get_footer());
