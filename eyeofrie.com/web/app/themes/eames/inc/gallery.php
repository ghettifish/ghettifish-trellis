<?php $showThumb = eames_theme_option('thumbnail_display'); ?>
<div id="gallery-wrap" class="non-responsive<?php if ($showThumb) :?> show-thumbs<?php endif; ?>">
	<?php $slideEnabled = eames_theme_option('enable_slideshow'); ?>
	<?php if ($slideEnabled): ?>
		<?php $slideDelay = eames_theme_option('slideshow_delay'); ?>
		<div id="gallery-start" data-cycle-slides="> div" data-cycle-pager="#slide-thumbs" data-cycle-pager-template="" class="cycle-slideshow" <?php if (!$slideDelay): ?>data-cycle-paused="true"<?php endif; ?> data-cycle-fx="none" data-cycle-log="false" <?php if ($slideDelay): ?>data-cycle-timeout="<?php echo $slideDelay * 1000; ?>"<?php endif; ?> data-cycle-prev=".prev" data-cycle-next=".next" data-cycle-easing="easeOutBack">
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

		<div id="slide-thumbs" class="cycle-pager external">
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