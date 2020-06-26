<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


get_header(wplms_modern_get_header());
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
						<h1 class="page-title">
							<?php if ( is_search() ) : ?>
								<?php
									printf( __( 'Search Results: &ldquo;%s&rdquo;', 'wplms_modern' ), get_search_query() );
									if ( get_query_var( 'paged' ) )
										printf( __( '&nbsp;&ndash; Page %s', 'wplms_modern' ), get_query_var( 'paged' ) );
								?>
							<?php elseif ( is_tax() ) : ?>
								<?php echo single_term_title( "", false ); ?>
							<?php else : ?>
								<?php
									$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

									echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
								?>
							<?php endif; ?>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<section class="main">
	<div class="container">
        <div class="row">
        	<div class="col-md-3 col-sm-4">
		        <?php
		                /**
		                * woocommerce_sidebar hook
		                *
		                * @hooked woocommerce_get_sidebar - 10
		                */
		                do_action('woocommerce_sidebar');
		        ?>
		    </div> 
            <div class="col-md-9 col-sm-8">
                <div class="shop_products content padder">
					<?php do_action( 'woocommerce_archive_description' ); ?>

					<?php if ( is_tax() ) : ?>
						<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
					<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
						<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
					<?php endif; ?>
			                 
			                
					<?php if ( have_posts() ) : ?>

				<div class="shop_countsorter">			
					<?php do_action('woocommerce_before_shop_loop'); ?>
				</div>	
				<ul class="products">

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php woocommerce_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				</ul>

				<?php do_action('woocommerce_after_shop_loop'); ?>

				<?php else : ?>

					<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>

						<p><?php _e( 'No products found which match your selection.', 'wplms_modern' ); ?></p>

					<?php endif; ?>

				<?php endif; ?>

				<div class="clear"></div>

					<?php
						/**
						 * woocommerce_pagination hook
						 *
						 * @hooked woocommerce_pagination - 10
						 * @hooked woocommerce_catalog_ordering - 20
						 */
						do_action( 'woocommerce_pagination' );
					?>
					<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action('woocommerce_after_main_content');
					?>
				</div>
     		</div> 
		    
		 </div>
  	</div> 
</section>
	

<?php get_footer(wplms_modern_get_footer()); ?>
               