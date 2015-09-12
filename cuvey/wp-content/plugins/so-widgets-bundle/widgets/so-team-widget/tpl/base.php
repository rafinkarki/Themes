<?php $number=esc_attr($instance['number']);?>
<?php query_posts('post_type=team&post_status=publish&posts_per_page='.$number.'&paged='. get_query_var('paged')); ?>

<?php if (have_posts()) :  ?>
    <div class="team-mem">          
        <?php while (have_posts()) : the_post();?>
          <?php  $pageid=get_the_ID();  
            $facebook=esc_attr(get_post_meta( $pageid, 'cuvey_facebook',true));
            $twitter=esc_attr(get_post_meta( $pageid, 'cuvey_twitter',true));
            $google=esc_attr(get_post_meta( $pageid, 'cuvey_google',true));
            $linkedin=esc_attr(get_post_meta( $pageid, 'cuvey_linkedin',true));?>
            
            <div class="col-md-6 wow <?php echo $instance['animation'];?>" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="team">
                    <div class="team-member wow fadeIn">
                        <?php echo $div;?>
                            <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                               $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                               $n_img = aq_resize( $img_url[0], $width = 285, $height = 300, $crop = true, $single = true, $upscale = true ); 
                            ?>
                            <div class="t-img">
                                <div class="rotate">
                                  <div class="rotate-none"> <img src="<?php echo esc_url($img_url[0]);?>" alt="" > </div>
                                </div>
                            </div>
                            
                            
                            <div class="team-info">
                                <h5><?php cuvey_post_title(); ?></h5>
                                <?php
                                $filters = get_the_terms($post->ID,'team_post');
                                $c_filter = '';
                                if(!empty($filters)){
                                    foreach($filters as $f=>$filter){
                                        $c_filter .=  ($f==0) ? $filter->name : '/'.$filter->name;
                                    }
                                    echo "<p><span>".esc_html($c_filter)."</span></p>";
                                }
                                ?>
                                <?php $excerpt = get_the_content();
                                $excerpt = strip_shortcodes($excerpt);
                                echo '<div class="t_c">'.wp_kses_post($excerpt).'</div>';?>                        
                                 
                            <div class="social_icons">
                                <ul>
                                <?php if (!empty($twitter)) : ?>
                                    <li class="twitter"><a href="<?php echo esc_url( $twitter);?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?> ><i class="fa fa-twitter"></i></a></li>
                                <?php endif;?>                       
                                <?php if (!empty($facebook)) : ?>
                                    <li class="facebook"><a href="<?php echo esc_url( $facebook );?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?> ><i class="fa fa-facebook"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($google)) : ?>
                                    <li class="googleplus"><a href="<?php echo esc_url( $google );?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?>> <i class="fa fa-google"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($linkedin)) : ?>
                                    <li class="linkedin"><a href="<?php echo esc_url( $linkedin );?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?>> <i class="fa fa-linkedin"></i></a></li>
                                <?php endif;?>
                                </ul>
                            </div><!-- end social icons -->
                        </div>
                    </div>
                        
                </div>
            </div>       
            
          
        <?php endwhile; ?> 
    </div>     
<?php else : ?>

    <?php get_template_part('partials/nothing-found'); ?>

<?php endif; wp_reset_query();?>
   