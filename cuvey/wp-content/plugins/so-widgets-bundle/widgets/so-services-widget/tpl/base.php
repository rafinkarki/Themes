<?php if($instance['circular']):
	$style='border-radius';
endif;?>
<?php $rand=rand();?>
<style>
.color-blue<?php echo $rand;?>{
	background:<?php echo esc_attr($instance['color']);?>;
}
.border-blue<?php echo $rand;?>{
	border-color: <?php echo esc_attr($instance['color']);?> !important;
  	color: <?php echo esc_attr($instance['color']);?> !important;
}
</style>
<div class="square-service">
    <div class="widget">
	    <span class="icon-container <?php echo esc_attr($style);?> color-blue<?php echo $rand;?> wow fadeIn" > 
	    	<?php if(empty($instance['image'])):?>
			    <?php echo siteorigin_widget_get_icon($instance['icon'], '');?> 
			    <?php if($instance['number']):?><span class="bubble border-blue<?php echo $rand;?>"><?php echo esc_attr($instance['number']);?></span><?php endif;?>
			<?php else: $src=wp_get_attachment_image_src($instance['image'],'full');?>
				<img src="<?php echo esc_url($src[0]);?>" alt="">
			<?php endif;?>
	    </span>	    
	   	<h3><?php echo wp_kses_post( $instance['title'] ) ?></h3>
	    <p><?php echo wp_kses_post( $instance['text'] ) ?></p>
    </div>
</div><!-- end col -->