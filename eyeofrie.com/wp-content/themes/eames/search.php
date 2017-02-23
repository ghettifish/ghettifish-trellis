<?php get_header(); ?>
    <div id="content-area" role="main" class="clearfix">
        <div class="content">
            <h1 class="page-title"><?php _e('Search', 'eames'); ?></h1>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="entry">
                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
                    <?php get_template_part('post-meta'); ?>
                    <?php
                        $thumb = get_post_meta($post->ID,'_thumbnail_id',false);
                        $thumb = wp_get_attachment_image_src($thumb[0], false);
                        $thumb = $thumb[0];
                    ?>
                    <?php if ( has_post_thumbnail() ) { ?>
                    <img class="feat" src="<?php echo $thumb; ?>" alt="" />
                    <?php } ?>
                    <?php the_excerpt();?>
                    <a href="<?php the_permalink();?>" class="read-more"><?php _e('Read More', 'eames'); ?></a>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php get_template_part('pagination'); ?>
        </div>
        <?php get_sidebar('post'); ?>
    </div>
    <!--//end content area-->
<?php get_footer(); ?>
