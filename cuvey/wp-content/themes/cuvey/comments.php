<?php
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { ?>
        <p class="no-comments"><?php echo __('This post is password protected. Enter the password to view comments.', 'cuvey'); ?></p>
    <?php
        return;
    }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

    <div id="comments" class="comments">
        <h5><?php comments_number(__('No Comments', 'cuvey'), __('One Comment', 'cuvey'), '% '.__('Comments', 'cuvey'));?></h5>

        <ol class="commentlist">
            <?php wp_list_comments('callback=avada_comment'); ?>
        </ol>

        <div class="comments-navigation">
            <div class="alignleft"><?php previous_comments_link(); ?></div>
            <div class="alignright"><?php next_comments_link(); ?></div>
        </div>
    </div>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->

     <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="no-comments"><?php echo __('Comments are closed.', 'cuvey'); ?></p>

    <?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

    <?php
    function modify_comment_form_fields($fields){
        $commenter = wp_get_current_commenter();
        $req       = get_option( 'require_name_email' );

        $fields['author'] = '<div class="row"><div class="col-md-6"><div class="form-group">
                            <input type="text" name="author" id="author" value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. __("Name", "cuvey").'" size="22" tabindex="1"'. ( $req ? 'aria-required="true"' : '' ).' class="form-control" /></div>';

        $fields['email'] = '<div class="form-group"><input type="text" name="email" id="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'. __("Your Email", "cuvey").'" size="22" tabindex="2"'. ( $req ? 'aria-required="true"' : '' ).' class="form-control"/></div>';

        $fields['url'] = '<div class="form-group"><input type="text" name="url" id="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. __("Website", "cuvey").'" size="22" tabindex="3" class="form-control" /></div></div>';

        return $fields;
    }
    add_filter('comment_form_default_fields','modify_comment_form_fields');

    $comments_args = array(
        'title_reply' => '<h3>'. __("Leave A Message", "cuvey").'</h3>',
        'title_reply_to' => '<h3>'. __("Leave A Message", "cuvey").'</h3>',
        'must_log_in' => '<p class="must-log-in">' .  sprintf( __( "You must be %slogged in%s to post a comment.", "cuvey" ), '<a href="'.wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ).'">', '</a>' ) . '</p>',
        'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as","cuvey" ).' <a href="' .admin_url( "profile.php" ).'">'.$user_identity.'</a>. <a href="' .wp_logout_url(get_permalink()).'" title="' . __("Log out of this account", "cuvey").'">'. __("Log out &raquo;", "cuvey").'</a></p>',
        'comment_notes_before' => '',
        'comment_notes_after' => '<button type="submit" class="btn">'.__('POST COMMENT').'</button></div></div>',
        'comment_field' => '<div class="col-md-6"> <div class="form-group"><textarea name="comment" id="comment" cols="39" rows="4" tabindex="4" class="form-control" placeholder="'. __("Message", "cuvey").'"></textarea></div>',
        'id_submit' => 'comment-submit',
        'label_submit'=> __("Post Comment", "cuvey"),
    );

    comment_form($comments_args);
    echo str_replace('class="comment-form"','class="com-form"',ob_get_clean());
    ?>

<?php endif; // if you delete this the sky will fall on your head ?>