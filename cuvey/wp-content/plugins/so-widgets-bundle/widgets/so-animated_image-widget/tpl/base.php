<?php $src = wp_get_attachment_image_src($instance['image'],$instance['size']); ?>
<?php if(!empty($instance['title'])):?>
	<div class="tittle">
	  <h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><?php echo wp_kses_post($instance['title']);?></h2>
	</div>
<?php endif;?>
<?php if($src):?>
	<div class="intro-sec">
	  <div class="row"> 
	    <!--======= INTRO IMAGE =========-->
	    <div class="col-md-12 <?php echo $instance['align'];?>-align wow <?php echo esc_attr($instance['animation']);?>" data-wow-duration="0.5s" data-wow-delay="0.7s"> <img class="img-responsive" src="<?php echo esc_url($src[0]);?>" alt=""> </div>
	  </div>
	</div>
<?php endif;?>