<?php global $cuvey_options;?>
<div id="home">   
  <!--Full Slider===========================================-->
  <div id="slides">
    <div class="logo-top"> <a href="<?php echo esc_url(site_url()); ?>">
      <h3><?php echo get_bloginfo('name');?></h3>
      </a>
      <hr>
    </div>
    <div class="slides-container"> 
      
      <!--Full Slider===========================================-->
      <div> <?php 
      $image=esc_url(get_template_directory_uri().'assets/images/slide/slide-bg-1.jpg');
      if(isset($cuvey_options['image_slide1']['url']) && $cuvey_options['image_slide1']['url']!=''):
                $image=esc_url($cuvey_options['image_slide1']['url']);?>
      <img src="<?php echo esc_url($image);?>" alt=""><?php endif;?>
        <div class="overlay">
          <div class="text">
            <?php if($cuvey_options['title_slide1'] !==''):?>
                <h5 class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.7s"><?php echo esc_attr($cuvey_options['title_slide1']);?></h5>
            <?php endif;?>
            <?php if($cuvey_options['subtitle_slide1'] !==''):?>
                <span class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.9s"><?php echo wp_kses_post($cuvey_options['subtitle_slide1']);?></span>
            <?php endif;?>
            <?php if($cuvey_options['text_slide1'] !==''):?>
                <h1 class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="1.1s"><?php echo esc_attr($cuvey_options['text_slide1']);?></h1>
            <?php endif;?>
            <?php if($cuvey_options['id_slider'] !==''):?>
                <div class="scroll  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="1.4s"> <a href="#<?php echo esc_attr($cuvey_options['id_slider']);?>"><i class="fa fa-angle-down"></i></a> </div>
            <?php endif;?>
          </div>
        </div>
      </div>
      <!--Full Slider===========================================-->
      
      <div> <?php 
      $image=esc_url(get_template_directory_uri().'assets/images/slide/slide-bg-1.jpg');
      if(isset($cuvey_options['image_slide2']['url']) && $cuvey_options['image_slide2']['url']!=''):
                $image=esc_url($cuvey_options['image_slide2']['url']);?>
      <img src="<?php echo esc_url($image);?>" alt=""><?php endif;?>
        <div class="overlay">
          <div class="text">
            <?php if($cuvey_options['title_slide2'] !==''):?>
                <h5 class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.7s"><?php echo esc_attr($cuvey_options['title_slide2']);?></h5>
            <?php endif;?>
            <?php if($cuvey_options['subtitle_slide2'] !==''):?>
                <span class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.9s"><?php echo wp_kses_post($cuvey_options['subtitle_slide2']);?></span>
            <?php endif;?>
            <?php if($cuvey_options['text_slide2'] !==''):?>
                <h1 class="wow fadeIn" data-wow-duration="0.8s" data-wow-delay="1.1s"><?php echo esc_attr($cuvey_options['text_slide2']);?></h1>
            <?php endif;?>
            <?php if($cuvey_options['id_slider'] !==''):?>
                <div class="scroll  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="1.4s"> <a href="#<?php echo esc_attr($cuvey_options['id_slider']);?>"><i class="fa fa-angle-down"></i></a> </div>
            <?php endif;?>          
          </div>
        </div>
      </div>
    </div>
    <nav class="slides-navigation"> <a href="#" class="next"><i class="fa fa-angle-right"></i></a> <a href="#" class="prev"><i class="fa fa-angle-left"></i></a> </nav>
  </div>
</div>