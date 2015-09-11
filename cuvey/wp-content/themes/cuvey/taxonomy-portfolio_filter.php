<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options;
global $wp_query;$layout='';
$s_color='section-white';
$color=$cuvey_options['template_color'];
if($color=='gray'):$s_color='section-gray';endif;
$layout=esc_attr($cuvey_options['portfolio_archive_layout']);
$args = array_merge( $wp_query->query, array( 'post_type' => 'portfolio' ) );
query_posts( $args ); $didebar='';$content='';$with_sidebar=false; $with_text='';$text=false;$gallery=false;$masonry=false;$mixed=false;
 switch ($layout) {
    case '1':
        $w='1140';
        $h='628';$class='container bf';
        $id='one-col-portfolio';
        break;
    case '2':
        $w='555';
        $h='454';$class='container bf';
        $id='two-col-portfolio';
        break;
    case '2l':
        $w='345';$sidebar='pull-left';
        $h='282';$content='pull-right';
        $id='two-col-portfolio';
        $with_sidebar=true;
        $class='container bf';
        break;
    case '2r':
        $w='345';$sidebar='pull-right';
        $h='282';$content='pull-left';
        $id='two-col-portfolio';
        $with_sidebar=true;
        $class='container bf';
        break;
    case '3':
        $w='360';
        $h='259';$class='container bf';
        $id='three-col-portfolio';
        break;
    case '3l':
        $w='360';$sidebar='pull-left';
        $h='259';$content='pull-right';
        $id='three-col-portfolio';
        $with_sidebar=true;
        $class='container bf';
        break;
    case '3r':
        $w='360';$sidebar='pull-right';
        $h='259';$content='pull-left';
        $id='three-col-portfolio';
        $with_sidebar=true;
        $class='container bf';
        break;
    case '4':
        $w='263';
        $h='198';$class='container bf';
        $id='four-col-portfolio';
        break;
    case '2t':
        $w='555';$text=true;
        $h='454';$class='container bf';
        $id='two-col-portfolio';
        $with_text='with-text';
        break;
    case '2tl':
        $w='360';$sidebar='pull-left';
        $h='259';$content='pull-right';
        $text=true; $with_sidebar=true;    
        $id='two-col-portfolio';
        $with_text='with-text';
        $class='container bf';
        break;
    case '2tr':
        $w='360';$sidebar='pull-right';
        $h='259';$content='pull-left';
        $text=true; $with_sidebar=true;    
        $id='two-col-portfolio';
        $with_text='with-text';
        $class='container bf';
        break;
    case '3t':
        $w='360';$text=true;
        $h='259';$class='container bf';
        $id='three-col-portfolio';
        $with_text='with-text';
        break; 
    case '3tl':
        $w='360';$sidebar='pull-left';
        $h='259';$content='pull-right';
        $text=true; $with_sidebar=true;    
        $id='three-col-portfolio';
        $with_text='with-text';
        $class='container bf';
        break;
    case '3tr':
        $w='360';$sidebar='pull-right';
        $h='259';$content='pull-left';
        $text=true; $with_sidebar=true;    
        $id='three-col-portfolio';
        $with_text='with-text';
        $class='container bf';
        break;
    case '4t':
        $w='263';$text=true;
        $h='189';$class='container bf';
        $id='four-col-portfolio';
        $with_text='with-text';
        break; 
    case 'gf1':
        $w='276';$class='bf fullwidth row';
        $h='324';
        $id='grid-five-col-portfolio';
        $gallery=true;
        break; 
    case 'gf2':
        $w='690';$class='bf fullwidth row';
        $h='810';
        $id='grid-two-col-portfolio';
        $gallery=true;
        break; 
    case 'gf3':
        $w='460';$class='bf fullwidth row';
        $h='540';
        $id='grid-three-col-portfolio';
        $gallery=true;
        break; 
    case 'gf4':
        $w='345';$class='bf fullwidth row';
        $h='450';
        $id='grid-four-col-portfolio';
        $gallery=true;
        break;
    case 'gg1':
        $w='1140';$class='container bf';
        $h='628';
        $id='grid-one-col-portfolio';
        break; 
    case 'gg2':
        $w='585';$class='container bf';
        $h='478';
        $id='grid-two-col-portfolio';
        break; 
    case 'gg3':
        $w='390';$class='container bf';
        $h='280';
        $id='grid-three-col-portfolio';
        break;
    case 'gg4':
        $w='390';$class='container bf';
        $h='280';
        $id='grid-four-col-portfolio';
        break;
    case 'm2':
        $masonry=true;
        $id='2';$class='-container';
        break; 
    case 'm3':
        $masonry=true;$class='mixed-container';
        $id='3';$text=true;
        break;
    case 'm4':
        $masonry=true;$class='mixed-container';
        $id='4';$text=true;
        break;
    case 'mm1':
        $masonry=true;$class='mixed';
        $id='2';$mixed=true;$text=true;
        break;  
    default: 
        $masonry=true;$class='row-fluid';
        $id='0';$mixed=true;      
        break;
}?>
<?php if($masonry==false):?>
<section class="<?php echo $s_color;?> clearfix"> 
    <?php if($with_sidebar==true):?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 <?php echo $content;?>">
                <div id="content">  
    <?php endif;?> 
                    <div id="second" class="<?php echo $class;?>">            
                       
                        <?php if (have_posts()) : ?>
                            <ul id="<?php echo $id;?>" class="items <?php echo $with_text;?> <?php if($gallery==false) echo'row-fluid';?>">      
                                <?php while (have_posts()) : the_post(); ?>
                                <?php
                                $portfolio_item_title = get_the_title( $post->ID );
                                $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
                                $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                 $terms = get_the_terms( $post->ID, 'portfolio_filter' );          
                                if ( $terms && ! is_wp_error( $terms ) ) : 

                                    $term_links = array();
                                    foreach ( $terms as $term ) {
                                        $term_links[] = $term->slug;
                                    }
                                                        
                                    $filters = join( " ", $term_links );
                                endif;   
                                ?>
                                <li class="<?php echo $filters; ?>">
                                    <div class="bf-single-item wow fadeIn">
                                        <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                                           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                                           $n_img = aq_resize( $img_url[0], $width = $w, $height = $h, $crop = true, $single = true, $upscale = true ); 
                                        ?><img src="<?php echo esc_url($n_img);?>" alt=""> 
                                        <div class="caption">
                                            <div class="cap-in">                                    
                                                <?php if($text==false):
                                                    $filters = wp_get_post_terms($post->ID,'portfolio_filter');
                                                    $c_filter = '';
                                                    if(!empty($filters)){
                                                        foreach($filters as $f=>$filter){
                                                            $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                                        }
                                                        echo "<p>".esc_html($c_filter)."</p>";
                                                    }
                                                    ?>                                    
                                                    <h3><a href="<?php echo the_permalink();?>" title=""><?php cuvey_post_title(); ?></a></h3>
                                                <?php endif;?>
                                                <a href="<?php echo the_permalink();?>" title=""><span class="bubble border-radius"><i class="fa fa-link"></i></span></a>
                                                <a href="<?php echo esc_url($img_url[0]);?>" rel="prettyPhoto" title=""><span class="bubble border-radius"><i class="fa fa-search"></i></span></a>
                                            </div>
                                        </div>
                                        <?php if($text==true):?>
                                            <div class="caps-desc">                                                                
                                                <h3><a href="<?php echo the_permalink();?>" title=""><?php cuvey_post_title(); ?></a></h3>
                                                <?php
                                                    $filters = wp_get_post_terms($post->ID,'portfolio_filter');
                                                    $c_filter = '';
                                                    if(!empty($filters)){
                                                        foreach($filters as $f=>$filter){
                                                            $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                                        }
                                                        echo "<p>".esc_html($c_filter)."</p>";
                                                    }
                                                ?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                </li>
                                <?php endwhile; ?>              
                            </ul>
                        <?php else : ?>
                            <?php get_template_part('partials/nothing-found'); ?>
                        <?php endif; wp_reset_postdata();?>        
                    </div> 
            <?php if($with_sidebar==true):?> 
                </div>
            <?php endif;?>
                <div class="clearfix portfolio-button text-center">
                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <?php cuvey_pagination(); ?>
                    <?php endif; ?>
                </div> 
    <?php if($with_sidebar==true):?>
            </div>    
            <div class="<?php echo $sidebar;?> col-md-4 col-sm-4 col-xs-12">  
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>  
    <?php endif;?> 
</section>
<?php else:?>
    <section class="<?php echo $s_color;?> clearfix"> 
        <?php if($mixed==false)
         echo '<div class="container"> ';?>        
            
                <?php if (have_posts()) : $count=1;?>
                    <div class="<?php echo $class;?> masonry_wrapper  wow fadeInUp" data-masonry="<?php echo $id;?>">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $portfolio_item_title = get_the_title( $post->ID );
                    $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
                    $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                     $terms = get_the_terms( $post->ID, 'portfolio_filter' );          
                    if ( $terms && ! is_wp_error( $terms ) ) : 
                        $term_links = array();
                        foreach ( $terms as $term ) {
                            $term_links[] = $term->slug;
                        }                                            
                        $filters = join( " ", $term_links );
                    endif;  ?>
                    <?php if($class=='row-fluid'): ?>
                        <?php $rand=''; $hw='';
                            if($count%6==0 || $count==1):
                               $hw= ' item-h2 item-w2 ';
                                $h='388';
                                $w='790';
                            else:
                                $hw=' item-h2 ';
                                $h=$w='389';
                            endif;?>
                            <div class="item entry <?php echo $hw;?> <?php echo $filters; ?>">
                                <div class="ImageWrapper">
                                    <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                                       $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL                           
                                       $n_img = aq_resize( $img_url[0],  $width=$w, $height = $h, $crop = true, $single = true, $upscale = true );
                                    ?>
                                    <a href="<?php the_permalink();?>"><img src="<?php echo esc_url($n_img);?>" alt="" > </a>
                                    <div class="ImageOverlayLi"></div>
                                    <div class="Buttons StyleH">                                                                  
                                        <?php
                                            $filters = wp_get_post_terms($post->ID,'portfolio_filter');
                                            $c_filter = '';
                                            if(!empty($filters)){
                                                foreach($filters as $f=>$filter){
                                                    $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                                }
                                                echo "<p>".esc_html($c_filter)."</p>";
                                            }
                                        ?> 
                                        <a href="<?php the_permalink();?>"><h3><?php cuvey_post_title();?></h3></a>
                                    </div>
                                </div>
                            </div> 
                        <?php $count++;?>
                    <?php else:?>
                        <div class="item <?php echo $filters; ?>">
                            <figure class="effect-chico">
                                <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                                   $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                                ?><img src="<?php echo esc_url($img_url[0]);?>" alt="" class="img-responsive"> 
                                <figcaption>
                                <?php if($text==true):?>   
                                    <a href="<?php the_permalink();?>" class="portfolio-link"><h3><i class="fa fa-link"></i></h3> </a> 
                                <?php else:?>
                                    <h2><?php cuvey_post_title(); ?></h2>     
                                <?php endif;?>                                                               
                                    <?php
                                        $filters = wp_get_post_terms($post->ID,'portfolio_filter');
                                        $c_filter = '';
                                        if(!empty($filters)){
                                            foreach($filters as $f=>$filter){
                                                $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                            }
                                            echo "<p>".esc_html($c_filter)."</p>";
                                        }
                                    ?>                                
                                    
                                    <a href="<?php the_permalink();?>"><?php _e('View more','cuvey');?></a>
                                </figcaption>
                            </figure>
                        </div>
                    <?php endif;?>                    
                    <?php endwhile; ?>              
                </div>
                <?php else : ?>

                    <?php get_template_part('partials/nothing-found'); ?>

                <?php endif; wp_reset_postdata();?>
            
            <div class="clearfix portfolio-button text-center">
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            </div> 
        <?php if($mixed==false) echo'</div>';?>
    </section>
<?php endif;?>
<?php get_footer(); ?>