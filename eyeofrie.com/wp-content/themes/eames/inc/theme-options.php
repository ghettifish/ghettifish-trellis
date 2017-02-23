<?php
define('TEMPLATE_VERSION', '');
require_once(TEMPLATEPATH.'/inc/theme-options-builder/theme-options-builder.php');

define('THEME_OPTION_PATH', TEMPLATEPATH.'/inc/theme-options-builder/' );
define('THEME_OPTION_URL', get_template_directory_uri().'/inc/theme-options-builder/' );

function eames_font_sizes(){
    for($i=6; $i<= 56; $i++){
        $font_sizes[$i] = $i.'px';
    }
    return $font_sizes;
}


function eames_line_heights(){
    $line_heights = array(
        '0.5'=>'0.5',
        '0.6'=>'0.6',
        '0.7'=>'0.7',
        '0.8'=>'0.8',
        '0.9'=>'0.9',
        '1.0'=>'1.0',
        '1.1'=>'1.1',
        '1.2'=>'1.2',
        '1.3'=>'1.3',
        '1.4'=>'1.4',
        '1.5'=>'1.5',
        '1.6'=>'1.6',
        '1.7'=>'1.7',
        '1.8'=>'1.8',
        '1.9'=>'1.9',
        '2.0'=>'2.0',
        '2.1'=>'2.1',
        '2.2'=>'2.2',
        '2.3'=>'2.3',
        '2.4'=>'2.4',
        '2.5'=>'2.5',
        '2.6'=>'2.6',
        '2.7'=>'2.7',
        '2.8'=>'2.8',
        '2.9'=>'2.9',
        '3.0'=>'3.0'
    );
    return $line_heights;
}


$eames_font_sizes = eames_font_sizes();
$eames_line_heights = eames_line_heights();

$theme_options_groups = array(
    'general'     => __('General', 'eames'),
    'appearance'  => __('Appearance', 'eames'),
    'home-page'   => __('Home Page', 'eames'),
    'portfolio'   => __('Portfolio', 'eames'),
    'blog-posts'  => __('Blog Posts', 'eames'),
    'typography'  => __('Typography', 'eames'),
    'footer'      => __('Footer', 'eames'),
    'integration' => __('Integration', 'eames')
);

$theme_options_fields = array(
    'general' => array(
        array(
            'uid'     => 'logo',
            'type'    => 'upload',
            'label'   => __('Logo', 'eames'),
            'default' => '',
            'note'    => __('<p>Upload your site logo.</p><p><strong>Size:</strong> 288 pixel max width <br><strong>Resolution:</strong> 72 dpi <br><strong>Format:</strong> PNG</p>', 'eames')
        ),
        array(
            'uid'     => 'logo_hd',
            'type'    => 'upload',
            'label'   => __('HD Logo', 'eames'),
            'default' => '',
            'note'    => __('<p>Upload your HD logo.</p><p><strong>Size:</strong> 2x size of site logo <br><strong>Resolution:</strong> 72 dpi <br><strong>File Name:</strong> logo@2x.png <br><strong>Format:</strong> PNG</p>', 'eames')
        ),
        array(
            'uid'     => 'favicon',
            'type'    => 'upload',
            'label'   => __('Favicon', 'eames'),
            'default' => '',
            'note'    => __('<p>Upload your site favicon.</p><p><strong>Size:</strong> 16x16 pixels <br><strong>Resolution:</strong> 72 dpi <br><strong>Format:</strong> PNG</p>', 'eames')
        ),
        array(
            'uid'     => 'custom_css',
            'type'    => 'textarea',
            'label'   => __('Custom CSS', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter custom CSS to overwrite default styles.</p>', 'eames')
        )
    ),
    'appearance' => array(
        array(
            'uid'     => 'logo_text_color',
            'type'    => 'colorpicker',
            'label'   => __('Logo Text Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your text logo.</p>', 'eames')
        ),
        array(
            'uid'     => 'menu_text_color',
            'type'    => 'colorpicker',
            'label'   => __('Menu Text Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'menu_hover_color',
            'type'    => 'colorpicker',
            'label'   => __('Menu Hover Color', 'eames'),
            'default' => '#999999',
            'note'    => __('<p>Select a hover color for your menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'menu_line_color',
            'type'    => 'colorpicker',
            'label'   => __('Menu Line Color', 'eames'),
            'default' => '#ffffff',
            'note'    => __('<p>Select a line color for your menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'menu_cell_color',
            'type'    => 'colorpicker',
            'label'   => __('Menu Cell Color', 'eames'),
            'default' => '#ffffff',
            'note'    => __('<p>Select a cell color for your menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'sub_menu_color',
            'type'    => 'colorpicker',
            'label'   => __('Sub Menu Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your sub menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'sub_menu_hover_color',
            'type'    => 'colorpicker',
            'label'   => __('Sub Menu Hover Color', 'eames'),
            'default' => '#999999',
            'note'    => __('<p>Select a hover color for your sub menu items.</p>', 'eames')
        ),
        array(
            'uid'     => 'page_heading_color',
            'type'    => 'colorpicker',
            'label'   => __('Page Heading Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your page/post headings.</p>', 'eames')
        ),
        array(
            'uid'     => 'page_text_color',
            'type'    => 'colorpicker',
            'label'   => __('Page Text Color', 'eames'),
            'default' => '#333333',
            'note'    => __('<p>Select a color for your body text.</p>', 'eames')
        ),
        array(
            'uid'     => 'link_color',
            'type'    => 'colorpicker',
            'label'   => __('Link Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your links.</p>', 'eames')
        ),
        array(
            'uid'     => 'link_hover_color',
            'type'    => 'colorpicker',
            'label'   => __('Link Hover Color', 'eames'),
            'default' => '#7f7f7f',
            'note'    => __('<p>Select a hover color for your links.</p>', 'eames')
        ),
        array(
            'uid'     => 'widget_heading_color',
            'type'    => 'colorpicker',
            'label'   => __('Widget Heading Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your widget headings.</p>', 'eames')
        ),
        array(
            'uid'     => 'widget_text_color',
            'type'    => 'colorpicker',
            'label'   => __('Widget Text Color', 'eames'),
            'default' => '#333333',
            'note'    => __('<p>Select a color for your widget text.</p>', 'eames')
        ),
        array(
            'uid'     => 'image_caption_color',
            'type'    => 'colorpicker',
            'label'   => __('Image Caption Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a color for your image captions.</p>', 'eames')
        ),
        array(
            'uid'     => 'social_media_icon_color',
            'type'    => 'colorpicker',
            'label'   => __('Social Media Icon Color', 'eames'),
            'default' => '#000000',
            'note'    => __('<p>Select a hover color for your social icons.</p>', 'eames')
        ),
        array(
            'uid'     => 'footer_text_color',
            'type'    => 'colorpicker',
            'label'   => __('Footer Text Color', 'eames'),
            'default' => '#595959',
            'note'    => __('<p>Select a color for your footer text.</p>', 'eames')
        ),
        array(
            'uid'     => 'footer_bg_color',
            'type'    => 'colorpicker',
            'label'   => __('Footer Background Color', 'eames'),
            'default' => '#FFFFFF',
            'note'    => __('<p>Select a color for your footer background.</p>', 'eames')
        )
    ),
    'home-page' => array(
        array(
            'uid'     => 'thumbnail_display',
            'type'    => 'checkbox',
            'label'   => __('Thumbnail Display', 'eames'),
            'default' => '0',
            'note'    => __('Check this box to enable Thumbnail View by default.', 'eames')
        ),
        array(
            'uid'     => 'enable_slideshow',
            'type'    => 'checkbox',
            'label'   => __('Enable Slideshow', 'eames'),
            'default' => '1',
            'note'    => __('Check this box to enable slideshow on home page.', 'eames')
        ),
        array(
            'uid'     => 'slideshow_delay',
            'type'    => 'textbox',
            'label'   => __('Slideshow Delay', 'eames'),
            'default' => '0',
            'note'    => __('<p>Enter the delay between slides in seconds (e.g., 4).</p>', 'eames')
        )
    ),
    'portfolio' => array(
        array(
            'uid'     => 'portfolio_thumbnail_display',
            'type'    => 'checkbox',
            'label'   => __('Thumbnail Display', 'eames'),
            'default' => '1',
            'note'    => __('Check this box to enable Thumbnail View by default.', 'eames')
        ),
        array(
            'uid'     => 'enable_portfolio_slideshow',
            'type'    => 'checkbox',
            'label'   => __('Enable Slideshow', 'eames'),
            'default' => '1',
            'note'    => __('Check this box to enable slideshow on portfolio page.', 'eames')
        ),
        array(
            'uid'     => 'portfolio_slideshow_delay',
            'type'    => 'textbox',
            'label'   => __('Slideshow Delay', 'eames'),
            'default' => '0',
            'note'    => __('<p>Enter the delay between slides in seconds (e.g., 4).</p>', 'eames')
        )
    ),
    'blog-posts' => array(
        array(
            'uid'     => 'show_author',
            'type'    => 'checkbox',
            'label'   => __('Show Author', 'eames'),
            'default' => '0',
            'note'    => __('<p>Check this box to show the author.</p>', 'eames')
        ),
        array(
            'uid'     => 'show_date',
            'type'    => 'checkbox',
            'label'   => __('Show Date', 'eames'),
            'default' => '1',
            'note'    => __('<p>Check this box to show the date.</p>', 'eames')
        ),
        array(
            'uid'     => 'show_category',
            'type'    => 'checkbox',
            'label'   => __('Show Category', 'eames'),
            'default' => '0',
            'note'    => __('<p>Check this box to show the category.</p>', 'eames')
        ),
        array(
            'uid'     => 'show_comment_count',
            'type'    => 'checkbox',
            'label'   => __('Show Comment Count', 'eames'),
            'default' => '0',
            'note'    => __('<p>Check this box to show the comment count.</p>', 'eames')
        )
    ),
    'typography' => array(
        array(
            'uid'     => 'font_for_logo',
            'type'    => 'textbox',
            'label'   => __('Font for Logo', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the logo.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_menu',
            'type'    => 'textbox',
            'label'   => __('Font for Menu', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the menu.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_body_text',
            'type'    => 'textbox',
            'label'   => __('Font for Body Text', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for body text.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_page_headings',
            'type'    => 'textbox',
            'label'   => __('Font for Page Headings', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for page/post headings.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_widget_headings',
            'type'    => 'textbox',
            'label'   => __('Font for Widget Headings', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for widget headings.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_widget_text',
            'type'    => 'textbox',
            'label'   => __('Font for Widget Text', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for widget text.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_image_captions',
            'type'    => 'textbox',
            'label'   => __('Font for Image Captions', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Font</a> you want to use for image captions.</p>', 'eames')
        ),
        array(
            'uid'     => 'font_for_footer_text',
            'type'    => 'textbox',
            'label'   => __('Font for Footer Text', 'eames'),
            'default' => 'Arial',
            'note'    => __('<p>Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Font</a> you want to use for footer text.</p>', 'eames')
        ),
        array(
            'uid'     => 'logo_font_size',
            'type'    => 'select',
            'label'   => __('Logo Font Size', 'eames'),
            'default' => '24',
            'note'    => __('<p>Select logo font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'menu_font_size',
            'type'    => 'select',
            'label'   => __('Menu Font Size', 'eames'),
            'default' => '18',
            'note'    => __('<p>Select menu font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'sub_menu_font_size',
            'type'    => 'select',
            'label'   => __('Sub Menu Font Size', 'eames'),
            'default' => '14',
            'note'    => __('<p>Select sub menu font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'headings_font_size',
            'type'    => 'select',
            'label'   => __('Headings Font Size', 'eames'),
            'default' => '20',
            'note'    => __('<p>Select page/post/widget heading font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'body_text_font_size',
            'type'    => 'select',
            'label'   => __('Body Text Font Size', 'eames'),
            'default' => '14',
            'note'    => __('<p>Select page/post text font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'body_text_line_height',
            'type'    => 'select',
            'label'   => __('Body Text Line Height', 'eames'),
            'default' => '1.5',
            'note'    => __('<p>Select body text line height.</p>', 'eames'),
            'options' => $eames_line_heights
        ),
        array(
            'uid'     => 'widget_text_font_size',
            'type'    => 'select',
            'label'   => __('Widget Text Font Size', 'eames'),
            'default' => '14',
            'note'    => __('<p>Select widget text font size.</p>', 'eames'),
            'options' => $eames_font_sizes
        ),
        array(
            'uid'     => 'widget_text_line_height',
            'type'    => 'select',
            'label'   => __('Widget Text Line Height', 'eames'),
            'default' => '1.7',
            'note'    => __('<p>Select widget text line height.</p>', 'eames'),
            'options' => $eames_line_heights
        )
    ),
    'footer' => array(
        array(
            'uid'     => 'copyright_notice',
            'type'    => 'textarea',
            'label'   => __('Copyright Notice', 'eames'),
            'default' => '&copy; 2014',
            'note'    => __('<p>Enter your copyright notice in the footer (optional).</p>', 'eames')
        )
    ),
    'integration' => array(
        array(
            'uid'     => 'analytics',
            'type'    => 'textarea',
            'label'   => __('Analytics', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter custom analytics code (e.g. Google Analytics, Clicky, etc.)</p>', 'eames')
        ),
        array(
            'uid'     => 'typekit_embed_code',
            'type'    => 'textarea',
            'label'   => __('TypeKit Embed Code', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter TypeKit embed code (if applicable). You will also need to add custom CSS via the General tab to specify chosen TypeKit fonts.</p>', 'eames')
        ),
        array(
            'uid'     => 'instagram',
            'type'    => 'textbox',
            'label'   => __('Instagram', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Instagram URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'twitter',
            'type'    => 'textbox',
            'label'   => __('Twitter', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Twitter URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'facebook',
            'type'    => 'textbox',
            'label'   => __('Facebook', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Facebook URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'google_plus',
            'type'    => 'textbox',
            'label'   => __('Google Plus', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Google Plus URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'linkedin',
            'type'    => 'textbox',
            'label'   => __('Linked In', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Linked In URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'tumblr',
            'type'    => 'textbox',
            'label'   => __('Tumblr', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Tumblr URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'pinterest',
            'type'    => 'textbox',
            'label'   => __('Pinterest', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Pinterest URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'vimeo',
            'type'    => 'textbox',
            'label'   => __('Vimeo', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Vimeo URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'youtube',
            'type'    => 'textbox',
            'label'   => __('YouTube', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter YouTube URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'flickr',
            'type'    => 'textbox',
            'label'   => __('Flickr', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Flickr URL.</p>', 'eames')
        ),
        array(
            'uid'     => 'feed',
            'type'    => 'textbox',
            'label'   => __('RSS Feed', 'eames'),
            'default' => '',
            'note'    => __('<p>Enter Feed URL.</p>', 'eames')
        )
    )
);

$my_theme_options = new Theme_Options_Builder($theme_options_groups, $theme_options_fields);

/**
* Get My Theme Options
*
* Wrapper function for our class
*
* @return array Array of theme options data.
*/
function get_my_theme_options(){
    global $my_theme_options;
    return $my_theme_options->get_theme_options();
}

function eames_theme_option($key = null) {
    global $my_theme_options;

    if (!empty($key)) {
        $options = $my_theme_options->get_theme_options();
        $value = $options[$key];
    } else {
        $value = $my_theme_options->get_theme_options();
    }

    return $value;
}
