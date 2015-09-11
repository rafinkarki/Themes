
<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Barberia
 * @since Barberia 1.0
 */

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $cuvey_options; ?>
<div class="coming-soon-wrapper text-left clearfix">     
    <div class="not-found">
    	<?php $style='';
    	$color=esc_html($cuvey_options['404_color']);
    	if(!empty($color)):
    		$style='style="color:'.$color.'";';
    	endif;
    	?>
        <h1 class="title_color" <?php echo esc_html($style);?>><?php _e('OOPS','cuvey');?></h1>
        <p><?php _e('It looks like that page no longer exists. Would you like to go to homepage instead?','cuvey');?></p>
        <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1">   
        
	        <form role="search" id="subscribe-coming-soon" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	            <div class="form-group">
	                <label class="sr-only" for="exampleInputEmail2"><?php _e('What are you looking for?','cuvey');?></label>
	                <input type="text" name="s" class="form-control" id="exampleInputEmail2" placeholder="What are you looking for?">
	            </div>
	            <button type="submit" class="btn btn-primary border-radius btn-lg"><?php _e('Search','cuvey');?></button>
	        </form>                         
	        
            <div class="social-icons">
	            <?php if (!empty($cuvey_options['social_facebook'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Facebook','cuvey');?>" href="<?php  echo esc_url($cuvey_options['social_facebook']); ?>"><i class="fa fa-facebook"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_twitter'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Twitter','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_twitter']); ?>"><i class="fa fa-twitter"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_googlep'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Google Plus','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_googlep']); ?>"><i class="fa fa-google-plus"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_vimeo'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Vimeo','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_youtube'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Youtube','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_youtube']); ?>"><i class="fa fa-youtube"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_tumblr'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Tumblr','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_tumblr']); ?>"><i class="fa fa-tumblr"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_dribbble'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Dribble','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_dribbble']); ?>"><i class="fa fa-dribbble"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_pinterest'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Pintrest','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_linkedin'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Linkedin','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></span>
	            <?php endif; ?><?php if (!empty($cuvey_options['social_instagram'])) : ?>
	            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="<?php _e('Instagram','cuvey'); ?>" href="<?php  echo esc_url($cuvey_options['social_instagram']); ?>"><i class="fa fa-instagram"></i></a></span>
	            <?php endif; ?>               
            </div><!-- end social icons -->
        </div><!-- end col -->
    </div>
</div><!-- end coming-soon-wrapper -->
</div><!--wrapperend-->
<?php 
if(isset($cuvey_options['404_footer']) || $cuvey_options['404_footer']==1):
	cuvey_social_icons();
endif;
if(isset($cuvey_options['meta_javascript']) && $cuvey_options['meta_javascript']!='') 
echo wp_kses_post($cuvey_options['meta_javascript']); ?>  
<?php wp_footer(); ?>
