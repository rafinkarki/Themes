<?php
/*
 * Template Name: Blog Template RS
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php query_posts('post_type=post&post_status=publish&order=ASC&paged='. get_query_var('paged')); ?>

<div id="blog" class="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 pull-left">
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
            <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                <div class="right-bar">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
        </div>      
    </div>
</div>
<?php get_footer(); ?>