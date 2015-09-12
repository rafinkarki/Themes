<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} $pageid=get_the_ID();?>

<?php  global $cuvey_options; ?>
    <section class="under-contact">
        <?php if (isset($cuvey_options['footer_address'])&& $cuvey_options['footer_address']==1): ?>
            <?php
            if(($cuvey_options['f_email']!='' && $cuvey_options['f_phone']=='' && $cuvey_options['f_location']=='')
                ||($cuvey_options['f_phone']!='' && $cuvey_options['f_location']=='' && !$cuvey_options['f_email']=='')
                ||($cuvey_options['f_location']!='' && $cuvey_options['f_email']=='' && $cuvey_options['f_phone']=='')):
                $class="col-md-12";
            elseif(($cuvey_options['f_email']!='' && $cuvey_options['f_phone']!='' && $cuvey_options['f_location']=='')
                ||($cuvey_options['f_phone']!='' && $cuvey_options['f_location']!='' && $cuvey_options['f_email']=='')
                ||($cuvey_options['f_location']!='' && $cuvey_options['f_email']!='' && $cuvey_options['f_phone']=='')):
                $class="col-md-6";
            else:
                $class="col-md-4";
            endif;?>
          <div class="con-info">
            <div class="container">
              <ul class="row">
                <?php if(isset($cuvey_options['f_email']) && $cuvey_options['f_email']!='') :  ?> 
                    <li class="<?php echo $class;?> wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"> 
                      <i class="fa fa-envelope-o"></i>
                      <p><?php echo esc_attr($cuvey_options['f_email']);?></p>
                    </li>
                <?php endif;?><?php if(isset($cuvey_options['f_phone'])&& $cuvey_options['f_phone']!='') :  ?> 
                    <li class="<?php echo $class;?> wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"> <i class="fa fa-phone"></i>
                      <p><?php echo esc_attr($cuvey_options['f_phone']);?></p>
                    </li>
                <?php endif;?><?php if(isset($cuvey_options['f_location'])&& $cuvey_options['f_location']!='') :  ?> 
                    <li class="<?php echo $class;?> wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s"> <i class="fa fa-map-marker"></i>
                      <p><?php echo wp_kses_post($cuvey_options['f_location']);?></p>
                    </li>
                <?php endif;?>
              </ul>
            </div>
          </div>
        <?php endif;?>
      <div class="container"> 
          <?php if (isset($cuvey_options['f_image']['url'])&& $cuvey_options['f_image']['url']!=''): ?>
              <img class="img-responsive wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" src="<?php echo esc_url($cuvey_options['f_image']['url']);?>" alt="">
          <?php endif;?>
          <?php if (isset($cuvey_options['f_icons'])&& $cuvey_options['f_icons']==1): ?>
            <div class="social_icons">
              <ul class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <?php if (!empty($cuvey_options['social_facebook'])) : ?>
                <li class="facebook"><a href="<?php  echo esc_url($cuvey_options['social_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_twitter'])) : ?>
                <li class="twitter"><a href="<?php  echo esc_url($cuvey_options['social_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_googlep'])) : ?>
                <li class="googleplus"><a href="<?php  echo esc_url($cuvey_options['social_googlep']); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_vimeo'])) : ?>
                <li class="youtube"><a href="<?php  echo esc_url($cuvey_options['social_vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_youtube'])) : ?>
                <li class="youtube"><a href="<?php  echo esc_url($cuvey_options['social_youtube']); ?>"><i class="fa fa-youtube"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_skype'])) : ?>
                <li class="skype"><a href="<?php  echo esc_url($cuvey_options['social_skype']); ?>"><i class="fa fa-skype"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_behance'])) : ?>
                <li class="behance"><a href="<?php  echo esc_url($cuvey_options['social_behance']); ?>"><i class="fa fa-behance"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_linkedin'])) : ?>
                <li class="linkedin"><a href="<?php  echo esc_url($cuvey_options['social_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_flickr'])) : ?>
                <li class="flicker"><a href="<?php  echo esc_url($cuvey_options['social_flickr']); ?>"><i class="fa fa-flickr"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_instagram'])) : ?>
                <li class="instagram"><a href="<?php  echo esc_url($cuvey_options['social_instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php endif; ?><?php if (!empty($cuvey_options['social_dribbble'])) : ?>
                <li class="dribbble"><a href="<?php  echo esc_url($cuvey_options['social_dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php endif; ?>
               
              </ul>
            </div>
          <?php endif;?>
      </div>
    </section> 
     
    <div class="rights">
      <div id="back-to-top"> <i class="fa fa-angle-up"></i> </div>
      <?php if(isset($cuvey_options['footer_text'])) :  ?> 
      <div class="container">
        <p><?php  echo wp_kses_post($cuvey_options['footer_text']); ?></p>
      </div>
      <?php endif;?>
    </div>    
    </div><!--content ends-->
</div>   <!--wrapper ends-->   

<?php if(isset($cuvey_options['meta_javascript']) && $cuvey_options['meta_javascript']!='') 
echo wp_kses_post($cuvey_options['meta_javascript']); ?>  
<?php wp_footer(); ?>   
    </body>
</html>

