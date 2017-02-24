<?php
global $edd_options; // EDD plugin settings
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

        <title><?php wp_title('&laquo;', true, 'right'); ?> </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--[if lte IE 9]><link rel="stylesheet" href="<?php get_stylesheet_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


        <?php wp_head(); ?>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>
    <body <?php body_class('smart-shop-red'); ?> >
        <div id="wrapper">
            <div class="container" id="header">

                <div class="row" id="logo-wrap">

                    <div class="col grid_8_of_12">	
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
                                <?php echo get_bloginfo('name'); ?>	
                            </a>
                        </h1>
                        <p class="site-description"> 
                            <?php echo get_bloginfo('description'); ?>
                        </p>

                        <?php if (get_header_image()) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                        <?php endif; ?>
                    </div>
                    <div class="col grid_4_of_12 header-extras last">
                        <?php if (class_exists('Easy_Digital_Downloads')) { ?>
                            <span id="header-cart">
                                <a href="<?php echo get_permalink($edd_options['purchase_page']); ?>">
                                    <i class="fa fa-shopping-cart"></i> <?php _e('Cart','smarthsop'); ?> (<span class="header-cart edd-cart-quantity"><?php echo edd_get_cart_quantity(); ?></span>)
                                </a>
                            </span>
                        <?php } ?>
                        
                        <?php if (class_exists('woocommerce')) {
                            global $woocommerce; ?>
                            <ul class="woo-cart-total">
                              <li>
                              <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'smartshop'); ?>">
                                   <?php _e('Your Cart', 'smartshop');?> (<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'smartshop'), $woocommerce->cart->cart_contents_count);?>)
                              </a>
                            </li>
                          </ul>
                         <?php } ?>
                        <?php dynamic_sidebar('header_widget'); ?>
                    </div>

                </div><!--end .row-->

            </div><!-- end .container#header-->
            <div class="container" id="navigation-wrap">
                <div class="row nav-collapse" id="main-nav">
                    <ul id="site-navigation" class="main-navigation">
                     
                        <?php wp_nav_menu(array('theme_location' => 'main_nav', 'menu_class' => 'nav-menu')); ?>
                        <div id="mobile-menu"></div>
                    </ul>
                </div> <!-- end .nav-collaps#main-nav -->
            </div><!--end .container#navigation-wrap-->