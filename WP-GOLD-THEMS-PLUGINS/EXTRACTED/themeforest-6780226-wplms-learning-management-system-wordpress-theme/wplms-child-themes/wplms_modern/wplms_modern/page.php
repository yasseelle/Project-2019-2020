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

get_template_part('title','area'); 
?>

<section id="content">
	<div class="container">
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
</section>

<?php
get_footer(wplms_modern_get_footer());
