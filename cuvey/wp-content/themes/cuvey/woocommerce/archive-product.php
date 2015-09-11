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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); global $cuvey_options;
$shop_layout=$cuvey_options['shop_layout'];?>
<?php
		/**
	 * woocommerce_before_main_content hook
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
?>
<?php do_action( 'woocommerce_archive_description' ); ?>
<?php if($shop_layout=='fullwidth'):
	
	 if ( have_posts() ) : ?>
			<div id="shop-fullwidth">
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="carousel-shop col-md-3 col-sm-6">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div>	
				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>
			</div>
			
			<div class="clearfix"></div>
			<br><br>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
	
<?php else:
 	if($shop_layout=='left'): 
        $sidebar='left'; 
        $content='right';
    else: 
        $sidebar='right'; 
        $content='left'; 
    endif;?>
	<div class="row">
		 <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
            <div id="sidebar" class="clearfix">
                <?php if ( is_active_sidebar( 'cuvey-widgets-woocommerce-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'cuvey-widgets-woocommerce-sidebar' );  ?>
                <?php } ?> 
            </div>
        </div>
        <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">            
            <?php if ( have_posts() ) : ?>
				<div id="shop-fullwidth" class="row">
				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="carousel-shop col-md-4 col-sm-6">
							<?php wc_get_template_part( 'content', 'product' ); ?>
						</div>	
					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>
				</div>
				
				<div class="clearfix"></div>
				<br><br>

				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>
        </div>    
	</div>
<?php endif;?>
<?php
/**
 * woocommerce_after_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
<?php get_footer( 'shop' ); ?>
