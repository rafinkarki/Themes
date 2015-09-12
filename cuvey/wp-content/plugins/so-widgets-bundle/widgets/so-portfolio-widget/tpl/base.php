<?php $number=esc_attr($instance['number']);?>
<?php query_posts('post_type=portfolio&post_status=publish&posts_per_page='.$number.'&paged='. get_query_var('paged')); ?>
<div class="portfolio-wrapper">              
    <?php 
    $arguments = array(
    'type'                     => 'portfolio',
    'taxonomy'                 => 'portfolio_filter',
    'pad_counts'               => false 
    );         
    $categories = get_categories( $arguments );
    ?> 
    <?php if($instance['checkbox']==false):?>       
        <ul class="filter wow bounceIn" data-wow-delay="500ms">        
            <li><a class="active" href="#" data-filter="*"><?php _e( 'All', 'cuvey' ); ?></a></li>
            <?php foreach($categories as $category) { ?>
            <li><a href="#" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
            <?php } ?>
        </ul>
    <?php endif;?>
    <div class="portfolio">
        <?php if (have_posts()) : ?>
            <ul class="items">      
                <?php while (have_posts()) : the_post(); ?>
                <?php
                
                 $terms = get_the_terms( $post->ID, 'portfolio_filter' );          
                if ( $terms && ! is_wp_error( $terms ) ) : 

                    $term_links = array();
                    foreach ( $terms as $term ) {
                        $term_links[] = $term->slug;
                    }
                                        
                    $filters = join( " ", $term_links );
                endif;   
                ?>
                <li class="item video wow fadeIn" data-wow-duration="0.8" data-wow-delay="0.8">                
                    <div class="img">
                        <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                           $n_img = aq_resize( $img_url[0], $width = 389, $height = 389, $crop = true, $single = true, $upscale = true );
                        ?><img src="<?php echo esc_url($n_img);?>" alt=""> 
                        <div class="over">
                            <div class="des">                                                        
                                <h5><a href="<?php echo the_permalink();?>" title=""><?php cuvey_post_title(); ?></a></h5>
                                <p><?php $excerpt = get_the_content();
                                $excerpt = strip_shortcodes($excerpt);
                                $excerpt = strip_tags($excerpt);                       
                                echo substr($excerpt, 0,50);?></p>                            
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>              
            </ul>
        <?php else : ?>

            <?php get_template_part('partials/nothing-found'); ?>

        <?php endif; wp_reset_query();?>
    </div> 
</div>  