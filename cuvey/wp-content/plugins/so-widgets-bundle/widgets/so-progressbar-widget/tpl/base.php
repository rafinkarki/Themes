<div class="skills">
    <ul>
		<?php foreach( $instance['progressbar'] as $progressbar ) : $rand=rand();?>
			<style>
				.color-<?php echo $rand;?>{
					background-color:<?php echo esc_html($progressbar['color']);?> !important;
				}
			</style>	
			<li>  
				<div class="progress wow <?php echo $instance['animation'];?>" data-wow-duration="1s" data-wow-delay="0.2s">
					<div class="progress-bar color-<?php echo $rand;?>" role="progressbar" aria-valuenow="<?php  echo esc_html($progressbar['percent']);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php  echo esc_html($progressbar['percent']);?>%;">
				    <h5><?php echo esc_attr($progressbar['title']); ?></h5>
				    <span><?php echo esc_html($progressbar['percent']);?><?php _e('%','siteorigin_widgets')?></span>
				</div>
			</li>
		<?php endforeach;?> 
	</ul>
</div>  