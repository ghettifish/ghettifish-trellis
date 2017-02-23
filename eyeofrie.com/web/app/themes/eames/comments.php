<?php
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { ?>
        <?php _e('This post is password protected. Enter the password to view comments.', 'eames'); ?>
<?php
        return;
    }
?>

<?php if ( have_comments() ) : ?>
    <h2 id="comments"><?php comments_number(__('No Responses', 'eames'), __('One Response', 'eames'), __('% Responses', 'eames'));?></h2>
    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>
    <ol class="commentlist">
        <?php wp_list_comments('callback=eames_comments'); ?>
    </ol>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>
 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
     <?php else : // comments are closed ?>
        <p><?php _e('Comments are closed.', 'eames') ?></p>
    <?php endif; ?>

<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
    <h2><?php comment_form_title(__('Leave a Reply', 'eames'), __('Leave a Reply to %s', 'eames')); ?></h2>
    <div class="cancel-comment-reply">
        <?php cancel_comment_reply_link(); ?>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'eames'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
    <div class="non-responsive">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if ( is_user_logged_in() ) : ?>
                <p><?php _e('Logged in', 'eames') ?> as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'eames'); ?>"><?php _e('Log out &raquo;', 'eames') ?></a></p>
            <?php else : ?>
                <div>
                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                    <label for="author"><?php _e('Name', 'eames') ?> <?php if ($req) echo "(required)"; ?></label>
                </div>
                <div>
                    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                    <label for="email"><?php _e('Mail (will not be published)', 'eames') ?> <?php if ($req) echo "(required)"; ?></label>
                </div>
                <div>
                    <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                    <label for="url"><?php _e('Website', 'eames') ?></label>
                </div>
            <?php endif; ?>
            <div>
                <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
            </div>
            <div>
                <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'eames') ?>" />
                <?php comment_id_fields(); ?>
            </div>
            <?php do_action('comment_form', $post->ID); ?>
        </form>
    </div>
    <div class="responsive">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if ( is_user_logged_in() ) : ?>
                <p><?php _e('Logged in as', 'eames') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'eames'); ?>"><?php _e('Log out &raquo;', 'eames'); ?></a></p>
            <?php else : ?>
                <div>
                    <input type="text" name="author" id="author" placeholder="<?php _e('Name', 'eames'); ?>" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="<?php _e('Email', 'eames'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                </div>
                <div>
                    <input type="text" name="url" id="url" placeholder="<?php _e('Website', 'eames') ?>" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                </div>
            <?php endif; ?>
            <div>
                <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" placeholder="<?php _e('Comment', 'eames'); ?>"></textarea>
            </div>
            <div>
                <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'eames') ?>" />
                <?php comment_id_fields(); ?>
            </div>
            <?php do_action('comment_form', $post->ID); ?>
        </form>
    </div>

    <?php endif; // If registration required and not logged in ?>

</div>

<?php endif; ?>
