<?php get_header(); ?>
    <div id="content-area" role="main" class="clearfix">
        <div class="content entries">
            <?php
                query_posts(array(
                    'post_type' => 'post',
                    'paged'     => get_query_var('paged')
                ));
            ?>
            <?php global $more; $more = 0; ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="entry">
                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
                    <?php get_template_part('post-meta'); ?>
                    <?php $thumb = get_post_meta($post->ID,'_thumbnail_id',false); ?>
                    <?php if (!empty($thumb)):  ?>
                        <?php
                            $thumb = wp_get_attachment_image_src($thumb[0], false);
                            $thumb = $thumb[0];
                        ?>
                        <?php if ( has_post_thumbnail() ) { ?>
                            <img class="feat" src="<?php echo $thumb; ?>" alt="" />
                        <?php } ?>
                    <?php endif; ?>
                    <?php the_content(__('Read More', 'eames')); ?>
                </div>
                <?php endwhile;?>
            <?php endif; ?>
            <?php get_template_part('pagination'); ?>
            <?php wp_reset_query();?>
        </div>
    </div>
    <!--//end content area-->
<?php get_footer(); ?>
