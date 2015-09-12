<?php if($instance['style']=='alternate'):?>
	<div class="features service_vertical_box">
	    <div class="wow <?php echo esc_attr($instance['icon_animation']);?> service-icon <?php echo $instance['circular']? 'border-radius':'';?>">
	        <?php echo '<div class="feature">';
	        echo siteorigin_widget_get_icon($instance['icon'], '');
	        echo '</div>';?> 
	    </div>
	    <h3><?php echo wp_kses_post( $instance['title'] ) ?></h3>
	    <p><?php echo wp_kses_post( $instance['subtitle'] ) ?></p>
	</div><!-- end service_vertical_box -->
<?php else:?>
	<div class="row myservices">
		<div class="service-style-1 clearfix">
		    <div class="title">
		        <h3><?php echo siteorigin_widget_get_icon($instance['icon'], '');?> <?php echo wp_kses_post( $instance['title'] ) ?></h3>
		        <p><?php echo wp_kses_post( $instance['subtitle'] ) ?></p>
		    </div><!-- end desctip -->
		</div><!-- end service-style-1 -->
	</div>
<?php endif;?>