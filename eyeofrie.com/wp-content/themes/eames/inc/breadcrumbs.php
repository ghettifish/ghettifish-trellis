<?php
function breadcrumbs($options=array()){
    $options = array(
        'before'=>'<ul class="clearfix">',
        'after'=>'</ul>',
        'before_link'=>'<li>',
        'after_link'=>'</li>',
        'separator'=>'',
        'labels'=>array(
            'home'   => __('Home', 'eames'),
            '404'    => __('404 Page', 'eames'),
            'search' => __('Search Page', 'eames')
        )
    );
    $b = new BreadCrumb($options);
    echo $b->show();
}
//sample filter for breadcrumb trails array. param trails contains all crumbs
function breadcrumb_trails_cb($trails){
    return $trails;
}
//add_filter('breadcrumb_trails','breadcrumb_trails_cb');

//sample filter for breadcrumb element. param element html of current crumb. param crumb array of properties
function breadcrumb_element_cb($element,$crumb){
    return $element;
}
//add_filter('breadcrumb_element','breadcrumb_element_cb',10,2);

//sample filter for current element. param element html of current crumb. param crumb array of properties
function breadcrumb_current_element_cb($element,$crumb){
    return '<li><span>'.$crumb['title'].'</span></li>';
}
//add_filter('breadcrumb_current_element','breadcrumb_current_element_cb',10,2);

/*
A class for a customizable breadcrumbs.
*/
class Breadcrumb{
    protected $settings;

    function __construct($opts){
        $defaults = array(
            'before'=>'<ul class="breadcrumb">',
            'after'=>'</ul>',
            'before_link'=>'<li class="%1$s">',
            'after_link'=>'</li>',
            'separator'=>'<li> &raquo; </li>',
            'labels'=>array(
                'home'=>'Home',
                '404'=>'404 Page',
                'search'=>'Search'
            ),
            'classes'=>array(
                'item'=>'breadcrumb-item'
            )
        );
        $this->settings = wp_parse_args($opts, $defaults);
    }
    function show(){
        //Determine where we are and do something
        if(is_404()){
            return $this->build_404_trails();
        }
        if(is_search()){
            return $this->build_search_trails();
        }
        //archive types
        if(is_archive()){
            if(is_tax()){
                return $this->build_taxo_trails();
            }
            if(is_category()){
                return $this->build_category_trails();
            }
            if(is_tag()){
                return $this->build_tag_trails();
            }
            if(is_author()){
                return $this->build_author_trails();
            }
            if(is_date()){
                return $this->build_archive_date_trails();
            }
        }
        //single types
        if(is_single()){
            if(get_post_type() == 'post'){//post
                return $this->build_post_trails();
            } else {
                return $this->build_custom_post_trails();//custom post
            }
        }
        if(is_page()){
            return $this->build_page_trails();
        }
        if(is_front_page()){
            //
        }
        if(is_home()){
            //
        }

    }
    //Custom Taxonomy
    function build_taxo_trails(){
        global $wp_query;

        $taxonomy = get_query_var('taxonomy');
        $current_term = get_term_by('slug', get_query_var('term'), $taxonomy);

        $crumbs = array();
        if($ancestors = get_ancestors($current_term->term_id, $taxonomy)){//get category ancestry
            $ancestors = array_reverse($ancestors);//reverse ids order
            foreach($ancestors as $i=>$ancestor){
                if($category = get_term_by('id', $ancestor, $taxonomy)){
                    $crumbs[] = array(
                        'title'=>$category->name,
                        'object_id'=>$ancestor,
                        'type'=>$taxonomy,
                        'url'=>get_term_link($ancestor, $taxonomy)
                    );
                }
            }

        }
        //get self
        if(isset($current_term)){
            $crumbs[] = array(
                'title'=>$current_term->name,
                'object_id'=>$current_term->term_id,
                'type'=>$taxonomy,
                'url'=>''
            );
        }
        return $this->build_trails($crumbs);
    }

    //Category
    function build_category_trails(){
        global $wp_query;

        $taxonomy = 'category';
        $current_term = get_term_by('slug', get_query_var('category_name'), $taxonomy);

        $crumbs = array();
        if($ancestors = get_ancestors($current_term->term_id, $taxonomy)){//get category ancestry
            $ancestors = array_reverse($ancestors);//reverse ids order
            foreach($ancestors as $i=>$ancestor){
                if($category = get_term_by('id', $ancestor, $taxonomy)){
                    $crumbs[] = array(
                        'title'=>$category->name,
                        'object_id'=>$ancestor,
                        'type'=>$taxonomy,
                        'url'=>get_term_link($ancestor, $taxonomy)
                    );
                }
            }

        }
        //get self
        if(isset($current_term)){
            $crumbs[] = array(
                'title'=>$current_term->name,
                'object_id'=>$current_term->term_id,
                'type'=>$taxonomy,
                'url'=>''
            );
        }
        return $this->build_trails($crumbs);
    }

    //Tag
    function build_tag_trails(){
        global $wp_query;

        $taxonomy = 'post_tag';
        $current_term = get_term_by('slug', get_query_var('tag'), $taxonomy);

        $crumbs = array();

        //get self
        if(isset($current_term)){
            $crumbs[] = array(
                'title'=>'Tag:'.$current_term->name,
                'object_id'=>$current_term->term_id,
                'type'=>$taxonomy,
                'url'=>''
            );
        }

        return $this->build_trails($crumbs);
    }

    //Author
    function build_author_trails(){
        global $wp_query;

        $crumbs = array();

        //get self
        $crumbs[] = array(
            'title'=> get_author_name(get_query_var('author')),
            'object_id'=>get_query_var('author'),
            'type'=>'author',
            'url'=>''
        );


        return $this->build_trails($crumbs);
    }

    //Date
    function build_archive_date_trails(){
        global $wp_query;

        $crumbs = array();



        if($month = $wp_query->query_vars['monthnum']){
            if($year = $wp_query->query_vars['year']){
                $crumbs[] = array(
                    'title'=>$year,
                    'object_id'=>null,
                    'type'=>'',
                    'url'=>get_year_link($year)
                );
                //get self
                $crumbs[] = array(
                    'title'=>date('F',mktime(0,0,0,$month,1,$year)),
                    'object_id'=>null,
                    'type'=>'',
                    'url'=>''
                );
            }

        } else {
            if($year = $wp_query->query_vars['year']){
                $crumbs[] = array(
                    'title'=>$year,
                    'object_id'=>null,
                    'type'=>'',
                    'url'=>''
                );
            }
        }
        return $this->build_trails($crumbs);
    }

    //404
    function build_404_trails(){
        global $wp_query;

        $crumbs = array();

        //get self
        $crumbs[] = array(
            'title'=>$this->settings['labels']['404'],
            'object_id'=>null,
            'type'=>'',
            'url'=>''
        );


        return $this->build_trails($crumbs);
    }

    //Search
    function build_search_trails(){
        global $wp_query;

        $crumbs = array();

        //get self
        $crumbs[] = array(
            'title'=>$this->settings['labels']['search'],
            'object_id'=>null,
            'type'=>'',
            'url'=>''
        );


        return $this->build_trails($crumbs);
    }

    //Post
    function build_post_trails(){
        global $wp_query;

        $crumbs = array();
        $current_post_id = $wp_query->post->ID;
        $current_post_title = $wp_query->post->post_title;
        $post_categories = wp_get_post_categories( $current_post_id );//get post categories
        if(count($post_categories)>0){
            if($ancestors = get_ancestors($post_categories[0], 'category')){//get category ancestry of first category
                $ancestors = array_reverse($ancestors);//reverse ids order
                foreach($ancestors as $i=>$ancestor){
                    if($category = get_category($ancestor)){
                        $crumbs[] = array(
                            'title'=>$category->name,
                            'object_id'=>$ancestor,
                            'type'=>'category',
                            'url'=>get_category_link($ancestor)
                        );
                    }
                }
            }
            //get first category
            if($category = get_category($post_categories[0])){
                $crumbs[] = array(
                    'title'=>$category->name,
                    'object_id'=>$post_categories[0],
                    'type'=>'category',
                    'url'=>get_category_link($post_categories[0])
                );
            }

            //get self
            $crumbs[] = array(
                'title'=>$current_post_title,
                'object_id'=>$current_post_id,
                'type'=>'post',
                'url'=>''
            );
        }
        return $this->build_trails($crumbs);
    }
    //Custom Post
    function build_custom_post_trails(){
        global $wp_query;


        $post_type = get_post_type();
        $current_page_id = $wp_query->post->ID;

        if(is_post_type_hierarchical($post_type)){//hierarchical like Page

            $crumbs = array();

            //trails

            if($ancestors = get_ancestors($current_page_id, $post_type)){
                $ancestors = array_reverse($ancestors);//reverse ids order
                foreach($ancestors as $i=>$ancestor){
                    $post = get_post($ancestor);
                    $crumbs[] = array(
                        'title'=>$post->post_title,
                        'object_id'=>$ancestor,
                        'type'=>$post_type,
                        'url'=>get_permalink($ancestor)
                    );
                }
            }
            //get self
            $crumbs[] = array(
                'title'=>$wp_query->post->post_title,
                'object_id'=>$current_page_id,
                'type'=>$post_type,
                'url'=>''
            );

            return $this->build_trails($crumbs);

        } else {//non hierarchical with taxonomy like Posts
            $custom_post_type = get_post_type_object( $post_type );//get custom this post type properties
            if(!empty($custom_post_type->taxonomies) and is_array($custom_post_type->taxonomies)){//check its category
                $custom_category_name = $custom_post_type->taxonomies[0];//get first category, store the name
                $custom_categories = wp_get_object_terms( $current_page_id, $custom_category_name);//get this post's category
                if(!empty($custom_categories) and is_array($custom_categories)){
                    if($ancestors = get_ancestors($custom_categories[0]->term_id, $custom_category_name)){//get category ancestry of first category
                        $ancestors = array_reverse($ancestors);//reverse ids order
                        foreach($ancestors as $i=>$ancestor){
                            if($category = get_term_by( 'id', $ancestor, $custom_category_name )){
                                $crumbs[] = array(
                                    'title'=>$category->name,
                                    'object_id'=>$ancestor,
                                    'type'=>$custom_category_name,
                                    'url'=>get_term_link($ancestor, $custom_category_name)
                                );
                            }
                        }
                    }
                    //get first category
                    if(isset($custom_categories[0])){
                        $crumbs[] = array(
                            'title'=>$custom_categories[0]->name,
                            'object_id'=>$custom_categories[0]->term_id,
                            'type'=>$custom_category_name,
                            'url'=>get_term_link((int)$custom_categories[0]->term_id, $custom_category_name)
                        );
                    }

                    //get self
                    $crumbs[] = array(
                        'title'=>$wp_query->post->post_title,
                        'object_id'=>$wp_query->post->ID,
                        'type'=>$post_type,
                        'url'=>''
                    );
                    return $this->build_trails($crumbs);
                }
            }
            //

        }
    }
    //Page
    function build_page_trails(){
        global $wp_query;

        $crumbs = array();
        //trails
        $current_page_id = $wp_query->post->ID;
        if($ancestors = get_ancestors($current_page_id, 'page')){
            $ancestors = array_reverse($ancestors);//reverse ids order
            foreach($ancestors as $i=>$ancestor){
                $post = get_post($ancestor);
                $crumbs[] = array(
                    'title'=>$post->post_title,
                    'object_id'=>$ancestor,
                    'type'=>'page',
                    'url'=>get_permalink($ancestor)
                );
            }
        }
        //get self
        $crumbs[] = array(
            'title'=>$wp_query->post->post_title,
            'object_id'=>$current_page_id,
            'type'=>'page',
            'url'=>''
        );

        return $this->build_trails($crumbs);
    }

    //Build the Trails
    function build_trails($crumbs){
        $trails = array();

        //home
        $home = array(
            'title'=>$this->settings['labels']['home'],
            'object_id'=>null,
            'type'=>'page',
            'url'=>home_url('/')
        );
        $trails[] = $this->build_element($home);

        if(!empty($crumbs) and is_array($crumbs)){
            foreach($crumbs as $crumb){
                $trails[] = $this->build_element($crumb);
            }

        }
        $trails = apply_filters('breadcrumb_trails', $trails);//filter array
        return $this->settings['before'].implode($this->settings['separator'], $trails).$this->settings['after'];
    }

    //Build Element
    function build_element($crumb){
        $before_link = sprintf($this->settings['before_link'], $this->settings['classes']['item']);
        if(!empty($crumb['url'])){
            $element = $before_link.'<a href="'.$crumb['url'].'">'.$crumb['title'].'</a>'.$this->settings['after_link'];
        } else {
            $element = $before_link.$crumb['title'].$this->settings['after_link'];
            $element = apply_filters('breadcrumb_current_element', $element, $crumb);
        }
        $element = apply_filters('breadcrumb_element', $element, $crumb);
        return $element;
    }

}
