<?php
/**
 *  This file displays 
 *  Home CTA
 *  Home #1, Home #2 and Home #3
 */

?>

    <div id="home-featured-area" class="slider-wrapper container" >

        <div class="row" id="featured-widgets">

            <div class="flexslider">

               <ul class="slides">
            <?php
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            if ( get_theme_mod('slider_one') =='' ) {  ?>
               <li id="slider1">
                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide1.jpg" alt="slider-image"/>
                    <div class="flex-caption">
                        <div class="caption-content">
                        <div class="caption-inner">
                        <h2 class="slider-title"><a href="#"><?php esc_html_e('Perfect for your business website', 'smartshop') ?></a></h2>
                        <p><?php esc_html_e('Superb is a theme designed for your business website.', 'smartshop') ?> </p>
                        <a class="slider-button" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'smartshop') ?>
                        </a>
                        </div>
                        </div>
                 </div>
             </li>
            
             
            <li id="slider2"> 
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide2.jpg" alt="slider-image"/>
                <div class="flex-caption">
                    <div class="caption-content">
                        <div class="caption-inner">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase your work and services', 'smartshop') ?></a></h2>
                     <p><?php esc_html_e('Use the home featured section to showcase your services.', 'smartshop') ?> </p>
                      
                    </div>
                    </div>
                 </div>
            </li>    
            <?php } ?>
            
             <?php 
             // if user adds a cusotm slide then display the slides 
          // load first slide
            if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1">
                    <img  src="<?php echo get_theme_mod('slider_one'); ?>" alt=""/>
                 <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                               
                          <?php if ( get_theme_mod('slider_one_link_url') !='' && get_theme_mod('slider_one_link_text') !=''  ) {  ?>
                           <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_one_link_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_one_link_text')); ?>
                            <?php } ?> 
                            </a>
                        </div>
                        </div>
                     </div>
                 <?php } ?>
                </li>
                
               
                  <?php
                   // load second slide 
                   if ( get_theme_mod('slider_two') !='' ) {  ?>
                <li id="slider2">
                    <img  src="<?php echo get_theme_mod('slider_two'); ?>" alt=""/>
                    <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></h2>
                            <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                                
                           <?php if ( get_theme_mod('slider_two_link_url') !='' && get_theme_mod('slider_two_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_two_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('slider_two_link_text')); ?>
                                <?php } ?>
                            </a>
                        </div>
                        </div>
                     </div>
                    <?php } ?>
                </li>
                   <?php } 
            } ?>
                
               
            
        </ul>

            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->



    <div id="home-widgets-area" class="container">
        <div class="row" id="home-widgets">

            
            <div class="col grid_4_of_12 home-widget-one">
                <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-icon"><i class="fa fa-<?php echo get_theme_mod('home_featured_one'); ?>"></i></div>
                    <?php } else {  ?>
                     <div class="featured-icon"><i class="fa fa-gears"></i></div>
                     <?php } ?>
                      <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('1-Click Installation', 'superb') ?></h3>
                           <?php } ?>


                     <div class="featured-text">
                           <?php if ( get_theme_mod('home_text_one') !='' ) {  ?><p><?php echo get_theme_mod('home_text_one'); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Install, activate the theme and you are ready with a brand new website. It gets loaded with sample content that you can easily modify.', 'smartshop') ?></p>
                           <?php } ?>
                    </div>
            </div>
       
            <div class="col grid_4_of_12 home-widget-two">
                <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-icon"><i class="fa fa-<?php echo get_theme_mod('home_featured_two'); ?>"></i></div>
                    <?php } else {  ?>
                     <div class="featured-icon"><i class="fa fa-comments"></i></div>
                     <?php } ?>
                     
                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Live Preview', 'superb') ?></h3>
                           <?php } ?>
                     <div class="featured-text">
                           <?php if ( get_theme_mod('home_text_two') !='' ) {  ?><p><?php echo get_theme_mod('home_text_two'); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Live preview your site as you add the content to various sections. Theme customizer allows you the flexibility and ease of use.', 'smartshop') ?></p>
                           <?php } ?>
                     </div>
            </div>
            
            
            <div class="col grid_4_of_12 home-widget-three">
                <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                <div class="featured-icon"><i class="fa fa-<?php echo get_theme_mod('home_featured_three'); ?>"></i></div>
                    <?php } else {  ?>
                     <div class="featured-icon"><i class="fa fa-laptop"></i></div>
                     <?php } ?>

                      <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Pro Version', 'smartshop') ?></h3>
                           <?php } ?>

                     <div class="featured-text">
                           <?php if ( get_theme_mod('home_text_three') !='' ) {  ?><p><?php echo get_theme_mod('home_text_three'); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Upgrade to Pro Version for color schemes, multiple layouts, extended slider, great e-mail support and lot more exciting features.', 'smartshop') ?></p>
                           <?php } ?>
                     </div>
            </div>

    </div>
</div>

 
    <div id="home-cta-area" class="container" >

        <div class="row" id="home-cta">

            <div class="col grid_12_of_12">
            
                    <?php if ( get_theme_mod('cta_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('cta_title')); ?></h3>
                          <?php } else {  ?> <h3><?php esc_html_e('Home CTA', 'smartshop') ?></h3>
                               <?php } ?>			
                        <?php if ( get_theme_mod('cta_text') !='' ) {  ?>
                        <p><?php echo esc_html(get_theme_mod('cta_text')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('This is Home CTA widget area to add some Call to Action text and button.', 'smartshop') ?> </p>
                            <?php } ?>
                          
                            <a class="smartshop-cta" href="<?php if ( get_theme_mod('home_cta_link_url') !='' ) { echo esc_url(get_theme_mod('home_cta_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_cta_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_cta_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Get Started', 'smartshop') ?>
                           <?php } ?></a>
                        
                   
              
            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->
   