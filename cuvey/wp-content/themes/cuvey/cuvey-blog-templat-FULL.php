<?php
/*
 * Template Name: Blog Template
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php query_posts('post_type=post&post_status=publish&order=ASC&paged='. get_query_var('paged')); ?>

<div id="blog" class="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12 pull-right">
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
        </div>      
    </div>
</div>
<?php get_footer(); ?>