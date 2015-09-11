<?php global $product; ?>
	<li><?php  $thumbnail =get_post_thumbnail_id( $product->id );
           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
           $n_img = aq_resize( $img_url[0], $width = 81, $height = 98, $crop = true, $single = true, $upscale = true ); 
        ?><img src="<?php echo esc_url($n_img);?>" class="alignleftimg"/> 
		<h3><a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo $product->get_title(); ?>		
		</a></h3>
		<span class="metabox">
            <span class="price"><?php echo $product->get_price_html(); ?></span>
            <?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
        </span>	
	</li>   
