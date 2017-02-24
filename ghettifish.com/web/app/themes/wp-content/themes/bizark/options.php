<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'BizArk';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$magpro_slider_start = array("false" => __("No", 'BizArk' ),"true" => __("Yes", 'BizArk' ));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:', 'BizArk' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'BizArk' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'BizArk' ),
										"desc" => __("If you are not using child theme, selecting child theme will be same as using BizArk skin. If you are using child theme, then lite.css from the child theme will be used.", 'BizArk' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "verve",
										"options" => array(
											'verve' => $imagepath . 'verve.png',
											'green' => $imagepath . 'green.png',
											'red' => $imagepath . 'red.png',
											'yellow' => $imagepath . 'yellow.png',
											'blue' => $imagepath . 'blue.png',
											'purple' => $imagepath . 'purple.png',
											'grunge' => $imagepath . 'grunge.png',
											'child' => $imagepath . 'child.png')
										);						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Single Post Settings", 'BizArk' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Featured Image?", 'BizArk' ),
										"desc" => __("Select yes if you want to show featured image.", 'BizArk' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'BizArk' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'BizArk' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'BizArk' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'BizArk' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'BizArk' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'BizArk' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'BizArk' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'BizArk' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
																																							
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'BizArk' ),
										"desc" => __("Enter your twitter id", 'BizArk' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'BizArk' ),
										"desc" => __("Enter your reddit url", 'BizArk' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'BizArk' ),
										"desc" => __("Enter your facebook url", 'BizArk' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'BizArk' ),
										"desc" => __("Enter your stumbleupon url", 'BizArk' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'BizArk' ),
										"desc" => __("Enter your flickr url", 'BizArk' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'BizArk' ),
										"desc" => __("Enter your linkedin url", 'BizArk' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'BizArk' ),
										"desc" => __("Enter your google url", 'BizArk' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");

	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Logo Section Settings", 'BizArk' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Logo Upload", 'BizArk' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizArk' ),
										"desc" => __("Upload your logo here.", 'BizArk' ),
										"id" => "logo_layout_style",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");							
		
		$options[] = array( "name" => __("Logo Section Layout", 'BizArk' ),
							"type" => "groupcontaineropen");	

					
				$options[] = array( "name" => __("Select a layout", 'BizArk' ),
										"desc" => __("Images for logo section.", 'BizArk' ),
										"id" => "logo_layout_style",
										"type" => "images",
										"std" => "sbys",
										"options" => array(
											'sbys' => $imagepath . 'logo1.png',
											'onebone' => $imagepath . 'logo2.png')
										);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	
		
		$options[] = array( "name" => __("Header On/Off Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	

					
					$options[] = array( "name" => __("Show Header on homepage", 'BizArk' ),
										"desc" => __("Select yes if you want to show Header on homepage.", 'BizArk' ),
										"id" => "show_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show Header on Single post page", 'BizArk' ),
										"desc" => __("Select yes if you want to show Header on Single post page.", 'BizArk' ),
										"id" => "show_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Pages", 'BizArk' ),
										"desc" => __("Select yes if you want to show Header on Pages.", 'BizArk' ),
										"id" => "show_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Category Pages", 'BizArk' ),
										"desc" => __("Select yes if you want to show Header on Category Pages.", 'BizArk' ),
										"id" => "show_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Header's/Slider's Available in PRO Version", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following header's/slider's are available in PRO version", 'BizArk' ),
										"desc" => __("Upgrade to PRO version for above header's/Slider's", 'BizArk' ),
										"id" => "header_slider",
										"std" => "one",
										"type" => "proimages",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'slider1.png',
											'videoone' => $imagepath . 'video.png',
											'oneplus' => $imagepath . 'oneplus.png',
											'slidertwo' => $imagepath . 'slidertwo.png',
											'slit' => $imagepath . 'slit.png',
											'fraction' => $imagepath . 'fraction.png',
											'hero' => $imagepath . 'hero.png')
										);					

		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'BizArk' ),
										"desc" => __("Images for layout.", 'BizArk' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "images",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'beight' => $imagepath . 'beight.png',
											'spage' => $imagepath . 'layout2.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizArk' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizArk' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "proimages",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'btwo' => $imagepath . 'layout3.png',
											'boneplus' => $imagepath . 'boneplus.png',
											'bthree' => $imagepath . 'bthree.png',
											'bfour' => $imagepath . 'bfour.png',
											'bfive' => $imagepath . 'bfive.png',
											'bsix' => $imagepath . 'bsix.png',
											'bseven' => $imagepath . 'bseven.png',
											'beight' => $imagepath . 'beight.png',
											'bnine' => $imagepath . 'bnine.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Quote Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Quote?", 'BizArk' ),
										"desc" => __("Enter the welcome text", 'BizArk' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Quote 1", 'BizArk' ),
										"desc" => __("Enter the quote text", 'BizArk' ),
										"id" => "show_quote1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 1", 'BizArk' ),
										"desc" => __("Enter the customer name", 'BizArk' ),
										"id" => "show_quote1_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 2", 'BizArk' ),
										"desc" => __("Enter the quote text", 'BizArk' ),
										"id" => "show_quote2",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 2", 'BizArk' ),
										"desc" => __("Enter the customer name", 'BizArk' ),
										"id" => "show_quote2_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 3", 'BizArk' ),
										"desc" => __("Enter the quote text", 'BizArk' ),
										"id" => "show_quote3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 3", 'BizArk' ),
										"desc" => __("Enter the customer name", 'BizArk' ),
										"id" => "show_quote3_cust",
										"type" => "proupgrade");																				
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Client Logos", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Client Logo Section?", 'BizArk' ),
										"desc" => __("Select yes if you want to show client logos.", 'BizArk' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Client Logo # 1", 'BizArk' ),
										"desc" => __("upload the logo", 'BizArk' ),
										"id" => "client_logo1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 2", 'BizArk' ),
										"desc" => __("upload the logo", 'BizArk' ),
										"id" => "client_logo2",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Client Logo # 3", 'BizArk' ),
										"desc" => __("upload the logo", 'BizArk' ),
										"id" => "client_logo3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 4", 'BizArk' ),
										"desc" => __("upload the logo", 'BizArk' ),
										"id" => "client_logo4",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");							
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz One Settings", 'BizArk' ),
							"type" => "tabheading");
																							
						
		$options[] = array( "name" => __("Welcome Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "welcome_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizArk' ),
										"desc" => __("Enter the welcome text", 'BizArk' ),
										"id" => "welcome_text",
										"type" => "textarea");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Left Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizArk' ),
										"desc" => __("Upload your image here.", 'BizArk' ),
										"id" => "left_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "left_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizArk' ),
										"desc" => __("Enter the welcome text", 'BizArk' ),
										"id" => "left_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizArk' ),
										"desc" => __("Enter the link to product or service", 'BizArk' ),
										"id" => "left_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Center Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizArk' ),
										"desc" => __("Upload your image here.", 'BizArk' ),
										"id" => "center_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "center_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizArk' ),
										"desc" => __("Enter the welcome text", 'BizArk' ),
										"id" => "center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Link", 'BizArk' ),
										"desc" => __("Enter the link to product or service", 'BizArk' ),
										"id" => "center_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizArk' ),
										"desc" => __("Upload your image here.", 'BizArk' ),
										"id" => "right_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "right_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizArk' ),
										"desc" => __("Enter the welcome text", 'BizArk' ),
										"id" => "right_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizArk' ),
										"desc" => __("Enter the link to product or service", 'BizArk' ),
										"id" => "right_section_link",
										"type" => "text");																								

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'BizArk' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'BizArk' ),
										"desc" => __("Select yes if you want to show quote.", 'BizArk' ),
										"id" => "show_BizArk_quote_bizone",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);								
					
					$options[] = array( "name" => __("Quote", 'BizArk' ),
										"desc" => __("Enter the Quote Text", 'BizArk' ),
										"id" => "quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'BizArk' ),
										"desc" => __("Enter the customer name", 'BizArk' ),
										"id" => "quote_section_name",
										"type" => "text");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'BizArk' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizArk' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizArk' ),
										"id" => "show_bizone_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");														
						
	$options[] = array( "type" => "innertabclose");
	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");

		$options[] = array( "name" => __("Biz Eight Settings", 'BizArk' ),
							"type" => "tabheading");
		
		$options[] = array( "name" => __("Left Section", 'BizArk' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "bizeight_left_section_title",
										"type" => "text");	
										
					$options[] = array( "name" => __("Description", 'BizArk' ),
										"desc" => __("Enter the description", 'BizArk' ),
										"id" => "bizeight_left_section_desc",
										"type" => "text");																	

					$options[] = array( "name" => __("Upload Image 1", 'BizArk' ),
										"desc" => __("Upload your image 1 here.", 'BizArk' ),
										"id" => "bizeight_left_section_image1",
										"type" => "upload");					
										
					$options[] = array( "name" => __("Title 1", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_title1",
										"type" => "text");
										
					$options[] = array( "name" => __("Description 1", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_desc1",
										"type" => "text");										
										
					$options[] = array( "name" => __("Link 1", 'BizArk' ),
										"desc" => __("Enter the link", 'BizArk' ),
										"id" => "bizeight_left_section_link1",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Image 2", 'BizArk' ),
										"desc" => __("Upload your image 2 here.", 'BizArk' ),
										"id" => "bizeight_left_section_image2",
										"type" => "upload");					
										
					$options[] = array( "name" => __("Title 2", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_title2",
										"type" => "text");
										
					$options[] = array( "name" => __("Description 2", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_desc2",
										"type" => "text");										
										
					$options[] = array( "name" => __("Link 2", 'BizArk' ),
										"desc" => __("Enter the link", 'BizArk' ),
										"id" => "bizeight_left_section_link2",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image 3", 'BizArk' ),
										"desc" => __("Upload your image 3 here.", 'BizArk' ),
										"id" => "bizeight_left_section_image3",
										"type" => "upload");					
										
					$options[] = array( "name" => __("Title 3", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_title3",
										"type" => "text");
										
					$options[] = array( "name" => __("Description 3", 'BizArk' ),
										"desc" => __("Enter the title", 'BizArk' ),
										"id" => "bizeight_left_section_desc3",
										"type" => "text");										
										
					$options[] = array( "name" => __("Link 3", 'BizArk' ),
										"desc" => __("Enter the link", 'BizArk' ),
										"id" => "bizeight_left_section_link3",
										"type" => "text");																																										
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Center Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "bizeight_middle_section_title",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Portfolio Image 1", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image1",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 2", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image2",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 3", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image3",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 4", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image4",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 5", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image5",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 6", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image6",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 7", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image7",
										"type" => "upload");
										
					$options[] = array( "name" => __("Upload Portfolio Image 8", 'BizArk' ),
										"desc" => __("Upload your image.", 'BizArk' ),
										"id" => "bizeight_portfolio_image8",
										"type" => "upload");																																																														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizArk' ),
										"desc" => __("Enter the headline", 'BizArk' ),
										"id" => "bizeight_right_section_title",
										"type" => "text");	
										
					$options[] = array( "name" => __("Select Category", 'BizArk' ),
										"desc" => __("Posts from this category will be shown in the news/blog section.", 'BizArk' ),
										"id" => "bizeight_news_section_cat",
										"std" => "true",
										"type" => "select",
										"options" => $options_categories);																																	
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Recent Posts", 'BizArk' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizArk' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizArk' ),
										"id" => "show_posts_bizeight",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");																						
						
	$options[] = array( "type" => "innertabclose");			
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Page Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Comments?", 'BizArk' ),
										"desc" => __("Select yes if you want to show comments", 'BizArk' ),
										"id" => "show_comments_spage",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	

	$options[] = array( "name" => "country19",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Portfolio layout's are available in PRO version", 'BizArk' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizArk' ),
										"id" => "portfolio_layout",
										"std" => "pone",
										"type" => "proimages",
										"options" => array(
											'pone' => $imagepath . 'pone.png',
											'ptwo' => $imagepath . 'ptwo.png',
											'pthree' => $imagepath . 'pthree.png',
											'pfour' => $imagepath . 'pfour.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");
								
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'BizArk' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Social Section", 'BizArk' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show social Section?", 'BizArk' ),
										"desc" => __("Select yes if you want to show social section.", 'BizArk' ),
										"id" => "show_social_section",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Footer Logo Upload", 'BizArk' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizArk' ),
										"desc" => __("Upload your logo here.", 'BizArk' ),
										"id" => "footer_logo_upload",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Address Settings", 'BizArk' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show Search?", 'BizArk' ),
										"desc" => __("Select yes if you want to show search.", 'BizArk' ),
										"id" => "show_foote_search",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Address", 'BizArk' ),
										"desc" => __("Enter Address", 'BizArk' ),
										"id" => "footer_address",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Email", 'BizArk' ),
										"desc" => __("Enter Email Address", 'BizArk' ),
										"id" => "footer_email_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Phone Number", 'BizArk' ),
										"desc" => __("Enter Phone Number", 'BizArk' ),
										"id" => "footer_phone",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Skype", 'BizArk' ),
										"desc" => __("Enter Skype Address", 'BizArk' ),
										"id" => "footer_skype_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Google Map", 'BizArk' ),
										"desc" => __("Enter google map", 'BizArk' ),
										"id" => "footer_map_address",
										"type" => "proupgrade",
										);																																																														
										
		$options[] = array( "type" => "groupcontainerclose");											
										
		$options[] = array( "name" => __("Footer Layouts", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a footer layout", 'BizArk' ),
										"desc" => __("Images for layout.", 'BizArk' ),
										"id" => "footer_layout",
										"std" => "one",
										"type" => "images",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'footer1.png',
											'two' => $imagepath . 'footer2.png')
										);	
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Layouts available in PRO Version", 'BizArk' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizArk' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizArk' ),
										"id" => "homepage_layout",
										"std" => "fone",
										"type" => "proimages",
										"options" => array(
											'fthree' => $imagepath . 'fthree.png',
											'ffour' => $imagepath . 'ffour.png',
											'ffive' => $imagepath . 'ffive.png',
											'fsix' => $imagepath . 'fsix.png')
										);					
										
		$options[] = array( "type" => "groupcontainerclose");																							
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}