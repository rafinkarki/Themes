<?php global $cuvey_options; ?>
 <!--======= HEADER =========-->
  <header class="sticky">
    <div class="container">
      <div class="menu"> 
        
        <!--======= LOGO =========-->
        <div class="logo"> 
        <?php if (isset($cuvey_options['logo']['url']) && $cuvey_options['logo']['url']!='') : ?>
            <a href="<?php echo esc_url(site_url()); ?>">
            	<img src="<?php echo esc_url($cuvey_options['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
            	<h3><?php echo esc_attr(get_bloginfo('name')); ?></h3>     
            </a>         
        <?php endif; ?>
        </div>
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"><?php _e('Toggle navigation','cuvey');?></span> <span class="fa fa-bars"></span> </button>
        </div>
        
        <!--======= NAV START =========-->
        <nav class="navbar navbar-default" role="navigation">
        <?php
        if(isset($menu_object) && is_object($menu_object)){
            $args = array(
            'menu'            => $menu_object->slug,
            'items_wrap' => '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            					<ul class="nav navbar-nav">%3$s
            					</ul>
            				</div>',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu()',
            'walker'  => new description_walker()
            );
            } else {
            $args = array(
            'theme_location' => 'primary',
            'items_wrap' => '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            					<ul class="nav navbar-nav">%3$s
            					</ul>
            				</div>',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu()',
            'walker'  => new description_walker()

            );
        }
        wp_nav_menu($args);?>
        </nav>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </header>
 


                           