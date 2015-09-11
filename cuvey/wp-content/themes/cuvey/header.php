<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<!DOCTYPE html>
<?php
global $cuvey_options;
 ?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php if(isset($cuvey_options['meta_author']) && $cuvey_options['meta_author']!='') : ?>
<meta name="author" content="<?php echo esc_attr($cuvey_options['meta_author']); ?>">	
<?php else: ?>
<meta name="author" content="<?php esc_attr(bloginfo('name')); ?>">
<?php endif; ?>
<?php if(isset($cuvey_options['meta_author']) && $cuvey_options['meta_desc']!='') : ?>
<meta name="description" content="<?php echo esc_attr($cuvey_options['meta_desc']); ?>">	
<?php endif; ?>
<?php if(isset($cuvey_options['meta_author']) && $cuvey_options['meta_keyword']!='') : ?>
<meta name="keyword" content="<?php echo esc_attr($cuvey_options['meta_keyword']); ?>">	
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
<title><?php wp_title();?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(isset($cuvey_options['favicon']['url'])) :  ?>
<link rel="shortcut icon" href="<?php echo esc_url($cuvey_options['favicon']['url']); ?>">
<?php endif; ?><?php if(isset($cuvey_options['favicon']['url'])) :  ?>
<link rel="apple-touch-icon" href="<?php echo esc_url($cuvey_options['favicon']['url']); ?>">
<?php endif; ?>
       
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php if ( isset($cuvey_options['preloader']) && $cuvey_options['preloader'] == 1 ) : 
    $loader_image=get_template_directory_uri().'/assets/images/spin.svg';?>    
	<div id="loader">
      <div class="loader"> <img src="<?php echo esc_url($loader_image);?>" alt="" > </div>
    </div>
<?php endif ; ?>
<?php 
if(isset($cuvey_options['header_section']) && $cuvey_options['header_section']==1):
    $h_image=get_template_directory_uri().'/assets/images/background/bg-1.jpg';
    if(!empty($cuvey_options['header_image']['url'])){
        $h_image=$cuvey_options['header_image']['url'];
    }
    $style='style= "background:url('.esc_url($h_image).') no-repeat;"';?>
    <div id="sub-banner" <?php echo $style;?>>
      <div class="overlay">
        <div class="container">
            <?php get_template_part('partials/breadcrumb'); ?> 
        <?php if(isset($cuvey_options['search'])&& $cuvey_options['search']==1):
        $pageid=get_the_ID();
        $title_align=get_post_meta($pageid,'cuvey_title_align',true);

        if($title_align=='left'):
            $align='pull-right !important;';
        elseif($title_align=='right'):
            $align='pull-left !important;';
        else:
            $align='';
        endif;?>
            <div class="search <?php echo $align;?>">
                <form role="form" action="#" method="get">
                  <div class="form-group">
                    <input type="search" class="form-control" name="s" placeholder="Type your keyword">
                  </div>
                </form>
            </div>    
        <?php endif;?>     
          
        </div>
      </div>
    </div> 
<?php endif;?>
<!-- Page Wrap ===========================================-->
<div id="wrap"> 
    <?php get_template_part('partials/navbar');?>
<!--======= CONTENT START =========-->
    <div class="content">