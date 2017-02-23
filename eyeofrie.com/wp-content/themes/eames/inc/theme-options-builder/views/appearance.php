<style type="text/css" media="all">
    <?php if (!empty($logo_text_color)): ?>
        #logo h1 a.logo {
            color: <?php echo $logo_text_color; ?>;
        }
    <?php endif; ?>

    <?php if (!empty($link_color)): ?>
    #content-area a,
    .gallery-desc a,
    .widget_categories a,
    .widget_pages a,
    .widget_archive a,
    .widget_meta a,
    .widget-nav-menu a,
    .widget_calendar a,
    .widget_links a,
    .widget_tag_cloud a,
    .widget_recent_comments a,
    .widget_recent_entries a,
    .widget_text a {
        color: <?php echo $link_color; ?>!important;
    }
    <?php endif; ?>

    <?php if (!empty($link_hover_color)): ?>
    /*#content-area .content .entry a.read-more,*/
    #content-area a:hover,
    .gallery-desc a:hover,
    .widget_categories a:hover,
    .widget_pages a:hover,
    .widget_archive a:hover,
    .widget_meta a:hover,
    .widget-nav-menu a:hover,
    .widget_calendar a:hover,
    .widget_links a:hover,
    .widget_tag_cloud a:hover,
    .widget_recent_comments a:hover,
    .widget_recent_entries a:hover,
    .widget_text a:hover {
        color: <?php echo $link_hover_color; ?>!important;
    }
    <?php endif; ?>

    <?php if (!empty($menu_text_color)): ?>
    #pagenav ul li a {
        color: <?php echo $menu_text_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($menu_hover_color)): ?>
    #pagenav ul li > a:hover,
    #pagenav ul li.current_page_item > a,
    #pagenav ul li.current_page_parent > a {
        color: <?php echo $menu_hover_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($menu_line_color)): ?>
    #pagenav a,
    #pagenav,
    #top,
    #top .sidebar,
    #top .sidebar .widget {
        border-color: <?php echo $menu_line_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($menu_cell_color)): ?>
    #pagenav ul li > a:hover,
    #pagenav ul li.current_page_item > a,
    #pagenav ul li.current_page_parent > a {
        background-color: <?php echo $menu_cell_color; ?>;
    }
    <?php endif; ?>



    <?php if (!empty($sub_menu_color)): ?>
    #pagenav ul.sub-menu a{
        color: <?php echo $sub_menu_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($sub_menu_hover_color)): ?>
	#pagenav ul.sub-menu li a:hover,
    #pagenav ul.sub-menu li ul li a:hover,
    #pagenav ul.sub-menu li.current_page_item a,
    #pagenav ul.sub-menu li ul li.current_page_item a {
        color: <?php echo $sub_menu_hover_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($caption_line_color)): ?>
    #gallery-start .caption {
        border-color: <?php echo $caption_line_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($page_heading_color)): ?>
    #content-area .content h1.post-title,
    #content-area .content h1.page-title,
    #content-area .content h1.post-title a {
        color: <?php echo $page_heading_color; ?>!important;
    }
    <?php endif; ?>

    <?php if (!empty($page_text_color)): ?>
    #content-area .content {
        color: <?php echo $page_text_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($widget_heading_color)): ?>
    #top .sidebar h3.widget-title,
    #content-area .sidebar h3.widget-title {
        color: <?php echo $widget_heading_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($widget_text_color)): ?>
    #top .sidebar .widget,
    #content-area .widget {
        color: <?php echo $widget_text_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($image_caption_color)): ?>
    #gallery-start .caption h2,
    #gallery-start .caption p {
        color: <?php echo $image_caption_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($social_media_icon_color)): ?>
    #socialnav ul li a {
        color: <?php echo $social_media_icon_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($footer_text_color)): ?>
    #footer #copy {
        color: <?php echo $footer_text_color; ?>;
    }
    <?php endif; ?>

    <?php if (!empty($footer_bg_color)): ?>
    #footerwrap {
        background: <?php echo $footer_bg_color; ?>;
    }
    <?php endif; ?>
</style>
