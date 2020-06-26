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

$title=get_post_meta(get_the_ID(),'vibe_title',true);
if(empty($title) || vibe_validate($title)){
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
						echo '<h1>';the_title();echo '</h1>';
						the_sub_title();
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
		<div class="col-md-8 col-md-offset-2">
			<?php
			the_content();
			?>
			<?php comments_template(); ?>
		</div>
	</div>
</section>		
<?php
	endwhile;
endif;	
?>

<?php
$next_post = get_next_post();

if ( is_a( $next_post , 'WP_Post' ) ) { ?>
	<section class="more-title-area">
		<?php if(has_post_thumbnail($next_post->ID)){ 
			$url = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'full' ); 
		}else{
			$url = $vibe->option('hero_img');
		}
				?>
		<div class="more-title-content" style="background:url(<?php echo $url[0]; ?>) no-repeat 50% 50%; ">
			<div class="container">
				<div class="more-title-text">
					<div class="row">
						<div class="col-md-12">
							<h2><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a></h1>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
  
<?php } ?>
<?php
get_footer(wplms_modern_get_footer());
