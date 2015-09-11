<?php
/*
 * Template Name: Masonry Two Columns Blog Template
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $blog_page;
$blog_page='masonry';
$s_color='section-white';?>
<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); 
$pageid=get_the_ID();
$color=get_post_meta( $pageid, 'cuvey_template_color',true);
if($color=='gray'):
    $s_color='section-gray';
endif;?>
<section class="<?php echo $s_color;?> clearfix">
    <div class="container">               
         <?php if (have_posts()) : ?>
             <div class="mixed-container masonry_wrapper_blog row wow fadeInUp" data-id="2">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="item">
                        <?php get_template_part('partials/article'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php if ($wp_query->max_num_pages>1) : ?>
                <?php cuvey_pagination(); ?>
            <?php endif; ?>
        <?php else : ?>
            <?php get_template_part('partials/nothing-found'); ?>
        <?php endif; wp_reset_query(); ?>             
    </div>
</section>
<?php get_footer(); ?>