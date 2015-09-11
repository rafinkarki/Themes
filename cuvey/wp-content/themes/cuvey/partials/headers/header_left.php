<?php global $cuvey_options,  $woocommerce; $style=$cuvey_options['left_header_style'];
$class='';
if($style=='dark'): $class='sidebar-dark';
else: $class='sidebar-white'; endif;?>
<div id="sidebar-fix" class="sidebar-offcanvas <?php echo $class;?>">
    <div class="col-md-12">
        <div class="side-logo">
            <?php if (isset($cuvey_options['logo']['url']) && $cuvey_options['logo']['url']!='') : ?>            
                <a class="clearfix" href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url($cuvey_options['logo']['url']); ?>" data-at2x="<?php echo esc_url($cuvey_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
            <?php else : ?>
                <a class="clearfix" href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <?php echo esc_attr(get_bloginfo('name')); ?><br>     
                </a>         
            <?php endif; ?>       
        </div><!-- end logo -->
        <?php get_template_part('partials/navbar');  ?>        
        <?php if(isset($cuvey_options['topbar-socialicons']) && $cuvey_options['topbar-socialicons']==1):?>
            <div class="social-icons text-center clearfix">
                <?php if (!empty($cuvey_options['social_facebook'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Facebook','cuvey');?>" href="<?php  echo esc_url($cuvey_options['social_facebook']); ?>"><i class="fa fa-facebook"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_twitter'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Twitter','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_twitter']); ?>"><i class="fa fa-twitter"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_googlep'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Google Plus','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_googlep']); ?>"><i class="fa fa-google-plus"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_vimeo'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Vimeo','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_youtube'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Youtube','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_youtube']); ?>"><i class="fa fa-youtube"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_tumblr'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Tumblr','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_tumblr']); ?>"><i class="fa fa-tumblr"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_dribbble'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Dribble','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_dribbble']); ?>"><i class="fa fa-dribbble"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_pinterest'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Pintrest','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_linkedin'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Linkedin','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></span>
                <?php endif; ?><?php if (!empty($cuvey_options['social_instagram'])) : ?>
                <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Instagram','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_instagram']); ?>"><i class="fa fa-instagram"></i></a></span>
                <?php endif; ?>
            </div><!-- end social icons -->
        <?php endif;?>
        <?php if(isset($cuvey_options['header_copyright']) && $cuvey_options['header_copyright']==1):?>
            <div class="side-copyrights clearfix">
                <p><?php  echo wp_kses_post($cuvey_options['footer_text']); ?></p>
            </div><!-- end copyrights -->
        <?php endif;?>
    </div><!-- end col -->
</div><!-- end sidebar -->

<div id="main" class="row-fluid">
    <div class="col-md-12">
        <div class="visible-sm visible-xs mobile-menu">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="fa fa-bars"></i></button>
        </div>
    </div><!-- end col -->
    <?php
    $breadcrumb=1;
    if($breadcrumb==1 && is_page_template('page-builder.php') ):
        $breadcrumb=0;
    endif;
    if($breadcrumb==1 && is_page_template('page-builder-simple.php') ):
        $breadcrumb=0;
    endif;
    if ($breadcrumb==1) :
         get_template_part('partials/breadcrumb');
    endif;
    ?>