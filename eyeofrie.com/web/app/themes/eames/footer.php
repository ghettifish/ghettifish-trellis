		</div>
		<div id="push"></div><!-- /.push -->
	</div>
	<div id="footerwrap">
		<footer id="footer" class="clearfix">
			<?php extract(get_my_theme_options());?>
			<div id="socials" class="fr">
				<nav id="socialnav">
					<ul class="clearfix">
						<?php if ($instagram) : ?>
							<li><a href="<?php echo esc_url($instagram); ?>" target="_blank" title="Instagram"><span aria-hidden="true" class="icon-instagram"></span></a></li>
						<?php endif; ?>

						<?php if ($flickr) : ?>
							<li><a href="<?php echo esc_url($flickr); ?>" target="_blank" title="Flickr"><span aria-hidden="true" class="icon-flickr"></span></a></li>
						<?php endif; ?>

						<?php if ($vimeo) : ?>
							<li><a href="<?php echo esc_url($vimeo); ?>" target="_blank" title="Vimeo"><span aria-hidden="true" class="icon-vimeo2"></span></a></li>
						<?php endif; ?>

						<?php if ($pinterest) : ?>
							<li><a href="<?php echo esc_url($pinterest); ?>" target="_blank" title="Pinterest"><span aria-hidden="true" class="icon-pinterest"></span></a></li>
						<?php endif; ?>

						<?php if ($tumblr) : ?>
							<li><a href="<?php echo esc_url($tumblr); ?>" target="_blank" title="Tumblr"><span aria-hidden="true" class="icon-tumblr"></span></a></li>
						<?php endif; ?>

						<?php if ($feed) : ?>
							<li><a href="<?php echo esc_url($feed); ?>" target="_blank" title="Feed"><span aria-hidden="true" class="icon-feed"></span></a></li>
						<?php endif; ?>

						<?php if ($linkedin) : ?>
							<li><a href="<?php echo esc_url($linkedin); ?>" target="_blank" title="LinkedIn"><span aria-hidden="true" class="icon-linkedin"></span></a></li>
						<?php endif; ?>

						<?php if ($google_plus) : ?>
							<li><a href="<?php echo esc_url($google_plus); ?>" target="_blank" title="Google Plus"><span aria-hidden="true" class="icon-google-plus"></span></a></li>
						<?php endif; ?>

						<?php if ($twitter) : ?>
							<li><a href="<?php echo esc_url($twitter); ?>" target="_blank" title="Twitter"><span aria-hidden="true" class="icon-twitter"></span></a></li>
						<?php endif; ?>

						<?php if ($facebook) : ?>
							<li><a href="<?php echo esc_url($facebook); ?>" target="_blank" title="Facebook"><span aria-hidden="true" class="icon-facebook"></span></a></li>
						<?php endif; ?>

						<?php if ($youtube) : ?>
							<li><a href="<?php echo esc_url($youtube); ?>" target="_blank" title="Youtube"><span aria-hidden="true" class="icon-youtube"></span></a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
			<div id="copy" class="fl"><?php echo $copyright_notice; ?></div>
		</footer>
	</div>
	<div class="responsive"></div>
	<?php wp_footer(); ?>
</body>
</html>