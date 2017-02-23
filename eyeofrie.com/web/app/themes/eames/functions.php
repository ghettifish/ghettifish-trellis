<?php
define('TEMPLATE_NAME', 'Eames');

define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());

require_once(THEME_PATH . '/inc/widgets.php'); // Custom widgets
require_once(THEME_PATH . '/inc/theme-options.php'); // Custom theme options
require_once(THEME_PATH . '/inc/admin-bar-links.php'); // Custom admin bar
require_once(THEME_PATH . '/inc/shortcodes.php');
require_once(THEME_PATH . '/inc/mobile-detector.php');
require_once(THEME_PATH . '/inc/debug.php');

// Add styles to the WYSIWYG editor
add_editor_style('css/txtstyle.css');

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 800;

/**
 * Sets up theme defaults and registers the various WordPress features supported
 */
function eames_setup() {

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This are the menus
    register_nav_menus(
        array(
            'header' => __( 'Header Location', 'eames' )
        )
    );

    /*
     * This theme supports custom background color and image, and here
     * we also set up the default background color.
     */
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 670, 9999 ); // Unlimited height, soft crop
    add_image_size('banner', 650, 240 ); // Another size
    add_image_size('portfolio-thumb', 270, 0, true);
    add_image_size('portfolio-thumbnails', 450, 9999); //another size for portfolio thumbnails.

    load_theme_textdomain('eames', get_template_directory() . "/languages");
}
add_action( 'after_setup_theme', 'eames_setup' );

function gallery_desc_shortcode($atts, $content = null) {
    ob_start();
    include(THEME_PATH . '/inc/gallery-desc.php');
    $galleryDescription = ob_get_contents();
    ob_end_clean();
    return $galleryDescription;
}
add_shortcode('gallery_desc', 'gallery_desc_shortcode');

function homepageGallery($images) {
    global $post;

    ob_start();
    include(THEME_PATH . '/inc/gallery.php');
    $galleryContent = ob_get_contents();
    ob_end_clean();

    $galleryContent = preg_replace('~>\s+<~', '><', $galleryContent);
    $content = preg_replace('/\[gallery ids=[^\]]+\]/', $galleryContent, $post->post_content);
    remove_filter('the_content', 'wptexturize');

    $content = apply_filters('the_content', $content);

    return $content;
}

/**
 * Add needed stylesheet and scripts
 */
function eames_enqueue_scripts() {

    // Styles
    wp_enqueue_style('layout', THEME_URI . '/css/layout.css', array(), false, 'all');
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array(), false, 'all');
    wp_enqueue_style('font', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), false, 'all');
    wp_enqueue_style('custom-media', THEME_URI . '/css/custom-media-queries.css', array(), false, 'all');

    // Scripts
    //wp_deregister_script('jquery');
    //wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-1.10.2.min.js', array(), '', false );
    wp_enqueue_script('easing', THEME_URI . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    wp_enqueue_script('cycle2', THEME_URI . '/js/jquery.cycle2.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lazyload', THEME_URI . '/js/jquery.lazyload.min.js', array('jquery'), '1.9.3', true);
    wp_enqueue_script('remove-whitespace', THEME_URI . '/js/jquery.removeWhitespace.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('collage-plus', THEME_URI . '/js/jquery.collagePlus.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('hotkeys', THEME_URI . '/js/jquery.hotkeys.js', array('jquery'), '1.0', true);
    wp_enqueue_script('retina', THEME_URI . '/js/retina.js', array('jquery'), '1.0', true);
    wp_enqueue_script('menu', THEME_URI . '/js/menu.js', array('jquery'), '1.0', true);
    wp_enqueue_script('site', THEME_URI . '/js/site.js', array('jquery'), '1.0', true);

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

}
add_action('wp_enqueue_scripts', 'eames_enqueue_scripts');

/**
 * Add extra stuff in wp head
 */
function eames_wp_head() {
    extract(get_my_theme_options());

    if (!empty($favicon)) {
        ?><link rel="icon" type="image/png" href="<?php echo $favicon; ?>" /><?php
    }

    if (!empty($analytics)) {
        echo $analytics;
    }

    if (!empty($typekit_embed_code)){
        echo $typekit_embed_code;
    }

    include('inc/theme-options-builder/views/appearance.php');
    include('inc/theme-options-builder/views/typography.php');

    if (!empty($custom_css)) {
        echo '<style type="text/css" media="all">';
        echo $custom_css;
        echo '</style>';
    }
}
add_action('wp_head', 'eames_wp_head');

/**
 * Add extra stuff in wp footer
 */
function eames_wp_footer() {

}
add_action('wp_footer', 'eames_wp_footer');

function eames_theme_logo() {
    $logo = eames_theme_option('logo');
    $logo_hd = eames_theme_option('logo_hd');

    MobileDTS::init();

    if (!empty($logo)) {
        $uploadDir = wp_upload_dir();
        $logoPath = str_replace(site_url() . '/wp-content/uploads', $uploadDir['basedir'], $logo);
        $size = getimagesize($logoPath);
    }

    $is_iphone = MobileDTS::is('iphone');
    $is_ipad = MobileDTS::is('ipad');

    if ($logo_hd && ($is_iphone || $is_ipad)) {
        return '<a href="' . get_home_url() . '"><img src="' . esc_url($logo_hd) . '" alt="" ' . $size[3] . '></a>';
    }

    if ($logo) {
        return '<a href="' . get_home_url() . '"><img src="' . esc_url($logo) . '" ' . $size[3] . ' alt=""></a>';
    } else {
        return '<a class="logo" href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>';
    }
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function eames_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __('Page %s', 'eames'), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'eames_wp_title', 10, 2 );

/**
 * Widget Areas
 */
function eames_widget_areas() {
    register_sidebar(array(
        'name'          => __('Post Sidebar Widgets', 'eames'),
        'id'            => 'sidebar-widgets',
        'description'   => __('', 'eames'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __( 'Page Sidebar Widgets', 'eames' ),
        'id'            => 'page-sidebar-widgets',
        'description'   => __('', 'eames' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'eames_widget_areas' );


/**
 * Custom Shortcodes
 */
function theme_folder_func($atts) {
    return get_stylesheet_directory_uri();
}
add_shortcode('theme_folder', 'theme_folder_func');

/**
 * Execute shortcodes in widget text content
 */
add_filter('widget_text','do_shortcode');


/*** Add page slug as body class. also include the page parent ***/
function eames_body_classes($classes, $class='') {
    global $wp_query;
    if(isset($wp_query->post)){
        $post_id = $wp_query->post->ID;
        if(is_page($post_id )){
            $page = get_page($post_id);
            //check for parent
            if($page->post_parent>0){
                $parent = get_page($page->post_parent);
                $classes[] = 'page-'.sanitize_title($parent->post_title);
            }
            $classes[] = 'page-'.sanitize_title($page->post_title);
        }
        $theme_options = get_my_theme_options();
        if ((!empty($theme_options['enable_swipe_gallery'])) && $theme_options['enable_swipe_gallery']==1) {
            $classes[] = 'swipe-gallery-enabled';
        }
    }
    return $classes;// return the $classes array
}
add_filter('body_class','eames_body_classes');



/*** Utility functions ***/
//Get page permalink by its title. Useful than getting the permalink via ID.
//param $title string - the title of the page eg. "Blog"
//returns the url of the page depending on permalink settings
function get_page_permalink_by_title($title){
    $page = get_page_by_title($title);
    return get_permalink($page->ID);
}

function eames_limit_text($text, $limit, $after='...') {
    $content = strip_tags($text);
    $content = preg_replace( '/\s\s+/', ' ', trim( $content ) );//remove double/duplicate spaces. works with french chars
    $content = explode(' ', $content, $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).$after;
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function generate_google_fonts_link($fonts, $type = 'css') {
    $fonts = array_unique($fonts);
    $pattern = array(
        'link' => "<link href='http://fonts.googleapis.com/css?family={fontName}' rel='stylesheet' type='text/css'>",
        'css'  => "@import url(http://fonts.googleapis.com/css?family={fontName});"
    );

    $links = "";

    foreach ($fonts as $font) {
        if (strtolower($font) != 'arial') {
            $font = str_replace(' ', '+', $font);
            $links .= "\r\n" . str_replace('{fontName}', $font, $pattern[$type]);
        }
    }

    return $links;
}

function eames_gallery_desc() {
    global $post;
    $gallery_desc = "";
    $gallery_desc_shortcode = false;

    if (preg_match('/\[(\[?)(gallery_desc)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/i', $post->post_content, $result)) {
        $gallery_desc_shortcode = $result[0];
    }

    if ($gallery_desc_shortcode) {
        $gallery_desc = do_shortcode($gallery_desc_shortcode);
    }

    return $gallery_desc;
}

function eames_more_link($link, $text) {
    return str_replace('more-link', 'more-link read-more', $link);
}
add_action('the_content_more_link', 'eames_more_link', 10, 2);

function grab_ids_from_gallery() {
    $post = is_singular() ? get_queried_object() : false;
    $attachment_ids = array();
    $pattern = get_shortcode_regex();
    $ids = array();
    if ( ! empty($post) && is_a($post, 'WP_Post') ) {
      if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches)) {
          $count = count($matches[3]);
          for ($i = 0; $i < $count; $i++) {
              $atts = shortcode_parse_atts($matches[3][$i]);
              if (isset($atts[ids])) {
                  $attachment_ids = explode(',', $atts[ids]);
                  $ids = array_merge($ids, $attachment_ids);
              }
          }
       }
    }
    return $ids;
}
add_action('wp', 'grab_ids_from_gallery');

function eames_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="li-comment-<?php comment_ID() ?>">

        <div class="comment <?php echo get_comment_type(); ?>" id="comment-<?php comment_ID() ?>">

            <?php echo get_avatar($comment,'60', get_stylesheet_directory_uri().'/images/default_avatar.png'); ?>
            <h5><?php comment_author_link(); ?></h5>
            <span class="date"><?php comment_date(); ?></span>
            <?php if ($comment->comment_approved == '0') : ?>
                <p><span class="message"><?php _e('Your comment is awaiting moderation.', 'eames'); ?></span></p>
            <?php endif; ?>
            <?php comment_text() ?>
            <?php
            if(get_comment_type() != "trackback")
                comment_reply_link(array_merge( $args, array('add_below' => 'comment','reply_text' => '<span>'. __('Reply', 'eames') .'</span>', 'login_text' => '<span>'. __('Log in to reply', 'eames') .'</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'])))
            ?>
        </div><!-- end comment -->
<?php
}
/*** WooCommerce functions ***/

// Unhook WooCommerce Wrappers

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Remove Related Products Feature

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove Bread Crumbs

add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Hook Functions to Display Theme Wrappers

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div id="content-area" role="main" class="clearfix"><div class="content">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

// Delcare WooCommerce Theme Support

add_theme_support( 'woocommerce' );

add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
?>
