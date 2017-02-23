<?php
    $themeOptions = eames_theme_option();
    $showAuthor = $themeOptions['show_author'];
    $showDate = $themeOptions['show_date'];
    $showCategory = $themeOptions['show_category'];
    $showCommentCount = $themeOptions['show_comment_count'];
    $metaVisible = $showAuthor || $showDate || $showCategory || $showCommentCount;
?>
<?php if ($metaVisible): ?>
    <div class="date-meta">
        <?php _e('Posted', 'eames'); ?> <?php if ($showAuthor): ?><?php _e('by', 'eames') ?> <a href="#"><?php the_author() ?></a><?php endif; ?> <?php if ($showDate): ?><?php _e('on', 'eames'); ?> <?php the_time('F j, Y') ?><?php endif; ?> <?php if ($showCategory): ?><?php _e('in', 'eames'); ?> <?php the_category(', ');?><?php endif; ?> <?php if ($showCommentCount): ?>| <?php comments_popup_link(__('No Comments', 'eames'), __('1 Comment', 'eames'), __('% Comments', 'eames'), 'comments-link', ''); ?><?php endif; ?>
    </div>
<?php endif; ?>
