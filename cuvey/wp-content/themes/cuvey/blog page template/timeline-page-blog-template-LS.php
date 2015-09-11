<?php
/*
 * Template Name: Timeline Blog Template LS
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $blog_page,$loop;
$blog_page='timeline-ls';
$s_color='section-white';?>
<?php query_posts('post_type=post&post_status=publish&order=ASC&paged='. get_query_var('paged')); 
$pageid=get_the_ID();
$color=get_post_meta( $pageid, 'cuvey_template_color',true);
if($color=='gray'):
    $s_color='section-gray';
endif;?>
<section class="<?php echo $s_color;?> clearfix">
    <div class="container">       
        <div class="row">
            <div class="pull-left col-md-4 col-sm-4 col-xs-12">  
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="pull-right col-md-8 col-sm-8 col-xs-12">   
             <?php if (have_posts()) :  $loop=1; ?>
                <div class="timeline-wrapper timeline-onecol_ls clearfix">
                    <ul class="timeline">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article-timeline'); 
                            $loop++;?>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; wp_reset_query();?>
            </div>            
        </div>       
    </div>
</section>
<?php get_footer(); ?>