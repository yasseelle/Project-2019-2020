<?php
if(!current_user_can('edit_posts') && is_post_type_archive(array('quiz','question','assignment','unit')))
    wp_die(__('Permission denied','wplms_modern'));

$vibe = Wplms_Modern_Init::init();
get_header(wplms_modern_get_header());
$url = $vibe->option('hero_img');

?>
<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
					<?php
                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                        if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                            vibe_breadcrumbs(); 
                    ?>
					<h1><?php

                    if(is_month()){
                        single_month_title(' ');
                    }elseif(is_year()){
                        echo get_the_time('Y');
                    }else if(is_category()){
                        echo single_cat_title();
                    }else if(is_tag()){
                         single_tag_title();
                    }else{
                        post_type_archive_title();
                    }
                     ?></h1>
					<h5><?php echo term_description(); ?></h5>

					</div>
				</div>
			</div>
		</div>
	</div>	
</section>

<section>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'post',
				'page' => $paged
				);

			$the_query = new WP_Query( $args );

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<div class="blogpost">
						<div class="post_content">
							<div class="postmeta">
								<ul>
								<li><?php echo sprintf('%02d', get_the_time('j')).' / '.get_the_time('M').' / '.get_the_time('y');?></li>
								<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a></li>
								<li><?php echo get_comments_number().' comments'; ?></li>
								</ul>
								<?php echo get_the_category_list(); ?>
							</div>	
							<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php
					
				}
				pagination();
			} 
			
			wp_reset_postdata();

		?>
		</div>
	</div>
</section>



<?php
get_footer();
