<div class="bizeight">

	<div class="bizeight-welcome">
    
                	<h2>
                        <?php 
                            if( of_get_option('bizeight_left_section_title') ){
                                echo esc_attr( of_get_option('bizeight_left_section_title') );
                            }else {
                                _e('Products',  'BizArk');
                            }
                        ?>                    
                    </h2>
                    
                    <p class="bizeight-products-description">
                    	<?php 
							if( of_get_option('bizeight_left_section_desc') ){
								echo esc_html(of_get_option('bizeight_left_section_desc'));
							}else{
								_e('You can change this text in Biz Eight settings tab of theme options page under Products section.',  'BizArk');
							}
							
						?>
                    </p>
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizeight-products-services-item">
                    
                            <div class="bizeight-products-services-img">
                                <?php 
								 	if( of_get_option('bizeight_left_section_image1') ){
										echo '<img class="" src="'.esc_url(of_get_option('bizeight_left_section_image1')).'" />';	
									}else{
										echo '<img class="" src="'.get_template_directory_uri().'/images/desktop.png" />';
									}
								 	 
								?>                
                            </div><!-- .bizeight-products-services-img -->
                            
                            <div class="bizeight-products-services-name-cont">
                            
                                <div class="bizeight-products-services-name">
                                      <a href="
										<?php 
                                            if( of_get_option('bizeight_left_section_link1') ){
                                                echo esc_url(of_get_option('bizeight_left_section_link1'));	
                                            }else{
                                                echo '#';
                                            }
                                        ?>                                      
                                      ">
										<?php 
                                            if( of_get_option('bizeight_left_section_title1') ){
                                                echo esc_html(of_get_option('bizeight_left_section_title1'));	
                                            }else{
                                                _e('Design',  'BizArk');
                                            }
                                        ?>
                                      </a>
                                </div><!-- .bizeight-products-services-name -->
                                
                                <div class="bizeight-products-services-description">
                                     <p>
										<?php 
                                            if( of_get_option('bizeight_left_section_desc1') ){
                                                echo esc_html(of_get_option('bizeight_left_section_desc1'));	
                                            }else{
                                                _e('You can change this text in left section bloack in Biz Eight settings tab.',  'BizArk');
                                            }
                                        ?>                                     
                                     </p>       
                                </div><!-- .bizeight-products-services-description -->
                            
                            </div><!-- .bizeight-products-services-name-cont -->
                    
                    </div><!-- .bizeight-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizeight-products-services-item">
                    
                            <div class="bizeight-products-services-img">
                                <?php 
								 	if( of_get_option('bizeight_left_section_image2') ){
										echo '<img class="" src="'.esc_url(of_get_option('bizeight_left_section_image2')).'" />';	
									}else{
										echo '<img class="" src="'.get_template_directory_uri().'/images/code.png" />';
									}
								 	 
								?>                
                            </div><!-- .bizeight-products-services-img -->
                            
                            <div class="bizeight-products-services-name-cont">
                            
                                <div class="bizeight-products-services-name">
                                      <a href="
										<?php 
                                            if( of_get_option('bizeight_left_section_link2') ){
                                                echo esc_url(of_get_option('bizeight_left_section_link2'));	
                                            }else{
                                                echo '#';
                                            }
                                        ?>                                      
                                      ">
										<?php 
                                            if( of_get_option('bizeight_left_section_title2') ){
                                                echo esc_html(of_get_option('bizeight_left_section_title2'));	
                                            }else{
                                                _e('Development',  'BizArk');
                                            }
                                        ?>
                                      </a>
                                </div><!-- .bizeight-products-services-name -->
                                
                                <div class="bizeight-products-services-description">
                                     <p>
										<?php 
                                            if( of_get_option('bizeight_left_section_desc2') ){
                                                echo esc_html(of_get_option('bizeight_left_section_desc2'));	
                                            }else{
                                                _e('You can change this text in left section bloack in Biz Eight settings tab.',  'BizArk');
                                            }
                                        ?>                                     
                                     </p>       
                                </div><!-- .bizeight-products-services-description -->
                            
                            </div><!-- .bizeight-products-services-name-cont -->
                    
                    </div><!-- .bizeight-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizeight-products-services-item">
                    
                            <div class="bizeight-products-services-img">
                                <?php 
								 	if( of_get_option('bizeight_left_section_image3') ){
										echo '<img class="" src="'.esc_url(of_get_option('bizeight_left_section_image3')).'" />';	
									}else{
										echo '<img class="" src="'.get_template_directory_uri().'/images/phone.png" />';
									}
								 	 
								?>                
                            </div><!-- .bizeight-products-services-img -->
                            
                            <div class="bizeight-products-services-name-cont">
                            
                                <div class="bizeight-products-services-name">
                                      <a href="
										<?php 
                                            if( of_get_option('bizeight_left_section_link3') ){
                                                echo esc_url(of_get_option('bizeight_left_section_link3'));	
                                            }else{
                                                echo '#';
                                            }
                                        ?>                                      
                                      ">
										<?php 
                                            if( of_get_option('bizeight_left_section_title3') ){
                                                echo esc_html(of_get_option('bizeight_left_section_title3'));	
                                            }else{
                                                _e('Design',  'BizArk');
                                            }
                                        ?>
                                      </a>
                                </div><!-- .bizeight-products-services-name -->
                                
                                <div class="bizeight-products-services-description">
                                     <p>
										<?php 
                                            if( of_get_option('bizeight_left_section_desc3') ){
                                                echo esc_html(of_get_option('bizeight_left_section_desc3'));	
                                            }else{
                                                _e('You can change this text in left section bloack in Biz Eight settings tab.',  'BizArk');
                                            }
                                        ?>                                     
                                     </p>       
                                </div><!-- .bizeight-products-services-description -->
                            
                            </div><!-- .bizeight-products-services-name-cont -->
                    
                    </div><!-- .bizeight-products-services-item -->
                    <!-- Product-service item ends Here -->                                       
                    
    </div><!-- .bizeight-welcome -->  
    
	<div class="bizeight-clients">
    
        	<h2>
                        <?php 
                            if( of_get_option('bizeight_middle_section_title') ){
                                echo esc_attr( of_get_option('bizeight_middle_section_title') );
                            }else {
                                _e('Portfolio',  'BizArk');
                            }
                        ?>             
            </h2>
            
            <div class="bizeight-clients-cont">
            
                <ul id="bizeight-da-thumbs" class="bizeight-da-thumbs">
                        
                     <?php
                         if( of_get_option('bizeight_portfolio_image1') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image1') ).'" /></li>';
                         }
                     ?>
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image2') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image2') ).'" /></li>';
                         }
                     ?>   
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image3') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image3') ).'" /></li>';
                         }
                     ?>  
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image4') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image4') ).'" /></li>';
                         }
                     ?> 
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image5') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image5') ).'" /></li>';
                         }
                     ?>
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image6') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image6') ).'" /></li>';
                         }
                     ?>   
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image7') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image7') ).'" /></li>';
                         }
                     ?>  
                     
                     <?php
                         if( of_get_option('bizeight_portfolio_image8') ) {
                             echo '<li><img src="'.esc_url( of_get_option('bizeight_portfolio_image8') ).'" /></li>';
                         }
                     ?>                                                                                                     
                        
                </ul>
                
    	</div><!-- .bizeight-clients-cont -->                                   
    
    </div><!-- .bizeight-clients -->  
    
	<div class="bizeight-blog">
    
        	<h2>
                        <?php 
                            if( of_get_option('bizeight_right_section_title') ){
                                echo esc_attr( of_get_option('bizeight_right_section_title') );
                            }else {
                                _e('News',  'BizArk');
                            }
                        ?>             
            </h2>
            
					<?php 

						if( of_get_option('bizeight_news_section_cat') ){
							$BizArkbizeight_news_cat = of_get_option('bizeight_news_section_cat');
						}else{
							$BizArkbizeight_news_cat = '1';
						}						
                        $BizArkbizeight_news_args = array(
                                        // Change these category SLUGS to suit your use.
                                        'category__in' => $BizArkbizeight_news_cat,
										'ignore_sticky_posts' => 1,
                                        'posts_per_page'=> 3,
                                      );
        
                        $BizArkbizeight_news_list_of_posts = new WP_Query( $BizArkbizeight_news_args );
                                        
                    ?>
                    
                    <?php if ( $BizArkbizeight_news_list_of_posts->have_posts() ) : ?>
                        <?php /* The loop */ ?>
        
                        <?php while ( $BizArkbizeight_news_list_of_posts->have_posts() ) : $BizArkbizeight_news_list_of_posts->the_post(); ?>
                        
                        <!-- News item starts Here -->
                    	<div class="bizeight-news-item"> 
                        
                        		<div class="bizeight-news-name">
                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div><!-- .bizeight-news-name -->
                        
                                <div class="bizeight-news-description">
                                     <?php echo BizArk_get_limited_string(get_the_excerpt(), 150, '...') ?>        
                                </div><!-- .bizeight-news-description --> 
                                
                                <div class="bizeight-news-cta">
                                      <a href="<?php the_permalink(); ?>"> 
										<?php _e('Read More',  'BizArk'); ?>                                      
                                      </a>       
                                </div><!-- .bizeight-news-cta -->
                        
                        </div><!-- .bizeight-news-item -->
                        <!-- News item ends Here -->                                               
						
						
					<?php endwhile; ?>
                    
                <?php endif; wp_reset_postdata(); ?>     
    
    </div><!-- .bizeight-blog -->        
		
</div><!-- .bizeight -->

<?php if( !of_get_option('show_posts_bizeight') || of_get_option('show_posts_bizeight') == 'true' ) : ?>
<div class="bizeight">
	
		<?php 
			
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}			 
			
		?>
		
</div><!-- .bizeight -->
<?php endif; ?> 