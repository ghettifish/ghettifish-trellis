<?php /* Template Name: Home Page Template */ ?>
<?php
	wp_enqueue_script('overlay-cursor', THEME_URI . '/js/overlay-cursor.js', array('jquery'), '1.0', true);
	get_header('gallery');
?>
<div id="content-area" role="main" class="clearfix">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): ?>
		<?php
			the_post();
			$images = grab_ids_from_gallery();
		?>
		<section id="page">
			<?php echo homepageGallery($images); ?>
			<div id="gallery-wrap-responsive" class="responsive">
				<div id="gallery-start-mobile">
					<?php foreach ($images as $image): ?>
						<?php $attachment = wp_get_attachment_image_src($image, 'large'); ?>
						<div class="gallery-photo">
							<img class="lazy" src="<?php echo THEME_URI; ?>/images/blank.gif" data-original="<?php echo $attachment[0]; ?>" width="<?php echo $attachment[1]; ?>" height="<?php echo $attachment[2]; ?>" />
							<?php $imageDetails = get_post($image); ?>
							<?php if ($imageDetails->post_content || $imageDetails->post_excerpt): ?>
							<div class="caption">
								<?php if ($imageDetails->post_excerpt): ?>
									<h2><?php echo $imageDetails->post_excerpt; ?></h2>
								<?php endif; ?>
								<?php if ($imageDetails->post_content): ?>
									<p><?php echo esc_attr(do_shortcode($imageDetails->post_content)); ?></p>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<!--//end content area-->
<?php get_footer(); ?>