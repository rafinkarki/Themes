<?php global $cuvey_options;

$title='';

$title=$cuvey_options['related_title'];

$subtitle=$cuvey_options['related_subtitle'];?>

<section class="section-white bgpatttern clearfix">

    <div class="section-title">

        <h3><?php echo esc_attr($title);?></h3>

        <div class="divider"></div>

        <p><?php echo wp_kses_post($subtitle);?></p>

    </div><!-- end section title -->

    <div id="home-portfolio" class="row-fluid clearfix">

    <?php $custom_taxterms = wp_get_object_terms( $post->ID, 'portfolio_filter', array('fields' => 'ids') );

      $args = array(

      'post_type' => 'portfolio',

      'post_status' => 'publish',

      'posts_per_page' =>4, 

      'orderby' => 'rand',

      'tax_query' => array(

          array(

            'taxonomy' => 'portfolio_filter',

            'field' => 'id',

            'terms' => $custom_taxterms,

          )

      ),

      'post__not_in' => array ($post->ID),

      );

      $related_items = new WP_Query( $args ); 

      if( $related_items->have_posts() ) :    

        while( $related_items->have_posts() )  : $related_items->the_post(); ?>

          <div class="col-md-3 col-sm-6 col-xs-12 portfolio-item wow fadeIn">

            <div class="ImageWrapper">

              <?php  $thumbnail = get_post_thumbnail_id();                        

                   $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL

                   $n_img = aq_resize( $img_url[0], $width = 338, $height =396, $crop = true, $single = true, $upscale = true ); 

                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/>               

              <div class="ImageOverlayLi"></div>

              <div class="Buttons StyleH">

                <?php  $filters = '';

                   $terms = get_the_terms( $post->ID, 'portfolio_filter' );          

                    if ( $terms && ! is_wp_error( $terms ) ) : 

                        $term_links = array();

                        foreach ( $terms as $term ) {

                            $term_links[] = $term->name;

                        }                                            

                        $filters = join( " , ", $term_links );

                    endif;         

                    ?>   

                  <p><?php echo $filters;?></p>

                  <span class="divider-hover"></span>

                  <h3><?php cuvey_post_title();?></h3>

                  <a href="<?php the_permalink();?>" title="" class="btn btn-primary border-radius"><?php _e('See Project','cuvey');?></a>

              </div>

            </div>

          </div><!-- end col -->

        <?php 

        endwhile;?>

      <?php endif;

      wp_reset_postdata();?>        

    </div><!-- end portfolio -->

</section><!-- end section white -->



  