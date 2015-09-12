<div class="cuvey tittle align-<?php echo $instance['align'];?>">
	<?php if(!empty( $instance['title'])):?>
		<h<?php  echo esc_attr($instance['size']);?> class="wow <?php echo $instance['animation'];?>" data-wow-duration="0.6s" data-wow-delay="0.6s"><?php echo wp_kses_post( $instance['title'] ); ?></h<?php  echo esc_attr($instance['size']);?>>
	<?php endif;?>
	<?php if(!empty($instance['line']))  : ?>
		<hr class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.7s">
	<?php endif; ?>
	<?php if(!empty($instance['subtitle']))  : ?>
		<p class="wow <?php echo $instance['animation'];?>" data-wow-duration="0.6s" data-wow-delay="0.6s"><?php echo wp_kses_post( $instance['subtitle'] ); ?></p>
	<?php endif; ?>
</div>