<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE) ]><html <?php language_attributes(); ?>> <![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <img src="<?php echo THEME_URI . '/images/loading.gif' ;?>" alt="" class="hidden" />
    <div id="wrapper">
        <div id="canvass">
            <div id="top">
                <header id="header">
                    <div id="mobile-nav" class="clearfix">
                        <div class="fr"><a id="linken" class="open" href="#"><?php _e('Menu', 'eames'); ?></a></div>
                        <div class="clear"></div>
                        <nav id="main-mobile">
                            <?php wp_nav_menu(array('container'=>false, 'menu_class' => 'nav-mobile', 'theme_location'=>'header', 'fallback_cb'=>false, 'walker' => '' )); ?>
                        </nav>
                    </div>
                    <div id="logo"><h1><?php echo eames_theme_logo(); ?></h1></div>
                    <div id="pagenav">
                        <nav id="main">
                            <?php wp_nav_menu(array('container'=>false, 'menu_class' => 'nav-mobile', 'theme_location'=>'header', 'fallback_cb'=>false, 'walker' => '' )); ?>
                        </nav>
                    </div>

                    <div id="slide-controls">
                        <a href="#" class="show-thumbnails"><?php _e('Thumbnails', 'eames'); ?></a>
                        <a href="#" class="prev"><?php _e('Prev', 'eames'); ?></a> <span class="slidecontline">/</span> <a href="#" class="next"><?php _e('Next', 'eames'); ?></a>
                        <p style="margin:10px 0 0 0"><span class="slide-current-count">1</span><span class="slide-punctuation">  /  </span><span class="slide-count">/ 0</span></p>
                    </div>
                    <?php get_sidebar(); ?>
                </header>
            </div>
            <!--//end top-->
