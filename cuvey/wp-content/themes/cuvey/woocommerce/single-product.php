<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
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
 if($shop_layout=='fullwidth'):?>
 	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div><?php
 else:if($shop_layout=='left'): 
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
        	<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div><?php 
 endif;?>
	
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
