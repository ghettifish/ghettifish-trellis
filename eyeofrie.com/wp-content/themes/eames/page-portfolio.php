<?php /* Template Name: Portfolio Template */ ?>
<?php
	wp_enqueue_script('overlay-cursor', THEME_URI . '/js/overlay-cursor.js', array('jquery'), '1.0', true);
	get_header('gallery');
?>
<div id="content-area" role="main" class="clearfix">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): ?>
			<?php the_post(); ?>
			<?php if (!post_password_required()): ?>
				<?php $images = grab_ids_from_gallery(); ?>
				<section id="page">
					<?php $showThumb = eames_theme_option('portfolio_thumbnail_display'); ?>
					<div id="gallery-wrap" class="non-responsive<?php if ($showThumb) :?> show-thumbs<?php endif; ?>">
						<?php $slideEnabled = eames_theme_option('enable_portfolio_slideshow'); ?>
						<?php if ($slideEnabled): ?>
							<?php $slideDelay = eames_theme_option('portfolio_slideshow_delay'); ?>
							<div id="gallery-start" data-cycle-slides="> div" data-cycle-fx="none" data-cycle-pager="#slide-thumbs" data-cycle-pager-template="" class="cycle-slideshow" <?php if (!$slideDelay): ?>data-cycle-paused="true"<?php endif; ?> data-cycle-log="false" <?php if ($slideDelay): ?>data-cycle-timeout="<?php echo $slideDelay * 1000; ?>"<?php endif; ?> data-cycle-prev=".prev" data-cycle-next=".next" data-cycle-easing="easeOutBack" data-cycle-speed="1">
								<?php $counter = 0; ?>
								<?php foreach ($images as $image): ?>
									<?php
										$attachment = wp_get_attachment_image_src($image, 'full');
										if ($counter != 0) {
											$imageSrc = THEME_URI . '/images/blank.gif';
										} else {
											$imageSrc = $attachment[0];
										}
									?>
									<div class="gallery-photo">
										<img data-src="<?php echo $attachment[0]; ?>" src="<?php echo $imageSrc; ?>" data-width="<?php echo $attachment[1]; ?>" data-height="<?php echo $attachment[2]; ?>" alt="" />
										<?php $imageDetails = get_post($image); ?>
										<?php if ($imageDetails->post_content || $imageDetails->post_excerpt): ?>
										<div class="caption">
											<h2><?php echo $imageDetails->post_excerpt; ?></h2>
											<p><?php echo esc_attr(do_shortcode($imageDetails->post_content)); ?></p>
										</div>
										<?php endif; ?>
										<?php $counter++; ?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="slide-overlays">
								<div class="slide-overlay prev"></div>
								<div class="slide-overlay show-thumbnails"></div>
								<div class="slide-overlay next"></div>
								<div id="cursor" class="cursor"></div>
							</div>
							<div id="slide-thumbs" class="hidden cycle-pager external">
								<?php foreach ($images as $image): ?>
									<?php $attachment = wp_get_attachment_image_src($image, 'portfolio-thumbnails'); ?>
									<div class="thumb-wrapper">
										<img class="lazy" data-original="<?php echo $attachment[0]; ?>" alt="" width="<?php echo $attachment[1]; ?>" data-width="<?php echo $attachment[1]; ?>" data-height="<?php echo $attachment[2]; ?>" height="<?php echo $attachment[2]; ?>" />
									</div>
								<?php endforeach; ?>
							</div>
						<?php else: ?>
							<div id="gallery-start" class="slide-disabled">
								<div class="gallery-photo">
									<?php $attachment = wp_get_attachment_image_src($images[0], 'full'); ?>
									<img src="<?php echo $attachment[0]; ?>" data-width="<?php echo $attachment[1]; ?>" data-height="<?php echo $attachment[2]; ?>" />
								</div>
							</div>
						<?php endif; ?>
					</div>
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
					<?php echo eames_gallery_desc(); ?>
				</section>
			<?php else: ?>
				<div class="content">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content();?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<!--//end content area-->
<?php get_footer(); ?>