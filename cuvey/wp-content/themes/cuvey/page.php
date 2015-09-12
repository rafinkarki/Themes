<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options; $archive_layout=$cuvey_options['archive_layout'];?>
<div id="blog" class="blog-post">
    <div class="container">
    <?php
        if($archive_layout=='fullwidth'):?>
        <div class="col-md-12 col-sm-8 col-xs-12 pull-right"><?php
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
        ?>
        </div><?php  
        else:
            if($archive_layout=='left'): 
                $sidebar='left'; 
                $content='right';
            else: 
                $sidebar='right'; 
                $content='left'; 
            endif;?>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 <?php echo esc_attr($content);?>">
                    <?php if (have_posts()) : ?>
                        
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article'); ?>
                        <?php endwhile; ?>
                       
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; wp_reset_query();?>            
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12 <?php echo esc_attr($sidebar);?>">
                    <div class="right-bar">
                        <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                            <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                        <?php } ?> 
                    </div>
                </div>
            </div> <?php
        endif;
    ?>
    </div>
</div>

<?php get_footer(); ?>