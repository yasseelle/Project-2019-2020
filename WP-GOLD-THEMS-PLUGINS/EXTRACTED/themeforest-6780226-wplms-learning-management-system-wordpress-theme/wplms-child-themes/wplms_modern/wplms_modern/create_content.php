<?php
/**
 * Template Name: Create Content
 */
if ( ! defined( 'ABSPATH' ) ) exit;
do_action('wplms_before_create_course_header');

get_header(vibe_get_header());

do_action('wplms_before_create_course_page');

?>
<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
						<?php
						echo '<h1>'.get_the_title().'</h1>';
						the_sub_title();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<section id="content">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="<?php echo $v_add_content;?> content">
                <?php
                    echo do_shortcode('[edit_course]');
                 ?>
            </div>
        </div>
    </div>
</section>
<?php

do_action('wplms_after_create_course_page');

get_footer(wplms_modern_get_footer());
