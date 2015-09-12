<?php if(!$instance['style']): ?>
	
			<div id="owl-testi-sidebar">
				<?php foreach( $instance['testimonials'] as $i => $testimonial ) : ?>
			        <div class="testi-sidebar">
			        	<?php $src = wp_get_attachment_image_src($testimonial['image'], 'full');?>
				        <img src="<?php echo esc_url($src[0]);?>" alt="" class="alignleft img-circle">
				        <h3><?php echo  esc_attr($testimonial['title']);?></h3>
				        <?php if($testimonial['post']):?><small><?php echo  esc_attr($testimonial['post']);?></small><?php endif;?>
				        <p><?php echo  wp_kses_post($testimonial['text']);?></p>
				    </div><!-- end testi-sidebar -->
			    <?php endforeach;?>   
			</div><!-- end testi-widget -->
	
	<?php else:?>
	<?php if($instance['content']==1):?>
		<div id="parallax-medical">
	<?php endif;?>
		<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
		    <div id="testimonial" class="text-center clearfix">
		    	<?php foreach( $instance['testimonials'] as $i => $testimonial ) : ?>
			        <div class="owl-item">
			           <?php $src = wp_get_attachment_image_src($testimonial['image'], 'full');?>
				        <img src="<?php echo esc_url($src[0]);?>" alt="" class="img-circle">
				        <h3><?php echo  esc_attr($testimonial['title']);?></h3>
				        <?php if($testimonial['post']):?><small><?php echo  esc_attr($testimonial['post']);?></small><?php endif;?>
				        <p><?php echo  nl2br(wp_kses_post($testimonial['text']));?></p>
			        </div><!-- end owl -->
		        <?php endforeach;?> 
		    </div>
		</div>
	<?php if($instance['content']==1):?>
		</div>
	<?php endif;?>
<?php endif;?>
