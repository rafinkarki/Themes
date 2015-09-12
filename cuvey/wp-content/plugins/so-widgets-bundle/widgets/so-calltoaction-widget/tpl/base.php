<div class="passion">
	<?php if( $instance['title'] ):?>
		<h2 class="wow <?php echo $instance['animation'];?>" data-wow-duration="0.6s" data-wow-delay="0.6s"><?php echo wp_kses_post( $instance['title'] ); ?></h2>
	<?php endif;?><?php if( $instance['subtitle'] ):?>
	  	<p class="wow <?php echo $instance['animation'];?>" data-wow-duration="0.6s" data-wow-delay="0.6s"><?php echo wp_kses_post( $instance['subtitle'] ); ?></p>  
	<?php endif;?><?php if( $instance['btnurl']!='') : ?>
		<a class="btn wow <?php echo $instance['animation'];?>" data-wow-duration="0.6s" data-wow-delay="0.6s" href="<?php echo esc_url( $instance['btnurl'] ); ?>" <?php echo ( $instance['new_window'] ? 'target="_blank"' : '' ) ; ?>><?php echo wp_kses_post( $instance['btntext'] ); ?></a> 
	<?php endif;?>
</div>