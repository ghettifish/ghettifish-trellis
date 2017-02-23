<?php
/**
 * Admin bar links. Adds quick links to admin pages.
 */
function theme_add_admin_bar_links() {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-posts',
        'title'  => __('Posts', 'eames'),
        'href'  => get_admin_url( get_current_blog_id(), 'edit.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-posts',
        'id'     => 'admin-posts-add',
        'title'  => __('Add Post', 'eames'),
        'href'  => get_admin_url( get_current_blog_id(), 'post-new.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-media',
        'title'  => __('Media', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'upload.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-pages',
        'title'  => __('Pages', 'eames'),
        'href'  => get_admin_url( get_current_blog_id(), 'edit.php?post_type=page' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-pages',
        'id'     => 'admin-pages-add',
        'title'  => __('Add Page', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'post-new.php?post_type=page' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-appearance',
        'title'  => __('Appearance', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'themes.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-appearance',
        'id'     => 'admin-widgets',
        'title'  => __('Widgets', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'widgets.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-appearance',
        'id'     => 'admin-menus',
        'title'  => __('Menus', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'nav-menus.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-appearance',
        'id'     => 'admin-theme-options',
        'title'  => __('Theme Options', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'themes.php?page=theme_options' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-plugins',
        'title'  => __('Plugins', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'plugins.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-tools',
        'title'  => __('Tools', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'tools.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-tools',
        'id'     => 'admin-import',
        'title'  => __('Import', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'import.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-tools',
        'id'     => 'admin-export',
        'title'  => __('Export', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'export.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'site-name',
        'id'     => 'admin-settings',
        'title'  => __('Settings', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'options-general.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-settings',
        'id'     => 'admin-reading',
        'title'  => __('Reading', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'options-reading.php' )
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'admin-settings',
        'id'     => 'admin-permalink',
        'title'  => __('Permalinks', 'eames'),
        'href'   => get_admin_url( get_current_blog_id(), 'options-permalink.php' )
    ));
}
add_action('admin_bar_menu', 'theme_add_admin_bar_links',99);

function theme_remove_admin_bar_links() {
    global $wp_admin_bar;
    if (!is_super_admin() || !is_admin_bar_showing()) {
        return false;
    }

    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('dashboard');
    $wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_menu('menus');
    $wp_admin_bar->remove_menu('background');
    $wp_admin_bar->remove_menu('header');
    $wp_admin_bar->remove_menu('themes');
}

add_action('wp_before_admin_bar_render', 'theme_remove_admin_bar_links');
