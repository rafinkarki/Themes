<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options; global $blog_page,$loop; $content=''; $sidebar='';?>
<?php $layout=$cuvey_options['archive_layout'];
$s_color='section-white';
$color=$cuvey_options['template_color'];
if($color=='gray'):$s_color='section-gray';endif;?>
<section class="<?php echo $s_color;?> clearfix">
    <div class="container">

        <?php if($layout=='1'): $blog_page='classic-one';?>
            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn first">
                 <?php if (have_posts()) : ?>
                    <div id="blog-page" class="row clearfix">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article'); ?>
                        <?php endwhile; ?>
                    </div>
                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <?php cuvey_pagination(); ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>            
            </div> <?php

        elseif($layout=='1l' || $layout=='1r'): $blog_page='classic-one';
            if($layout=='1l'): 
                $sidebar='left'; 
                $content='right';
            else: 
                $sidebar='right'; 
                $content='left'; 
            endif;?>
            <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">            
                <div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn first">
                     <?php if (have_posts()) : ?>
                        <div id="blog-page" class="row clearfix">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('partials/article'); ?>
                            <?php endwhile; ?>
                        </div>
                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <?php cuvey_pagination(); ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>               
                </div>   
            </div> <?php  

        elseif($layout=='2'): $blog_page='classic-two';?>          
           <?php if (have_posts()) : $i='';?>
                <div id="blog-page" class="row clearfix"> 
                    <?php while (have_posts()) : the_post();?>
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeIn <?php if($i%2==0) : echo 'first'; else: echo'last'; endif;?> animated">
                            <?php get_template_part('partials/article');?>
                        </div>
                    <?php 
                    $i++;
                    endwhile; ?>
                </div> 
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif;          
        
        elseif($layout=='2l' || $layout=='2r'): $blog_page='classic-two';
            if($layout=='2l'): 
                $sidebar='left'; 
                $content='right';
            else: 
                $sidebar='right'; 
                $content='left'; 
            endif;?>
            <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">   
                <?php if (have_posts()) : $i='';?>
                <div id="blog-page" class="row clearfix"> 
                    <?php while (have_posts()) : the_post();?>
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeIn <?php if($i%2==0) : echo 'first'; else: echo'last'; endif;?> animated">
                            <?php get_template_part('partials/article');?>
                        </div>
                    <?php 
                    $i++;
                    endwhile; ?>
                </div> 
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>  
            </div> <?php   

        
        elseif($layout=='3'): $i=1; $col=''; $blog_page='classic-three';?>
            <?php if (have_posts()) : ?>
                <div id="blog-page" class="row clearfix"> 
                    <?php while (have_posts()) : the_post();?>
                        <?php if($i==1) : $col='first'; elseif($i==3): $col='last'; else: $col=''; endif;?>
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn <?php echo $col;?> animated">
                            <?php get_template_part('partials/article');?>
                        </div>
                    <?php 
                    $i++;
                    if($i>3) $i=1;
                    endwhile; ?>
                </div> 
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; 

        elseif($layout=='3l' || $layout=='3r'):  $i=1; $col=''; $blog_page='classic-three';
            if($layout=='3l'): 
                $sidebar='left'; 
                $content='right';
            else: 
                $sidebar='right'; 
                $content='left'; 
            endif;?>
            <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
                <div id="sidebar" class="clearfix">
                    <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                        <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">   
                <?php if (have_posts()) : ?>
                <div id="blog-page" class="row clearfix"> 
                    <?php while (have_posts()) : the_post();?>
                        <?php if($i==1) : $col='first'; elseif($i==3): $col='last'; else: $col=''; endif;?>
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn <?php echo $col;?> animated">
                            <?php get_template_part('partials/article');?>
                        </div>
                    <?php 
                    $i++;
                    if($i>3) $i=1;
                    endwhile; ?>
                </div> 
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>       
            </div>  <?php  

        elseif($layout=='m2' || $layout=='m3' || $layout=='m1'): $dataid='';$blog_page='masonry';
            if($layout=='m1'): 
                $dataid=1;
            elseif($layout=='m2'): 
                $dataid=2;
            else:
                $dataid=3;
            endif;?>
            <?php if (have_posts()) : ?>
                 <div class="mixed-container masonry_wrapper_blog row wow fadeInUp" data-id="<?php echo esc_attr($dataid);?>">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="item">
                            <?php get_template_part('partials/article'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; 
        
        
        elseif($layout=='t'): $blog_page='timeline';?>
            <?php if (have_posts()) :  $loop=1;  ?>
                <div class="timeline-wrapper clearfix">
                    <ul class="timeline">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article-timeline'); 
                            $loop++;?>
                        <?php endwhile; ?>
                    </ul>   
                </div>
                <?php if ($wp_query->max_num_pages>1) : ?>
                    <?php cuvey_pagination(); ?>
                <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif;

        elseif($layout=='tl' || $layout=='tr' ): 
            if($layout=='tl'): 
                $blog_page='timeline-ls';
                $sidebar='left'; 
                $content='right'; 
                $div='<div class="timeline-wrapper timeline-onecol_ls clearfix">';          
            else:
                $blog_page='timeline-rs';
                $sidebar='right'; 
                $content='left';
                $div='<div class="timeline-wrapper timeline-onecol clearfix">';
            endif; ?>
            <div class="row">
                <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
                    <div id="sidebar" class="clearfix">
                        <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                            <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                        <?php } ?> 
                    </div>
                </div>
                <div class="pull-<?php echo esc_attr($content);?> col-md-8 col-sm-8 col-xs-12">   
                 <?php if (have_posts()) :  $loop=1; 
                    echo $div;?>
                        <ul class="timeline">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('partials/article-timeline'); 
                                $loop++;?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <?php cuvey_pagination(); ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>
                </div>            
            </div>  <?php  
                           
        endif;?>
    </div>
</section>


<?php get_footer(); ?>