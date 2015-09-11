<?php
/*
 * Template Name: Restaurant Shop Page                 
 *
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

get_header(); global $cuvey_options,$product;?>
<?php $s_color='section-white';$b_color='pagination-gray';
$pageid=get_the_ID();
$color=get_post_meta( $pageid, 'cuvey_template_color',true);
if($color=='gray'):
    $s_color='section-gray';
	$b_color='pagination-white';
endif;?>
<?php if(is_plugin_active('woocommerce/woocommerce.php')):?>
<?php query_posts('post_type=product&post_status=publish&posts_per_page=9&paged='. get_query_var('paged')); ?>
<?php
do_action( 'woocommerce_before_my_page' );
?>
<section class="<?php echo $s_color;?> clearfix"> 
	<div class="container">
		<div id="second" class="bf">
			<?php 
	        $args = array(
	        'type'                     => 'product',
	        'taxonomy'                 => 'product_cat',
	        'pad_counts'               => false 
	        );         
	        $categories = get_categories( $args );
	        ?>        
	        <ul class="filter">        
	            <li><a data-cat="all" href="#" class="active"><?php _e( 'All', 'cuvey' ); ?></a></li>
	            <?php foreach($categories as $category) { ?>
	            <li><a data-cat="<?php echo $category->slug; ?>" href="#"><?php echo $category->name; ?></a></li>
	            <?php } ?>
	        </ul>
	         <?php if (have_posts()) : ?>
                <ul id="three-col-portfolio" class="items row-fluid">  
                <?php while (have_posts()) : the_post(); ?>
                <?php
                $portfolio_item_title = get_the_title( $post->ID );
                $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
                $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                 $terms = get_the_terms( $post->ID, 'product_cat' );          
                if ( $terms && ! is_wp_error( $terms ) ) : 

                    $term_links = array();
                    foreach ( $terms as $term ) {
                        $term_links[] = $term->slug;
                    }
                                        
                    $filters = join( " ", $term_links );
                endif;   
                ?>
                
                <li class="<?php echo $filters; ?>">
                    <div class="bf-single-item wow fadeIn">
                        <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                           $n_img = aq_resize( $img_url[0], $width = 368, $height = 368, $crop = true, $single = true, $upscale = true );
                        ?><img src="<?php echo esc_url($n_img);?>" alt=""> 
                        <div class="caption white-effect">
                            <div class="cap-in">                                    
                                <h3><a href="<?php echo esc_url( $product->add_to_cart_url() );?>" class="btn btn-primary border-radius" title=""><?php _e('Add to Cart','cuvey');?></a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="caps-desc restaurant">
                        <h3><a href="<?php echo the_permalink();?>" title=""><?php cuvey_post_title(); ?></a></h3>
                        <?php $price = get_post_meta( get_the_ID(), '_regular_price', true);
				        $currency = get_woocommerce_currency_symbol();
				        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
				        if($sale!=''){
				        echo '<p>'.$currency.$sale .' <span class="old-price">'. $currency.$price.'</span>';				     
				        }
				        else{
				            if(!empty($price))
				            echo '<p>'.$currency.$price.'</p>';
				        }
				        ?>				       
                    </div>
                </li>
                <?php endwhile; ?>              
            </ul>
            <nav class="text-center <?php echo $b_color;?>">
		        <?php if ($wp_query->max_num_pages>1) : ?>
		            <?php cuvey_pagination(); ?>
		        <?php endif; ?>
		    </nav> 
            <?php else : ?>
                <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            <?php endif; wp_reset_query();?>
		</div>
	</div>
</section><?php endif;?>
<?php get_footer( ); ?>
