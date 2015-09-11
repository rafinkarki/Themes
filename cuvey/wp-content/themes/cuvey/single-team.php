<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php global $cuvey_options;
$s_color='section-white';
$color=$cuvey_options['template_color'];
if($color=='gray'):$s_color='section-gray';endif;
$single_layout=$cuvey_options['single_blog'];
if($single_layout=='fullwidth'):?>
    <section class="<?php echo $s_color;?> clearfix">
        <div class="container">
            <div id="blog-page" class="row clearfix">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 wow fadeIn">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                                 $img_url = wp_get_attachment_image_src( $thumbnail,'full'); 
                            ?><img src="<?php echo esc_url($img_url[0]);?>"  alt=""> 
                            <div class="team_desc">
                                <h3><?php cuvey_post_title(); ?></h3>
                                <?php
                                $filters = get_the_terms($post->ID,'team_post');
                                $c_filter = '';
                                if(!empty($filters)){
                                    foreach($filters as $f=>$filter){
                                        $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                    }
                                    echo "<p>".esc_html($c_filter)."</p>";
                                }
                                ?>  
                            </div><!-- end team_Desc -->
                             <div class="single-blog-desc">
                                <?php 
                                        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                                        echo wp_kses_post($postContentStr);     
                                    ?>
                            </div><!-- end desc -->
                            <?php  $pageid=get_the_ID();  
                            $facebook=esc_attr(get_post_meta( $pageid, 'cuvey_facebook',true));
                            $twitter=esc_attr(get_post_meta( $pageid, 'cuvey_twitter',true));
                            $google=esc_attr(get_post_meta( $pageid, 'cuvey_google',true));?>
                            <div class="social-links">
                                <?php  if(!empty($twitter) || !empty($facebook)||!empty($google)):?>
                                    <div class="pull-left"><strong><?php _e('Personal Links : ','cuvey');?></strong></div>
                                <?php endif;?>
                                <div class="social-icons">
                                    <?php if (!empty($twitter)) : ?>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Twitter"  href="<?php echo esc_url( $twitter);?>" target="_blank"><i class="fa fa-twitter"></i></a></span>
                                    <?php endif;?>                       
                                    <?php if (!empty($facebook)) : ?>
                                        <a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Facebook" href="<?php echo esc_url( $facebook );?>" target="_blank"><i class="fa fa-facebook"></i></a></span>
                                    <?php endif;?>
                                    <?php if (!empty($google)) : ?>
                                        <a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Google Plus" href="<?php echo esc_url( $google );?>" target="_blank"> <i class="fa fa-google-plus"></i></a></span>
                                    <?php endif;?>
                                </div><!-- end social icons -->
                            </div>
                              <div class="next-prev text-center clearfix">
                                <nav>
                                    <ul class="pager">
                                       <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                                       <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                                    </ul>
                                </nav>
                              </div><!-- end next prev -->
                        <?php endwhile; ?>
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else:
if($single_layout=='left'):
    $sidebar='left';
    $content='right';    
else:
    $sidebar='right';
    $content='left';
endif;?>
<section class="<?php echo $s_color;?> clearfix">
    <div class="container">
        <div id="blog-page" class="row clearfix">
            <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                                 $img_url = wp_get_attachment_image_src( $thumbnail,'full'); 
                            ?><img src="<?php echo esc_url($img_url[0]);?>"  alt=""> 
                             <div class="team_desc">
                                <h3><?php cuvey_post_title(); ?></h3>
                                <?php
                                $filters = get_the_terms($post->ID,'team_post');
                                $c_filter = '';
                                if(!empty($filters)){
                                    foreach($filters as $f=>$filter){
                                        $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                    }
                                    echo "<p>".esc_html($c_filter)."</p>";
                                }
                                ?>  
                            </div><!-- end team_Desc -->
                             <div class="single-blog-desc">
                                <?php 
                                        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                                        echo wp_kses_post($postContentStr);     
                                    ?>
                            </div><!-- end desc -->
                            <?php  $pageid=get_the_ID();  
                            $facebook=esc_attr(get_post_meta( $pageid, 'cuvey_facebook',true));
                            $twitter=esc_attr(get_post_meta( $pageid, 'cuvey_twitter',true));
                            $google=esc_attr(get_post_meta( $pageid, 'cuvey_google',true));?>
                            <div class="social-links">
                                <?php  if(!empty($twitter) || !empty($facebook)||!empty($google)):?>
                                    <div class="pull-left"><strong><?php _e('Personal Links : ','cuvey');?></strong></div>
                                <?php endif;?>
                                <div class="social-icons">
                                    <?php if (!empty($twitter)) : ?>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Twitter"  href="<?php echo esc_url( $twitter);?>" target="_blank"><i class="fa fa-twitter"></i></a></span>
                                    <?php endif;?>                       
                                    <?php if (!empty($facebook)) : ?>
                                        <a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Facebook" href="<?php echo esc_url( $facebook );?>" target="_blank"><i class="fa fa-facebook"></i></a></span>
                                    <?php endif;?>
                                    <?php if (!empty($google)) : ?>
                                        <a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom"  data-title="Google Plus" href="<?php echo esc_url( $google );?>" target="_blank"> <i class="fa fa-google-plus"></i></a></span>
                                    <?php endif;?>
                                </div><!-- end social icons -->
                            </div>
                              <div class="next-prev text-center clearfix">
                                <nav>
                                    <ul class="pager">
                                       <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                                       <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                                    </ul>
                                </nav>
                              </div><!-- end next prev -->
                        <?php endwhile; ?>
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>

                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>
            </div>
            <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
<?php get_footer(); ?>