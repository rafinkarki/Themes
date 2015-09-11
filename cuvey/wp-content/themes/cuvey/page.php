<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options;
$shop_layout=$cuvey_options['shop_layout'];
$s_color='section-white';
$color=$cuvey_options['template_color'];
if($color=='gray'):$s_color='section-gray';endif;?>

<section class="<?php echo $s_color;?> clearfix">
    <div class="container">
    <?php if(cuvey_detect_woocommerce()!=true) :?> 
        <div id="blog-page" class="row clearfix">
            <div class="pull-left col-md-8 col-sm-8 col-xs-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article'); ?>                            
                        <?php endwhile; ?>
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>

                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>
            </div>

            <div class="pull-right col-md-4 col-sm-4 col-xs-12">
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>

        </div>
    <?php else:
        if($shop_layout=='fullwidth'):
            if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/article'); ?>                            
                <?php endwhile; ?>
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>

            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif;   
        else:
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
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article'); ?>                            
                        <?php endwhile; ?>
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>

                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>                
                </div>             
            </div><?php
        endif;
    endif;?>
    </div>
</section>


<?php get_footer(); ?>