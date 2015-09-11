<?php
/*
 * Template Name: Classic Three Columns Blog Template RS
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $blog_page;
$blog_page='classic-three';?>

<?php $s_color='section-white';?>
<?php query_posts('post_type=post&post_status=publish&order=ASC&paged='. get_query_var('paged')); 
$pageid=get_the_ID();
$color=get_post_meta( $pageid, 'cuvey_template_color',true);
if($color=='gray'):
    $s_color='section-gray';
endif;?>
<?php $i=1; $col='';?>
<section class="<?php echo $s_color;?> clearfix">
    <div class="container">
         <div class="pull-right col-md-4 col-sm-4 col-xs-12">  
            <div id="sidebar" class="clearfix">
                <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                <?php } ?> 
            </div>
        </div>
        <div class="pull-left col-md-8 col-sm-8 col-xs-12">   
            <?php if (have_posts()) : ?>
            <div id="blog-page" class="row clearfix"> 
                <?php while (have_posts()) : the_post();?>
                    <?php if($i==1) : $col='first'; elseif($i==3): $col='last'; else: $col=''; endif;?>
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn <?php echo $col;?> animated">
                        <?php get_template_part('partials/article');?>
                    </div>
                <?php 
                $i++;
                if($i>3) $i=1;
                endwhile; ?>
            </div> 
            <?php if ($wp_query->max_num_pages>1) : ?>
                <?php cuvey_pagination(); ?>
            <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; wp_reset_query();?>   
        </div>            
    </div>
</section>
<?php get_footer(); ?>