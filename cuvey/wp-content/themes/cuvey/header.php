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
if(!is_single() && !is_page_template('page-builder.php')):
    get_template_part('partials/header');
endif;?>
<?php if(is_page_template('page-builder.php') && isset($cuvey_options['home_slider']) && $cuvey_options['home_slider']==1 ):
    get_template_part('partials/header-home');
endif;?>
<!-- Page Wrap ===========================================-->
<div id="wrap"> 
    <?php if(!is_single()) get_template_part('partials/navbar');?>
<!--======= CONTENT START =========-->
    <div class="<?php echo (is_single())? 'content gray-con-bg':'content';?>">