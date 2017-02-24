<?php
/**
 * BizArk functions and definitions
 *
 * @package BizArk
 */
 
/* 
 * Loads the Options Panel
 */
if ( !function_exists( 'optionsframework_init' ) ) {

	/* Set the file path based on whether we're in a child theme or parent theme */


		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');


	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'BizArk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function BizArk_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on BizArk, use a find and replace
	 * to change 'BizArk' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'BizArk', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'BizArkthumb', 450, 300, true );
  	add_image_size( 'BizArksingle', 1200, 500, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'BizArk' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	 
	  if ( of_get_option('skin_style') && of_get_option('skin_style') !== 'child' ) {
		$custombgargsskin = of_get_option('skin_style');
	  }else {
		$custombgargsskin = 'verve';
	  }
	  
	  if ( get_stylesheet_directory() == get_template_directory() ) {
		  $custombgargs = array(
			'default-color' => 'ebeef1',
			'default-image' => get_template_directory_uri() . '/skins/images/'.$custombgargsskin.'/page_bg.png',
			);
			
	  }else {
		  $custombgargs = array(
			'default-image' => get_stylesheet_directory_uri() . '/images/page_bg.png',
			);	  
	  }
	  add_theme_support( 'custom-background', $custombgargs );	 
	 
}
endif; // BizArk_setup
add_action( 'after_setup_theme', 'BizArk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function BizArk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'BizArk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left Sidebar', 'BizArk' ),
		'id'            => 'footer-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	if( !of_get_option('footer_layout') || of_get_option('footer_layout') == 'one' ) {
	register_sidebar( array(
		'name'          => __( 'Footer Center Sidebar', 'BizArk' ),
		'id'            => 'footer-center',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	}
	register_sidebar( array(
		'name'          => __( 'Footer Right Sidebar', 'BizArk' ),
		'id'            => 'footer-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );		
}
add_action( 'widgets_init', 'BizArk_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function BizArk_scripts() {

	if ( get_stylesheet_directory() != get_template_directory() ) {
		wp_enqueue_style( 'BizArk-parent-style', get_template_directory_uri().'/style.css' );
	}
		
	wp_enqueue_style( 'BizArk-style', get_stylesheet_uri() );
	
	if( of_get_option('skin_style') == 'green' ) {
		wp_enqueue_style( 'BizArk-radi-style', get_template_directory_uri().'/skins/green.css' );
	}
	
	if( of_get_option('skin_style') == 'blue' ) {
		wp_enqueue_style( 'BizArk-blue-style', get_template_directory_uri().'/skins/blue.css' );
	}
	
	if( of_get_option('skin_style') == 'red' ) {
		wp_enqueue_style( 'BizArk-blue-style', get_template_directory_uri().'/skins/red.css' );
	}	
	
	if( of_get_option('skin_style') == 'yellow' ) {
		wp_enqueue_style( 'BizArk-blue-style', get_template_directory_uri().'/skins/yellow.css' );
	}	
	
	if( of_get_option('skin_style') == 'purple' ) {
		wp_enqueue_style( 'BizArk-purple-style', get_template_directory_uri().'/skins/purple.css' );
	}
	
	if( of_get_option('skin_style') == 'grunge' ) {
		wp_enqueue_style( 'BizArk-grunge-style', get_template_directory_uri().'/skins/grunge.css' );
	}			
	
	wp_enqueue_script( 'BizArk-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), false, false );
	
	wp_enqueue_script( 'BizArk-general', get_template_directory_uri() . '/js/general.js', array(), false, true );

	wp_enqueue_script( 'BizArk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'BizArk-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'BizArk_scripts' );

function BizArk_ltie9() {
	echo "<!--[if lt IE 9]>
<link rel='stylesheet' href='".get_template_directory_uri()."/fixed.css' type='text/css' media='all' />
<![endif]-->";
	echo "<!--[if lt IE 8]>
<link rel='stylesheet' href='".get_template_directory_uri()."/ie.css' type='text/css' media='all' />
<![endif]-->";
}
add_action( 'wp_head', 'BizArk_ltie9', 9 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Backup menu incase menu isn't set.
 */
function BizArk_backupmenu() {
	 	if ( current_user_can('edit_theme_options') ) {
				echo '<ul id="main-nav" class="menu">
							<li class="menu-item current-menu-item current_page_item menu-item-home">
								<a href="'.get_admin_url().'nav-menus.php">'.__("Select a Menu to appear here in Dashboard->Appearance->Menus ", "BizArk").'</a>
							</li>
		
						</ul>	';
		} else {
				echo '<ul id="main-nav" class="menu">
							<li class="menu-item current-menu-item current_page_item menu-item-home">
								<a href="'.esc_url( get_home_url() ).'">'.__("Home", "BizArk").'</a>
							</li>
		
						</ul>	';			
		}
}
