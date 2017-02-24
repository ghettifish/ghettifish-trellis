<?php
/**
 * 
 * This template is used for setting up widgetized front page
 * along with featured posts and featured products. 
 * 
 * @package: SmartShop
 * @version: 1.0
 * @since  : 1.0
 */

get_header();

// display featured sections 
get_template_part('content', 'front-featured');

?>

<div id="main-content-container" class="container">    
    <div id="main-content" class="row">
        <div class="content clearfix">

            <?php
            // Display featured products on front page
            get_template_part('content', 'frontproducts');
			
			// Display featured products on front page
            get_template_part('content', 'wooproducts');

            // Display featured posts on front page
            get_template_part('content', 'frontposts');
            ?>

        </div><!--end .content-->

    </div><!--end #main-content.row-->
</div><!-- end #main-content-container -->

<?php get_footer(); ?>
