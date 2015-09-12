<?php
$query = siteorigin_widget_post_selector_process_query( $instance['posts'] );
$the_query = new WP_Query( $query );
?>
<div id="home-blog" class="row clearfix">
<?php if($the_query->have_posts()) : ?>
	<?php while($the_query->have_posts()) : $the_query->the_post(); ?>

    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
        <div class="blog-item">
            <div class="ImageWrapper">
            	 <?php if (has_post_thumbnail()) : 
	            	$att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
		            $thumb = get_post($att);
		            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
		            else { $att_ID = $post->ID; $att_url = $post->guid; }
		            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
	            	$thumbnail = get_post_thumbnail_id(get_the_ID());                        
	               	$img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
	               	$n_img = aq_resize( $img_url[0], $width = 360, $height = 331, $crop = true, $single = true, $upscale = true ); 
	                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/>
	             <?php endif;?>                                 
                <div class="ImageOverlayLi"></div>
                <div class="Buttons StyleH">
                     <a href="<?php the_permalink(); ?>" title="<?php echo $att_title; ?>"><span class="bubble border-radius"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></span></a>
                </div>
            </div>
            <div class="meta">
                <span> <?php if (get_the_category()) : ?><?php the_category(' / ');endif; ?> <?php _e('|','creativ'); ?> <?php echo get_the_date('d - M - Y') ?></span>
            </div><!-- end meta -->


            <div class="blog-title">
                <h3><a href="<?php the_permalink(); ?>">
                   <?php creativ_post_title();?>
                </a></h3>
            </div><!-- end title -->
             <div class="blog-desc">
                  <?php the_excerpt(); ?>
            </div><!-- end desc -->

            <div class="blog-button">
                <a href="<?php the_permalink(); ?>" title="" class="btn btn-primary border-radius"><?php _e('Read more','creativ'); ?></a>
            </div><!-- end button -->
        </div><!-- end blog -->
    </div><!-- end col -->
	
	<?php endwhile; wp_reset_postdata(); ?>

<?php endif; ?>
</div>