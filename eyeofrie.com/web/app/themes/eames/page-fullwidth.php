<?php //Template Name:  Full Width Template ?>
<?php get_header(); ?>
	<div id="content-area" role="main" class="clearfix fullwidth">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="content contentfull">
			<?php $hasTitle = get_post_meta($post->ID, 'layout_title', true); ?>
			<?php if ($hasTitle != "0"): ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php the_content();?>
		</div>
		<?php endwhile; endif; ?>
	</div>
	<!--//end content area-->
<?php get_footer(); ?>