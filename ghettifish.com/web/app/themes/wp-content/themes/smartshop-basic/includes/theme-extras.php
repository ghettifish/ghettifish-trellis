<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since SmartShop 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function smartshop_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name.
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'smartshop' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'smartshop_wp_title', 10, 2 );

/*
 * 
 * Set excerpt length for products on front page
 * and post excerpts on rest of the pages.
 * 
 */
function smartshop_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post') {
        return 50;
    }
    else if (($post->post_type == 'download') && (is_front_page())) {
        return 15;
    }
    else if (($post->post_type == 'product')) {
        return 15;
    }
    else {
        return 50;
    }
}
add_filter('excerpt_length', 'smartshop_excerpt_length');

// Customize read more link
function smartshop_excerpt_more($more) {
    if (is_front_page()) {
        return '...';
    } else {
        return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'smartshop') . '</a>';
    }
}

add_filter('excerpt_more', 'smartshop_excerpt_more');


/*
 * Check if the front page is set 
 * to display latest blog posts
 * or a static front page
 * 
 * If it's set to display blog posts
 * then ignore the front-page.php 
 * template and head over to index.php
 * 
 * @Credits Chip Bennett 
 * 
 * @since Flex 1.0
 */


function smartshop_filter_front_page_template( $template ) {
     return is_home() ? '' : $template ;
}
add_filter( 'frontpage_template', 'smartshop_filter_front_page_template' );


// Add Envira License key
add_action( 'after_setup_theme', 'smartshop_envira_define_license_key' );
function smartshop_envira_define_license_key() {
    
    // If the key has not already been defined, define it now.
    if ( ! defined( 'ENVIRA_LICENSE_KEY' ) ) {
        define( 'ENVIRA_LICENSE_KEY', 'f21b503f7793be583daab680a7f8bda7' );
    }
    
}


// Add Soliloquy License key
add_action( 'after_setup_theme', 'smartshop_soliloquy_define_license_key' );
function smartshop_soliloquy_define_license_key() {
    
    // If the key has not already been defined, define it now.
    if ( ! defined( 'SOLILOQUY_LICENSE_KEY' ) ) {
        define( 'SOLILOQUY_LICENSE_KEY', '7IDtSRkIxJxuzXYz76Znyec7St2rpszP+Vp9t4GYv6k=' );
    }
    
}

// Remove default WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'smartshop_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function smartshop_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '349',	// px
		'height'	=> '349',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '362',	// px
		'height'	=> '362',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '150',	// px
		'height'	=> '150',	// px
		'crop'		=> 0 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


function smartshop_admin_notice(){ 
     global $pagenow;
    if ( $pagenow == 'themes.php' || $pagenow == 'index.php') { ?>
            <div class="updated" style="background: #FDAF3E; ">
              <p style="font-size: 16px; color: #fff;">SmartShop comes with <a href="<?php echo admin_url('customize.php'); ?>" style="color:#fff; text-decoration: underline;">Live Theme Customizer</a> to configure theme options <br/> You can upgrade to <a href="http://ideaboxthemes.com/themes/smartshop-wordpress-theme/?ref=basic" style="color:#fff; text-decoration: underline;"><strong>Pro version</strong></a> for more features like unlimited color schemes, boxed and full width layout options, support and upgrades.</p>
         </div>
    <?php  }
}
add_action('admin_notices', 'smartshop_admin_notice');

function smartshop_slick_nav_js() { ?>
   <script type="text/javascript">
       /* Trigger mobile responsive navigation powered by slicknav.js */
        jQuery(document).ready(function($) {

            $('.nav-menu').slicknav({prependTo: '#mobile-menu'});
        });
    </script>
<?php }
add_action('wp_footer','smartshop_slick_nav_js');

function smartshop_flexslider_js() { 
    if(is_front_page()) { ?>
    <script type="text/javascript">
        /* Trigger home page slider */
        /* Slider powered by FlexSlider by WooThemes */
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider();

        });
    </script>
<?php }
}
add_action('wp_footer','smartshop_flexslider_js');
