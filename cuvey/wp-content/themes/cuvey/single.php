<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php global $cuvey_options;?>
<div class="back-blog"><a href="#."><i class="fa fa-arrow-left"></i></a></div>
<div id="blog">
    <div class="container">
        <div class="inner-blog">
            <div class="row">
                <div class="col-sm-12">
                     <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <div class="blog">
                                <?php get_template_part('partials/article'); ?>

            <?php previous_post_link('%link','<div class="btn btn-theme btn-theme-transparent pull-left btn-icon-left"> <i class="fa fa-angle-double-left"></i>' . __( 'Older', 'bella' ) . '</div>');?>               
            <?php next_post_link('%link','<div class="btn btn-theme btn-theme-transparent pull-right btn-icon-right"> ' . __( 'Newer', 'bella' ) . ' <i class="fa fa-angle-double-right"></i></div>');    ?>
                            <?php comments_template( '', true ); ?>
                            </div>                         
                            

                        <?php endwhile; ?>

                        
                    <?php else : ?>

                        <?php get_template_part('partials/nothing-found'); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!--content gray-->
</div><!--wrap end-->
<?php wp_footer(); ?>