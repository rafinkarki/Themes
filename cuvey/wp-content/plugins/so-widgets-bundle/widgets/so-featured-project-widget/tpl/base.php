<?php $number=esc_attr($instance['number']);

$arg = array(
    'post_type' => 'portfolio',
    'posts_per_page'=>$number,
    'meta_query' => array(
        array(
            'key' => 'cuvey_featured_project',
            'value' => 'yes',
        )
    )
 );
$query = new WP_Query( $arg );?>
<div class="featured">
<?php if ($query->have_posts()) : ?>
    <div class="owl-img">              
	    <?php while ($query->have_posts()) : $query->the_post(); ?>
	    	<div class="col-md-12 wow fadeInRightBig" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="item-info">
                	<?php if(!empty( $instance['title'])):?>
	                    <h4><?php echo esc_attr($instance['title']);?></h4>
	                <?php endif;?>
                  <h2><?php cuvey_post_title(); ?></h2>
                  <p><?php $excerpt = get_the_content();
                    $excerpt = strip_shortcodes($excerpt);
                    $excerpt = strip_tags($excerpt);                       
                    echo substr($excerpt, 0,150);?></p>
                  <a class="btn margin-r-20" href="<?php the_permalink();?>" <?php echo ( $instance['new_window'] ? 'target="_blank"' : '' ) ; ?>><i class="fa fa-eye"></i>&nbsp;<?php _e(' View Case Study','siteorigin_widgets');?></a> 
                </div>
            </div>
		<?php endwhile;?>
	</div>
<?php wp_reset_postdata();endif;?>
</div>
