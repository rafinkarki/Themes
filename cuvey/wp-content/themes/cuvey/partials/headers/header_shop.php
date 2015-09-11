<?php global $cuvey_options,  $woocommerce;
$header=$cuvey_options['header-style'];
$h_flag=0;
$h_style='';
$h_shadow=1;
?>

<div id="collapse1" class="collapse myform">
    <div class="container-fluid ">
        <div class="topbar">
            <form role="search" action="#" class="search_form_top" method="get">
                <input type="text" placeholder="<?php _e('What are you looking for?','cuvey'); ?>" name="s" class="form-control" autocomplete="off">
            </form>
        </div>
    </div>
</div>

<?php if(isset($cuvey_options['topbar']) && $cuvey_options['topbar']==1):?>
    <section id="topbar" class="clearfix">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="callus">
                    <div class="dropdown spanme">
                        <div class="">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                                <?php do_action('icl_language_selector'); ?>
                            </button>                            
                        </div>
                   </div>
                    <?php if (!empty($cuvey_options['topbar-email'])) : ?><div class="spanme btn btn-default dropdown-toggle"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($cuvey_options['topbar-email']); ?>"><?php echo esc_attr($cuvey_options['topbar-email']); ?></a></div><?php endif; ?> 
                    <?php if (!empty($cuvey_options['topbar-phone'])) : ?><div class="spanme btn btn-default dropdown-toggle"><i class="fa fa-phone"></i> <?php  echo esc_attr($cuvey_options['topbar-phone']); ?></div><?php endif; ?>
                    <?php if (!empty($cuvey_options['topbar-text'])) : ?><div class="spanme btn btn-default dropdown-toggle"><?php  echo esc_attr($cuvey_options['topbar-text']); ?></div><?php endif; ?>
                                
                </div><!-- end callus -->
            </div><!-- end columns -->
            <?php if(isset($cuvey_options['topbar-socialicons']) && $cuvey_options['topbar-socialicons']==1):?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-icons pull-right">
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
                </div><!-- end columns -->
            <?php endif;?>
        </div><!-- end container -->
    </section>
<?php endif;?>
  <header id="style10" class="header">
            <div class="container">
                <div class="menu-wrapper">
                    <nav id="navigation" class="navbar yamm" role="navigation">
                        <div class="navbar-inner">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only"><?php _e('Toggle navigation','cuvey');?></span>
                                    <i class="fa fa-bars fa-2x"></i>
                                </button>
                                <?php if (isset($cuvey_options['logo']['url']) && $cuvey_options['logo']['url']!='') : ?>
                                    <a id="brand" class="clearfix navbar-brand" href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url($cuvey_options['logo']['url']); ?>" data-at2x="<?php echo esc_url($cuvey_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
                                <?php else : ?>
                                    <a id="brand" class="clearfix navbar-brand" href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    <?php echo esc_attr(get_bloginfo('name')); ?><br>     
                                    </a>         
                                <?php endif; ?>
                            </div><!-- end navbar-header -->

                            <div id="navbar-collapse" class="navbar-collapse collapse clearfix">
                                <?php
                                    // Include Navigation
                                    get_template_part('partials/navbar');
                                ?>     
                                

                            </div><!-- end navbar-callopse -->
                        </div><!-- end navbar-inner -->
                    </nav><!-- end navigation -->
                </div><!-- menu wrapper -->
            </div>
        </header><!-- end header -->


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