<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<?php if (comments_open()) : ?>
<div id="comments-single" class="clearfix">
        <?php if ( post_password_required() ) : ?>
            <p class="nopassword">
                <?php _e( 'This post is password protected. Enter the password to view any comments.', 'cuvey' ); ?>
            </p>
        <?php return; endif; ?>

        <?php
        $ncom = get_comments_number();
        if ($ncom>0) :

            echo '<div class="section-title"><h3 class="widgettitle">&nbsp;';
            _e('Comments','cuvey');
            echo '&nbsp;(';
            if ($ncom==1) _e('1', 'cuvey'); else echo sprintf (__('%s','cuvey'), $ncom);
            echo ')</h3><div class="divider"></div></div>';

            if ($ncom >= get_option('comments_per_page') && get_option('page_comments')) : ?>
                <nav id="comment-nav-above">
                    <?php paginate_comments_links(); ?>
                </nav>
            <?php endif; ?>

            <ul class="media-list">
                <?php
                // Comment List
                $args = array (
                    'paged' => true,
                    'avatar_size'       => 75,
                    'callback'=> 'cuvey_comment',                    
                    'style'=> 'ul',

                );

                wp_list_comments($args);
                ?>
            </ul>

            <?php if ($ncom >= get_option('comments_per_page') && get_option( 'page_comments' ) ) : ?>
                <nav id="comment-nav-below">
                    <?php paginate_comments_links(); ?>
                </nav>
            <?php endif; ?>

        <?php endif; ?>
        <div class="clearfix"></div><br />       
</div>
<?php endif; ?>