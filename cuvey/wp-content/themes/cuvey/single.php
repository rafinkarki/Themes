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
                            <?php get_template_part('partials/article'); ?>
                              <div class="next-prev text-center clearfix">
                                <nav>
                                    <ul class="pager">
                                       <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                                       <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                                    </ul>
                                </nav>
                              </div><!-- end next prev --> 
                            <?php comments_template( '', true ); ?>
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
                            <?php get_template_part('partials/article'); ?>
                              <div class="next-prev text-center clearfix">
                                <nav>
                                    <ul class="pager">
                                       <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                                       <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                                    </ul>
                                </nav>
                              </div><!-- end next prev -->
                            <?php comments_template( '', true ); ?>
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

<section  class="section-gray hiden clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12"></div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="comment-form">
                    <div class="section-title">
                        <h3><?php _e('Leave a reply','cuvey'); ?></h3>
                        <div class="divider"></div>
                        <p><?php _e('Your feedbacks very important for us!','cuvey'); ?></p>
                    </div><!-- end section title -->

                    <div class="clearfix"></div>
                    <br>
                    <?php global $req,$commenter;
                    // Comment Form
                    $aria_req = ( $req ? " aria-required='true'" : '' );
                    $fields =  array(
                        'author' => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="name"><label>' . ( $req ? '*' : '' ) . __( 'Your Name', 'cuvey' ) . '</label> ',
                                    '<input id="author" class="border-radius form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
                        'email'  => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="email"><label>' . ( $req ? '*' : '' ) . __( 'Your Email', 'cuvey' ) . '</label> ',
                                    '<input id="email" class="border-radius form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>'
                    );
                    $args = array (
                        'id_form' => 'comments_form',
                        'id_submit' => 'comment-submit',
                        'comment_field' =>  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="feedback"><label>' . __( 'Write your feedback here...', 'cuvey' ) .
                        '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
                        '</textarea></div></div>',
                        'comment_notes_after' => '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br><button class="btn btn-primary border-radius" type="submit" id="submit"><span>'.__('Post Comment','cuvey').'</span></button></div>' ,
                        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                        'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','cuvey'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</p>',
                        
                    );
                    comment_form($args);


                    ?>

                </div>
            </div><!-- end col 10 -->
            <div class="col-lg-1 col-md-1 col-sm-12"></div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php get_footer(); ?>