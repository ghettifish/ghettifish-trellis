<?php get_header(); ?>
	<div id="content-area" role="main" class="clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="content">
			<?php $hasTitle = get_post_meta($post->ID, 'layout_title', true); ?>
			<?php if ($hasTitle != "0"): ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php the_content();?>
		</div>
		<?php endwhile; endif; ?>
		<?php get_sidebar('page'); ?>
	</div>
	<!--//end content area-->
<?php get_footer(); ?>