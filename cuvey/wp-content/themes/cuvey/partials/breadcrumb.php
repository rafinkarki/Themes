<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h3>Forbidden</h3>'; exit();} 
global $cuvey_options;
    
$pageid=get_the_ID();
$page_setting_title=get_post_meta( $pageid, 'cuvey_pagetitle_title',true);
$title_align=get_post_meta($pageid,'cuvey_title_align',true);
$align='class="pull-left"';
if($title_align=='center'):
    $align='';
endif;
if($title_align=='right'):
    $align='class="pull-right"';
endif;
echo '<div class="text">';
    if ( isset($page_setting_title) && $page_setting_title!='') :?>
    <h1 <?php echo $align;?>><?php echo  wp_kses_post($page_setting_title); ?></h1>
    <?php elseif (is_home()) :?>
    <h1 <?php echo $align;?>><?php _e('BLOG', 'cuvey'); ?></h1>
    <?php elseif (is_single()) :?>
    <h1 <?php echo $align;?>><?php echo get_the_title(); ?></h1>
    <?php elseif (is_page()) : ?>
    <h1 <?php echo $align;?>><?php echo get_the_title(); ?></h1>
    <?php elseif (is_author()) : ?>
    <h1 <?php echo $align;?>><?php _e('AUTHOR', 'cuvey'); ?></h1>
    <?php elseif (is_search()) : ?>
    <h1 <?php echo $align;?>><?php _e('SEARCH', 'cuvey'); ?></h1>
    <?php elseif (is_category()) : ?>
    <h1 <?php echo $align;?>><?php _e('CATEGORY', 'cuvey'); ?></h1>
    <?php elseif (is_tag()) : ?>
    <h1 <?php echo $align;?>><?php _e('TAG', 'cuvey'); ?></h1>
    <?php elseif (is_archive()) : ?>
    <?php if (get_post_type() == 'product') : ?>
    <h1 <?php echo $align;?>><?php _e('PRODUCTS', 'cuvey'); ?></h1>
    <?php elseif(is_tax( 'portfolio_filter')): ?>
    <h1 <?php echo $align;?>><?php _e('Portfolio Filter', 'cuvey'); ?></h1>
    <?php else: ?>
    <h1 <?php echo $align;?>><?php _e('ARCHIVE', 'cuvey'); ?></h1>
    <?php endif; ?>
    <?php elseif (get_post_type() == 'product') : ?>
    <h1 <?php echo $align;?>><?php _e('PRODUCTS', 'cuvey'); ?></h1>
    <?php else : ?>
    <h1 <?php echo $align;?>><?php _e('PAGE NOT FOUND', 'cuvey'); ?></h1>
    <?php endif; 
echo '</div>';  