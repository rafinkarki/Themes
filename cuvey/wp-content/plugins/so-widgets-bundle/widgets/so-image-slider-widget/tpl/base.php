<div class="wow <?php echo $instance['animation'];?>" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="owl-img">
        <?php foreach($instance['images'] as $image):?>
        	<?php $src = wp_get_attachment_image_src($image['image'],'full');  
            //$n_img = aq_resize( $src[0], $width = 555, $height = 235, $crop = true, $single = true, $upscale = true ); ?>
            <div> <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_attr($image['alt']);?>"></a> </div>
                             
        <?php endforeach;?>
    </div>  
</div>