<style type="text/css" media="all">
    <?php $googleFonts = array(); ?>

    <?php if (!empty($font_for_logo)): ?>
        #logo h1 a.logo {
            font-family: <?php echo $font_for_logo; ?>;
        }
        <?php $googleFonts[] = $font_for_logo; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_menu)): ?>
        #pagenav ul li a {
            font-family: '<?php echo $font_for_menu; ?>';
        }
        <?php $googleFonts[] = $font_for_menu; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_body_text)): ?>
        body {
            font-family: '<?php echo $font_for_body_text; ?>';
        }
        <?php $googleFonts[] = $font_for_body_text; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_page_headings)): ?>
        #content-area .content h1.post-title,
        #content-area .content h1.page-title {
            font-family: '<?php echo $font_for_page_headings; ?>';
        }
        <?php $googleFonts[] = $font_for_page_headings; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_widget_headings)): ?>
        #top .sidebar h3.widget-title,
        #content-area .sidebar h3.widget-title {
            font-family: '<?php echo $font_for_widget_headings; ?>';
        }
        <?php $googleFonts[] = $font_for_widget_headings; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_widget_text)): ?>
        #top .sidebar .widget,
		.textwidget {
            font-family: '<?php echo $font_for_widget_text; ?>';
        }
        <?php $googleFonts[] = $font_for_widget_text; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_image_captions)): ?>
        #gallery-start-mobile .caption,
        #gallery-start .caption h2,
        #gallery-start .caption p {
            font-family: '<?php echo $font_for_image_captions; ?>';
        }
        <?php $googleFonts[] = $font_for_image_captions; ?>
    <?php endif; ?>

    <?php if (!empty($font_for_footer_text)): ?>
        #footer #copy {
            font-family: '<?php echo $font_for_footer_text; ?>';
        }
        <?php $googleFonts[] = $font_for_menu; ?>
    <?php endif; ?>

    <?php if (!empty($logo_font_size)): ?>
        #logo h1 a.logo {
            font-size: <?php echo $logo_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($menu_font_size)): ?>
        #pagenav ul li a {
            font-size: <?php echo $menu_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($sub_menu_font_size)): ?>
        #pagenav ul li li a {
            font-size: <?php echo $sub_menu_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($headings_font_size)): ?>
        #content-area .content h1.post-title a,
        #content-area .content h1.post-title,
        #content-area .content h1.page-title,
        #content-area .sidebar h3.widget-title,
        #top .sidebar h3.widget-title {
            font-size: <?php echo $headings_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($body_text_font_size)): ?>
        #content-area .content {
            font-size: <?php echo $body_text_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($body_text_line_height)): ?>
        #content-area .content p {
            line-height: <?php echo $body_text_line_height; ?>em;
        }
    <?php endif; ?>

    <?php if (!empty($widget_text_font_size)): ?>
        #top .sidebar .widget,
        #content-area .widget {
            font-size: <?php echo $widget_text_font_size; ?>px;
        }
    <?php endif; ?>

    <?php if (!empty($widget_text_line_height)): ?>
        #top .sidebar .widget,
        #content-area .widget {
            line-height: <?php echo $widget_text_line_height; ?>em;
        }
    <?php endif; ?>
</style>
<?php if (!empty($googleFonts)): ?>
    <?php echo generate_google_fonts_link($googleFonts, 'link'); ?>
<?php endif; ?>
