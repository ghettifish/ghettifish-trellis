/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * 
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
         wp.customize( 'slider_title_one', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption h2' ).text( to );
		} );
	} );
         wp.customize( 'slider_one_description', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption p' ).text( to );
		} );
	} );
        wp.customize( 'slider_one_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_one_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption .slider-button' ).text( to );
		} );
	} );
         wp.customize( 'slider_two', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'slider_title_two', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption h2' ).text( to );
		} );
	} );
         wp.customize( 'slider_two_description', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption p' ).text( to );
		} );
	} );
        wp.customize( 'slider_two_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_two_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption .slider-button' ).text( to );
		} );
	} );
        wp.customize( 'home_featured_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-one .featured-image' ).text( to );
		} );
	} );
        wp.customize( 'home_title_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-one h3' ).text( to );
		} );
	} );
        
        wp.customize( 'home_text_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-one .featured-text' ).text( to );
		} );
	} );
        
         wp.customize( 'home_featured_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-two .featured-image' ).text( to );
		} );
	} );
        
         wp.customize( 'home_title_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-two h3' ).text( to );
		} );
	} );
        
        wp.customize( 'home_text_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-two .featured-text' ).text( to );
		} );
	} );
        
        wp.customize( 'home_featured_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-three .featured-image' ).text( to );
		} );
	} );
        
         wp.customize( 'home_title_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-three h3' ).text( to );
		} );
	} );
        
        wp.customize( 'home_text_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-widget-three .featured-text' ).text( to );
		} );
	} );
        
        wp.customize( 'cta_title', function( value ) {
		value.bind( function( to ) {
			$( '#home-cta h3' ).text( to );
		} );
	} );
        
         wp.customize( 'cta_text', function( value ) {
		value.bind( function( to ) {
			$( '#home-cta p' ).text( to );
		} );
	} );
        
         wp.customize( 'home_cta_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#home-cta .smartshop-cta' ).attr('href', to );
		} );
            } );
                
         wp.customize( 'home_cta_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#home-cta .smartshop-cta' ).text( to );
		} );
	} );
              
        wp.customize( 'smartshop_edd_store_archives_title', function( value ) {
		value.bind( function( to ) {
			$( '.store-info h2' ).text( to );
		} );
	} );
        
        wp.customize( 'smartshop_edd_store_archives_title', function( value ) {
		value.bind( function( to ) {
			$( '.edd-store-info h2' ).text( to );
		} );
	} );
        
        wp.customize( 'smartshop_edd_store_archives_description', function( value ) {
		value.bind( function( to ) {
			$( '.store-description p' ).text( to );
		} );
	} );
        
        wp.customize( 'smartshop_woo_front_featured_title', function( value ) {
		value.bind( function( to ) {
			$( '.store-info h2' ).text( to );
		} );
	} );
        
         wp.customize( 'smartshop_woo_store_archives_description', function( value ) {
		value.bind( function( to ) {
			$( '.store-description' ).text( to );
		} );
	} );
        
         wp.customize( 'smartshop_woo_view_details', function( value ) {
		value.bind( function( to ) {
			$( '#featured-products .product-buttons a' ).text( to );
		} );
	} );
        
         wp.customize( 'smartshop_front_featured_posts_title', function( value ) {
		value.bind( function( to ) {
			$( '.featured-section-title' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#site-name' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	//Update site Title color in real time...
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').css('color', to );
		} );
	} );
	
	
	
} )( jQuery );