<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*hide divi Parent*/
function kill_theme_wpse_188906($themes) {
  unset($themes['Divi']);
  return $themes;
}
add_filter('wp_prepare_themes_for_js','kill_theme_wpse_188906');
