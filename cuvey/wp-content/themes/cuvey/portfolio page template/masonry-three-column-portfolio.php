<?php
/*
 * Template Name: Masonry Three Columns Portfolio
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options;
$number=esc_attr($cuvey_options['portfolio_number']); ?>

<?php $s_color='section-white';
$pageid=get_the_ID();
$color=get_post_meta( $pageid, 'cuvey_template_color',true);
if($color=='gray'):
    $s_color='section-gray';
endif;?>
<?php if(is_plugin_active('cuvey-addons/cuvey-addons.php')):?>
    <?php query_posts('post_type=portfolio&post_status=publish&posts_per_page='.$number.'&paged='. get_query_var('paged')); ?>
<section class="<?php echo $s_color;?> clearfix"> 
    <div class="container">  
        <nav class="portfolio-filter text-center">               
            <?php 
            $args = array(
            'type'                     => 'portfolio',
            'taxonomy'                 => 'portfolio_filter',
            'pad_counts'               => false 
            );         
            $categories = get_categories( $args );
            ?>        
            <ul class="filter">        
                <li><a class="active" href="#" data-filter="*"><span></span> <?php _e( 'All', 'cuvey' ); ?></a></li>
                <?php foreach($categories as $category) { ?>
                <li><a class="orange" href="#" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
            <?php if (have_posts()) : ?>
                <div class="mixed-container masonry_wrapper row wow fadeInUp" data-id="3">
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
                <div class="item <?php echo $filters; ?>">                
                    <figure class="effect-chico">
                        <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                        ?><img src="<?php echo esc_url($img_url[0]);?>" alt="" class="img-responsive"> 
                        <figcaption>
                            <a href="<?php the_permalink();?>" class="portfolio-link"><h3><i class="fa fa-link"></i></h3> </a>                                                                   
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
                <?php endwhile; ?>              
            </div>
            <?php else : ?>

                <?php get_template_part('partials/nothing-found'); ?>

            <?php endif; wp_reset_query();?>
        
        <div class="clearfix portfolio-button text-center">
            <?php if ($wp_query->max_num_pages>1) : ?>
                <?php cuvey_pagination(); ?>
            <?php endif; ?>
        </div> 
    </div>
</section><?php endif;?>
<?php get_footer(); ?>