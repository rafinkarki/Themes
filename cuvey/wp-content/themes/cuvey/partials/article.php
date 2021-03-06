<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} global $cuvey_options;$var_quote='';?>

<?php if (is_single() OR is_page()) : ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("inner-blog-con");?>>
        <a href="<?php the_permalink();?>">
           <h4><?php cuvey_post_title();?></h4>
        </a>
        <hr>
        <ul>
            <li><?php _e('By','cuvey'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author() ?></a> <?php if (get_the_category()) : ?><?php _e('in ','cuvey'); ?><?php the_category(' , ');endif; ?></li>
            <li><?php _e('Comments','cuvey'); ?> <?php comments_number( '0', '1', '%' ); ?></li>
        </ul>
    <?php $check_video=0;$check_gallery=0;$check_audio=0;$check_link=0; $var_quote=0;?> 
    <?php if(!has_post_format('quote')):?>
        
    <?php endif;?>
        
         <!-- Gallery Post Format -->   
        <?php if ( has_post_format('gallery') ) : $check_gallery=1; ?>            
            <div class="owl-img">         
               <?php if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false ); ?>             
                        <?php foreach( $gallery['src'] AS $src ):                           
                                                        
                            $img_url = wp_get_attachment_image_src( $src,'full'); 
                            $n_img = aq_resize( $src, $width = 750, $height = 316, $crop = true, $single = true, $upscale = true ); ?>
                            <div> <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo esc_url($img_url[0]); ?>" alt=""></a> </div>
                                                                            
                        <?php endforeach;?>                        
                <?php   endif;?>
            </div>
        <?php   endif;  ?>

         <!-- Video Post Format -->
        <?php if (has_post_format('video')) : 
        $check_video=1;
        $videoID = get_post_meta( $post->ID, 'video_id', true );  ?>             
        <a href="#" class="media_post">
            <?php echo wp_oembed_get(  esc_url($videoID) );?>
        </a>          
        <?php endif; ?>    

        <!-- Audio Post Format -->
        <?php if (has_post_format('audio')) : 
        $check_audio=1;
        ?>
        <a href="#" class="media_post">        
            <?php
            $audioID = get_post_meta( $post->ID, 'audio_id', true ); 
            echo wp_oembed_get( esc_url($audioID) ); 
            ?> 
        </a>
           
        <?php endif; ?> 

        <!-- Quote Post Format -->
        <?php if (has_post_format('quote')) :  
        $var_quote=1; ?>
            <a href="<?php the_permalink();?>">
                <div class="quote-post">
                    <blockquote><?php echo esc_attr(get_post_meta( $post->ID, 'q_content', true )); ?><small><?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></small></blockquote>
                </div>   
            </a>        
        <?php endif; ?>

        <!-- Link Post Format -->
        <?php if (has_post_format('link')) :  
        $check_link=1; ?>
            <div class="post-link">
                <span class="link-title"><?php echo esc_attr(get_post_meta( $post->ID, 'link_title', true )); ?>: </span>
                <a href="<?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?>"><?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?></a>
            </div>
        <?php endif; ?>
  

        <?php if (has_post_thumbnail() && (!is_single() || !is_page()) && ($check_video==0 && $check_gallery==0 && $check_audio==0 && $var_quote==0 && $check_link==0 )) :

              $thumbnail = get_post_thumbnail_id();                        
               $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
               $n_img = aq_resize( $img_url[0], $width = 750, $height = 316, $crop = true, $single = true, $upscale = true ); 
            ?>
            <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo esc_url($img_url[0]);?>" alt=""></a>           
                
            
        <?php endif; ?>
       
             
        <article>
            <?php 
                $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                echo wp_kses_post($postContentStr);     
            ?>
        </article><!-- end desc -->
       <?php if(isset($cuvey_options['share_single'])&& $cuvey_options['share_single']==1):
            $sharingbox_soical_icon_options = array (
                    'sharingbox'        => 'yes',
                    'title'             => wp_strip_all_tags(get_the_title( $post->ID ), true),
                    'description'       => wp_strip_all_tags(get_the_title( $post->ID ), true),
                    'link'              => get_permalink( $post->ID ),
                );
            share_sinlge_post($sharingbox_soical_icon_options);
       endif;?>  
       <?php 
       $posttags = get_the_tags();
       if($posttags):?>
           <div class="share under-contact single_post">
              <h4><?php _e('TAGS','cuvey');?></h4>
              <div class="tags">
               <?php the_tags(''); ?>
              </div>
              <div class="clearfix"></div>
            </div> 
        <?php endif;?>     
    </div><!-- end blog -->
<?php else: ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class("blog");?>>
        <?php if (!has_post_format('quote')) :?>
            <div class="small-tag">
                <?php if (has_post_format('image')) :  ?>
                    <i class="fa fa-image"></i>
                <?php elseif (has_post_format('video')) : ?>
                    <i class="fa fa-film"></i>
                <?php elseif (has_post_format('gallery')) :  ?>
                    <i class="fa fa-picture-o"></i>
                <?php elseif (has_post_format('audio')) :  ?>
                    <i class="fa fa-volume-up"></i>
                <?php elseif (has_post_format('link')) :  ?>
                    <i class="fa fa-link"></i>
                <?php else :  ?>
                    <i class="fa fa-pencil"></i>
                <?php endif; ?>    
            </div>
            <a href="<?php the_permalink();?>">
               <h4><?php cuvey_post_title();?></h4>
            </a>
        <?php endif;?>
        
        <?php $check_video=0; $check_gallery=0; $check_audio=0;  $check_link=0; $var_quote=0;?> 
        <!-- Gallery Post Format -->   
        <?php if ( has_post_format('gallery') ) : $check_gallery=1; ?>            
            <div class="owl-img">         
               <?php if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false ); ?>             
                        <?php foreach( $gallery['src'] AS $src ):                           
                                                        
                            $img_url = wp_get_attachment_image_src( $src,'full'); 
                            $n_img = aq_resize( $src, $width = 750, $height = 316, $crop = true, $single = true, $upscale = true ); ?>
                            <div> <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo esc_url($n_img); ?>" alt=""></a> </div>
                                                                            
                        <?php endforeach;?>                        
                <?php   endif;?>
            </div>
        <?php   endif;  ?>

         <!-- Video Post Format -->
        <?php if (has_post_format('video')) : 
        $check_video=1;
        $videoID = get_post_meta( $post->ID, 'video_id', true );  ?>             
        <a href="#" class="media_post">
            <?php echo wp_oembed_get(  esc_url($videoID) );?>
        </a>          
        <?php endif; ?>    

        <!-- Audio Post Format -->
        <?php if (has_post_format('audio')) : 
        $check_audio=1;
        ?>
        <a href="#" class="media_post">        
            <?php
            $audioID = get_post_meta( $post->ID, 'audio_id', true ); 
            echo wp_oembed_get( esc_url($audioID) ); 
            ?> 
        </a>
           
        <?php endif; ?> 

        <!-- Quote Post Format -->
        <?php if (has_post_format('quote')) :  
        $var_quote=1; ?>
            <a href="<?php the_permalink();?>">
                <div class="quote-post">
                    <blockquote><?php echo esc_attr(get_post_meta( $post->ID, 'q_content', true )); ?><small><?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></small></blockquote>
                </div>   
            </a>        
        <?php endif; ?>

        <!-- Link Post Format -->
        <?php if (has_post_format('link')) :  
        $check_link=1; ?>
            <div class="post-link">
                <span class="link-title"><?php echo esc_attr(get_post_meta( $post->ID, 'link_title', true )); ?>: </span>
                <a href="<?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?>"><?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?></a>
            </div>
        <?php endif; ?>
  

        <?php if (has_post_thumbnail() && (!is_single() || !is_page()) && ($check_video==0 && $check_gallery==0 && $check_audio==0 && $var_quote==0 && $check_link==0 )) :

              $thumbnail = get_post_thumbnail_id();                        
               $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
               $n_img = aq_resize( $img_url[0], $width = 750, $height = 316, $crop = true, $single = true, $upscale = true ); 
            ?>
            <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo esc_url($n_img);?>" alt=""></a>           
                
            
        <?php endif; ?>
        <div class="clearfix"></div>
          
        <?php if($var_quote==0):?>
            <ul>
                <li><?php _e('Posted','cuvey'); ?> <?php echo get_the_date('d  M  Y') ?></li>
                <li><?php _e('By','cuvey'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author() ?></a> <?php if (get_the_category()) : ?><?php _e('in ','cuvey'); ?><?php the_category(' , ');endif; ?></li>
                <li><?php _e('Comments','cuvey'); ?> <?php comments_number( '0', '1', '%' ); ?></li>
            </ul>           
            
            <?php the_excerpt(); ?>
                     
            <a href="<?php the_permalink(); ?>"class="btn" title="" ><?php _e('Read more','cuvey'); ?></a>
            
        <?php endif;?>
        <?php
         wp_link_pages(array(
            'next_or_number' => 'number',
            'nextpagelink' => __('Next page', 'cuvey'),
            'previouspagelink' => __('Previous page', 'cuvey'),
            'pagelink' => '%',
            'link_before' => '<span class="ft-btn">',
            'link_after' => '</span>',
            'before' => '<div class="clearfix"></div>' . __('Pages:', 'cuvey') . ' <div class="ft-article-pages">',
            'after' => '</div>'
            ));
         ?>

    </div><!-- end blog -->
    <div class="clearfix"></div>
    <hr>
<?php endif; ?>





<?php if (get_next_post_link('&laquo; %link', '%title', 1) OR get_previous_post_link('%link &raquo;', '%title', 1)) : ?>
    <div class="prev-next-btn" style="display:none;">
      <ul class="pager">
        <li class="previous">
        <?php 
        previous_posts_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'cuvey' ) . '</span> %title' ); ?>
        </li>
        <li class="next">
        <?php 
        next_posts_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'cuvey' ) . '</span>' ); ?>
        </li>
      </ul>
    </div>
  <?php endif; ?>


