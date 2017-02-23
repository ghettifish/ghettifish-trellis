<?php
/**
* Class Theme Options Builder
*/
class Theme_Options_Builder{

    /**
    * Config settings change as needed
    */
    private $config;
    private $groups;
    private $fields;
    private $layout;

    /**
    * Initializes the plugin by setting localization, filters, and administration functions.
    */
    public function __construct($groups, $fields, $config = array(), $layout='default') {
        $default_config = array(
            'option_group' => 'mytheme_option_group',
            'option_name' => 'mytheme_option_name',
            'page_title' => __('Theme Options', 'eames'),
            'menu_title' => __('Theme Options', 'eames'),
            'menu_slug' => 'theme_options'
        );

        // Save configuration
        $this->config = wp_parse_args($config, $default_config);
        $this->groups = $groups;
        $this->fields = $fields;
        $this->layout = $layout;



        // Add settings
        add_action( 'admin_init', array($this, 'register_settings') );

        // Add menu and admin page
        add_action( 'admin_menu', array($this, 'theme_options_menu') );

        // Add scripts and styles
        add_action('admin_enqueue_scripts', array($this, 'register_admin_scripts' ) );
    }

    private function check_duplicate_uid(){
        $all_fields = array();
        foreach($this->groups as $group_key=>$group_name) :
            if(isset($this->fields[$group_key])) :
                foreach($this->fields[$group_key] as $field) :
                    $all_fields[] = $field['uid'];
                endforeach;
            endif;
        endforeach;
        $counts = array_count_values($all_fields);
        $errors = '';
        foreach($counts as $key=>$count){
            if($count>1){
                $errors .= "&nbsp; $key $count instances. <br>";
            }
        }
        if($errors){
            $errors = 'Duplicate UID detected: <br>'.$errors;
            add_settings_error( $this->get_config('menu_slug'), 'duplicate_uid', $errors, 'error fade' );
        }

    }



    /**
    * Prepare option data
    */
    public function register_settings() {
        register_setting(
            $this->get_config('option_group'),
            $this->get_config('option_name'),
            array( $this, 'validate_options')
        );
    }

    /**
    * Add page and menu
    */
    public function theme_options_menu() {
        add_theme_page(
            $this->get_config('page_title'),
            $this->get_config('menu_title'),
            'edit_theme_options',
            $this->get_config('menu_slug'),
            array( $this, 'theme_options_page')
        );
    }

    /**
    * Add needed stylesheet and scripts
    */
    public function register_admin_scripts() {
        global $wp_version;

        if(isset($_GET['page']) and $_GET['page']==$this->get_config('menu_slug')){

            if ( version_compare( $wp_version, '3.5', '<' ) ) { // Use old media manager

                wp_enqueue_style('thickbox');

                wp_enqueue_script('media-upload');
                wp_enqueue_script('thickbox');

            } else {
                // Required media files for new media manager. Since WP 3.5+
                wp_enqueue_media();
            }

            // Styles and scripts from layout
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'style', self::url().'layouts/'.$this->layout.'/css/style.css', array(), false, 'all');

            wp_enqueue_script( 'cookie', self::url().'layouts/'.$this->layout.'/js/jquery-cookie.js', array('jquery' ) );
            wp_enqueue_script( 'script', self::url().'layouts/'.$this->layout.'/js/script.js', array('jquery','wp-color-picker') );
        }
    }


    /**
    * Set defaults
    */
    public function get_default_theme_options() {
        $defaults = array();
        foreach($this->fields as $group){
            foreach($group as $field){
                $defaults[$field['uid']] = $field['default'];
            }
        }

        return $defaults;
    }


    /**
    * Settings page HTML
    */
    public function theme_options_page() {
        $this->check_duplicate_uid();
        include(self::path().'layouts/'.$this->layout.'/layout.php');
    }

    /**
    * Validate data from form
    */
    public function validate_options( $input ) {

        if( isset($_POST['reset']) ){
            $input = $this->get_default_theme_options();
            add_settings_error( $this->get_config('menu_slug'), 'restore_defaults', __( 'Default options restored.', 'eames' ), 'updated fade' );
        }
        return $input;
    }

    /**
    * Get config data
    */
    public function get_config($key) {
        return isset($this->config[$key]) ? $this->config[$key] : false;
    }

    /**
    * Get options
    */
    public function get_theme_options() {
        return get_option( $this->get_config('option_name'), $this->get_default_theme_options() );
    }

    /**
    * STATIC FUNCTIONS
    */

    /**
    * Get path to directory of theme options builder
    */
    public static function path(){
        return THEME_OPTION_PATH;
    }

    /**
    * Get url to directory of theme options builder
    */
    public static function url(){
        return THEME_OPTION_URL;
    }

    /**
    * Print with a twist
    */
    public static function debug($o){
        echo '<pre>'.print_r($o, 1).'</pre>';
    }

    /**
    * PRIVATE FUNCTIONS
    */

    /**
    * Include Field
    */
    private function include_field($field, $saved_settings){
        $path = self::path().'layouts/'.$this->layout.'/fields/'.$field['type'].'/display.php';
        $value = ($saved_settings[$field['uid']]!==null) ? $saved_settings[$field['uid']] : $field['default'];

        if($field['type']=='select' and !isset($field['options'])){
            $field['options'] = array();
        }
        if($field['type']=='checkbox' and !isset($field['checkbox'])){
            $value = $saved_settings[$field['uid']];
        }

        extract($field);


        unset($field, $saved_settings);


        include($path);
    }

    /**
    * Get Field Name
    *
    * @param string $uid The unique key of the field.
    * @return string HTML name attr of the element with option group applied
    */
    private function get_field_name($uid){
        return $this->get_config('option_name')."[$uid]";
    }

    /**
    * Field Name
    *
    * Wrapper for get_field_name to echo the value automatically
    *
    * @param string $uid The unique key of the field.
    * @return void
    */
    private function field_name($uid){
        echo $this->get_field_name($uid);
    }

    /**
    * Get Field ID
    *
    * @param string $uid The unique key of the field.
    * @return string HTML ID attr of the element with option group applied
    */
    private function get_field_id($uid){
        return sanitize_title($this->get_config('option_name')."-$uid");
    }

    /**
    * Field ID
    *
    * Wrapper for get_field_id to echo the value automatically
    *
    * @param string $uid The unique key of the field.
    * @return void
    */
    private function field_id($uid){
        echo $this->get_field_id($uid);
    }

    /**
    * Loop Fields
    *
    * Loop thru fields and output markup
    *
    * @param string $group_key The group key of the fields.
    * @return void
    */
    private function loop_fields($group_key){
        $settings = $this->get_theme_options();
        if(isset($this->fields[$group_key])) :
            foreach($this->fields[$group_key] as $field) :
                $this->include_field($field, $settings);
            endforeach;
        endif;
    }
}

