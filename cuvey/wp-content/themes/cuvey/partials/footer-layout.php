<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php  global $cuvey_options; ?>

<?php if(isset($cuvey_options['footer-layout'])): ?>
       <div class="row">
                    


                     <?php if(esc_attr($cuvey_options['footer-layout'])=='1'): ?>
                            <div class="col-sm-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>
                     <?php endif; ?>

                     <?php if(esc_attr($cuvey_options['footer-layout'])=='2'): ?>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>

                    <?php if(esc_attr($cuvey_options['footer-layout'])=='3'): ?>
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>

                    <?php if(esc_attr($cuvey_options['footer-layout'])=='4'): ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>

                     <?php if(esc_attr($cuvey_options['footer-layout'])=='5'): ?>
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>


                      <?php if(esc_attr($cuvey_options['footer-layout'])=='6'): ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-3')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>

                     <?php if(esc_attr($cuvey_options['footer-layout'])=='7'): ?>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-3')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?>

                     <?php if(esc_attr($cuvey_options['footer-layout'])=='8'): ?>
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-3')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                     <?php endif; ?> 

                     <?php if(esc_attr($cuvey_options['footer-layout'])=='9'): ?>
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-3')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                    <?php endif; ?>

                    <?php if(esc_attr($cuvey_options['footer-layout'])=='10'): ?>
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-1')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>  
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-2')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-3')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('cuvey-widgets-footer-block-4')) : ?>
                                    <?php //_e ('add widgets here', 'cuvey'); ?>
                                <?php endif; ?>
                            </div>
                    <?php endif; ?>


                </div>
<?php endif; ?>