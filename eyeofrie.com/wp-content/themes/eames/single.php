<?php get_header(); ?>
	<div id="content-area" role="main" class="clearfix">
		<div class="content entries">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="entry">
				<?php $hasTitle = get_post_meta($post->ID, 'layout_title', true); ?>
				<?php if ($hasTitle != "0"): ?>
					<h1 class="post-title"><?php the_title();?></h1>
				<?php endif; ?>
				<?php get_template_part('post-meta'); ?>
				<?php
					$thumb = get_post_meta($post->ID,'_thumbnail_id',false);
					$thumb = wp_get_attachment_image_src($thumb[0], false);
					$thumb = $thumb[0];
				?>
				<?php if ( has_post_thumbnail() ) { ?>
				<img class="feat" src="<?php echo $thumb; ?>" alt="" />
				<?php } ?>

				<?php the_content();?>
			</div>
			<div class="entry-comments">
				<?php comments_template('', true); ?>
			</div>
			<?php endwhile;?>
			<?php endif; ?>
		</div>
	</div>
	<!--//end content area-->
<?php get_footer(); ?>