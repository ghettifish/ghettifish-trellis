<?php get_header(); ?>
    <div id="content-area" role="main" class="clearfix">
        <div class="content entries">
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

            <?php /* If this is a category archive */ if (is_category()) { ?>
                <h2><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'eames'), single_cat_title('', false)); ?></h2>

            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                <h2><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'eames'), single_tag_title('', false)) ?></h2>

            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                <h2><?php _e('Archive for', 'eames'); ?> <?php the_time('F jS, Y'); ?></h2>

            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                <h2><?php _e('Archive for', 'eames'); ?> <?php the_time('F, Y'); ?></h2>

            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                <h2 class="pagetitle"><?php _e('Archive for', 'eames'); ?> <?php the_time('Y'); ?></h2>

            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                <h2 class="pagetitle"><?php _e('Author Archive', 'eames'); ?></h2>

            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h2 class="pagetitle"><?php _e('Blog Archives', 'eames') ?></h2>

            <?php } ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="entry">
                <h1 class="post-title"><?php the_title();?></h1>
                <div class="date-meta">
                    <?php _e('Posted by', 'eames') ?> <a href="#"><?php the_author() ?></a> <?php _e('on', 'eames') ?> <?php the_time('F j, Y') ?> <?php _e('in', 'eames') ?> <?php the_category(', ');?> | <?php comments_popup_link(__('No Comments', 'eames'), __('1 Comment', 'eames'), __('% Comments', 'eames'), 'comments-link', ''); ?>
                </div>
                <?php
                    $thumb = get_post_meta($post->ID,'_thumbnail_id',false);
                    $thumb = wp_get_attachment_image_src($thumb[0], false);
                    $thumb = $thumb[0];
                ?>
                <?php if ( has_post_thumbnail() ) { ?>
                <img class="feat" src="<?php echo $thumb; ?>" alt="" />
                <?php } ?>

                <?php the_excerpt();?>

                <a href="<?php the_permalink();?>" class="read-more"><?php _e('Read More', 'eames') ?></a>
            </div>
            <?php endwhile;?>

            <?php else : ?>
            <div class="entry">
                <h1 class="post-title"><?php _e('No Post found', 'eames') ?></h1>
                <p><?php _e('Please try again later...', 'eames'); ?></p>
            </div>
            <?php endif; ?>
        </div>

    </div>
    <!--//end content area-->
<?php get_footer(); ?>
