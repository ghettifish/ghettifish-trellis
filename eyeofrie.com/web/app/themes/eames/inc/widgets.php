<?php
/**
 * Extend WP_Widget to add more functionality
 */
abstract class Extended_WP_Widget extends WP_Widget {

    public function __construct($css_id_base, $title, $widget_ops ) {
        parent::__construct($css_id_base, $title, $widget_ops );
    }

    public function widget( $args, $instance ) {

    }

    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    public function form( $instance ) {

    }

    protected function print_label($key, $label){
        ?><label for="<?php echo $this->get_field_id($key); ?>"><?php echo esc_attr( $label ); ?></label><?php
    }

    protected function print_textbox($key, $instance){
        ?><input class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" type="text" value="<?php esc_attr_e($instance[$key]); ?>" /><?php
    }

    protected function print_textarea($key, $instance){
        ?><textarea class="widefat" name="<?php echo $this->get_field_name($key); ?>" id="<?php echo $this->get_field_id($key); ?>"><?php echo esc_textarea($instance[$key]); ?></textarea><?php
    }

    protected function print_select($key, $instance, $options){
        ?><select class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>">
            <?php foreach($options as $option) : ?>
            <option value="<?php echo $option['value']; ?>" <?php echo ($instance[$key]==$option['value']) ? 'selected="selected"': ''; ?>><?php echo $option['name']; ?></option>
            <?php endforeach; ?>
        </select><?php
    }

    protected function print_radio($key, $instance, $options){
        foreach($options as $i=>$option) :
        ?><label for="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>">
            <input type="radio" id="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo $option['value']; ?>" <?php echo ($instance[$key]==$option['value']) ? 'checked="checked"': ''; ?> /> <?php echo $option['name']; ?></label> <br><?php
        endforeach;
    }

    protected function print_checkbox($key, $instance, $options){
        foreach($options as $i=>$option) :
        ?><label for="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>">
            <input type="checkbox" id="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo $option['value']; ?>" <?php echo ($instance[$key]==$option['value']) ? 'checked="checked"': ''; ?> /> <?php echo $option['name']; ?></label> <br><?php
        endforeach;
    }
}

/**
 * Custom widget implementation
 *
 */
class Custom_Sample_Widget extends Extended_WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'css_id_base' => 'widget-custom-sample', //CSS ID base
            'css_class' => 'widget-custom-sample' , //CSS class
            'title' => __("Custom Sample Widget", 'eames'), //Widget name
            'description' => __("A widget that demonstrates a custom widget.", 'eames') //Widget description
        );
        parent::__construct($widget_ops['css_id_base'], $widget_ops['title'], array( 'classname' => $widget_ops['css_class'], 'description' => $widget_ops['description'] ) );
    }

    public function widget( $args, $instance ){
        echo $before_widget;

        if ( !empty($instance['title']) ) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $before_title . $title . $after_title;
        }

        echo '<pre>'.print_r($args,true).'</pre>';
        echo '<pre>'.print_r($instance,true).'</pre>';

        echo $after_widget;

    }

    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    public function form( $instance ) {
        $defaults = array(
            'title' => '',
            'textarea'=>'',
            'select'=>'',
            'radio'=>'',
            'checkbox'=>''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
        <p>
            <?php $this->print_label('title', __('Title', 'eames')); ?>
            <?php $this->print_textbox('title', $instance); ?>
        </p>
        <p>
            <?php $this->print_label('textarea', __('Textarea', 'eames')); ?>
            <?php $this->print_textarea('textarea', $instance); ?>
        </p>
        <p>
            <?php $this->print_label('select', __('Select', 'eames')); ?>
            <?php $options = array(
                array(
                    'value'=>'',
                    'name'=>''
                ),
                array(
                    'value'=>'1',
                    'name'=> __('Select option 1', 'eames')
                ),
                array(
                    'value'=>'2',
                    'name'=> __('Select option 2', 'eames')
                )
            ); ?>
            <?php $this->print_select('select', $instance, $options); ?>
        </p>
        <p><?php $options = array(
                array(
                    'value'=>'1',
                    'name'=> __('Radio option 1', 'eames')
                ),
                array(
                    'value'=>'2',
                    'name'=> __('Radio option 2', 'eames')
                )
            ); ?>
            <?php $this->print_radio('radio', $instance, $options); ?>
        </p>
        <p><?php $options = array(
                array(
                    'value'=>'checkbox1',
                    'name'=> __('Checkbox option 1', 'eames')
                ),
                array(
                    'value'=>'checkbox2',
                    'name'=> __('Checkbox option 2', 'eames')
                )
            ); ?>
            <?php $this->print_checkbox('checkbox', $instance, $options); ?>
        </p>
<?php
    }
}
/**
 * Modified navigation menu widget class
 *
 */
class Custom_Nav_Menu_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'widget-nav-menu', 'description' => __('Use this widget to add one of your custom menus as a widget.', 'eames') );
        parent::__construct( 'nav_menu', __('Custom Menu', 'eames'), $widget_ops );
    }

    function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

        echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }

    function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.', 'eames'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'eames') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:', 'eames'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
        <?php
            foreach ( $menus as $menu ) {
                $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
                echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
            }
        ?>
            </select>
        </p>
        <?php
    }
}

/**
 * Modified WP Search widget
 *
 */
class Custom_Widget_Search extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget-search', 'description' => __( "A search form for your site", 'eames') );
        parent::__construct('search', __('Custom Search', 'eames'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;

        // Use current theme search form if it exists
        get_search_form();

        echo $after_widget;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = $instance['title'];
?>
        <p><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

}

class Mytheme_Sample_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array(
            'css_id_base' => 'sample_widget', //CSS ID base
            'css_class' => 'sample-widget' , //CSS class
            'title' => __("Sample Widget", 'eames'), //Widget name
            'description' => __("Sample widget that shows different form fields.", 'eames') //Widget description
        );
        parent::__construct($widget_ops['css_id_base'], $widget_ops['title'], array( 'classname' => $widget_ops['css_class'], 'description' => $widget_ops['description'] ) );
    }

    function widget( $args, $instance ) {
        extract($args, EXTR_SKIP);

        echo $before_widget;

        if ( !empty($instance['title']) ) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $before_title . $title . $after_title;
        }

        echo '<p>'.$instance['textarea'].'</p>';
        echo '<p>'.$instance['gender'].'</p>';

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['textarea'] = strip_tags($new_instance['textarea']);
        $instance['gender'] = strip_tags($new_instance['gender']);

        return $instance;

    }

    function form( $instance ) {
        $defaults = array(
            'title' => '',
            'textarea'=>'',
            'gender'=>''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'eames' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php esc_attr_e($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e( 'Textarea', 'eames' ); ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('textarea'); ?>" id="<?php echo $this->get_field_id('textarea'); ?>"><?php echo esc_textarea($instance['textarea']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('gender'); ?>"><?php _e('Gender', 'eames'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('gender'); ?>" name="<?php echo $this->get_field_name('gender'); ?>">
                <option value=""></option>
                <option value="Female" <?php echo $instance['gender']=='Female' ? 'selected="selected"': ''; ?>>Female</option>
                <option value="Male" <?php echo $instance['gender']=='Male' ? 'selected="selected"': ''; ?>>Male</option>
            </select>
        </p>
<?php

    }

    private function print_textfield($key, $instance){
        ?><input class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" type="text" value="<?php esc_attr_e($instance[$key]); ?>" /><?php
    }

    private function print_textarea($key, $instance){
        ?><textarea class="widefat" name="<?php echo $this->get_field_name($key); ?>" id="<?php echo $this->get_field_id($key); ?>"><?php echo esc_textarea($instance[$key]); ?></textarea><?php
    }
}

class Any_Post_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'classname' => 'widget-any-post' , 'description' => __( "Shows custom posts.", 'eames') );
        parent::__construct('sample_widget', __('Any Post', 'eames'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args, EXTR_SKIP);

        echo $before_widget;

        if ( !empty($instance['title']) ) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $before_title . $title . $after_title;
        }
        $current_post_type = $instance['current_post_type'];

        echo '<p>'.$current_post_type.'</p>';

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['current_post_type'] = strip_tags($new_instance['current_post_type']);

        return $instance;

    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'current_post_type'=>'' ) );
        $title = $instance['title'];
        $current_post_type = $instance['current_post_type'];
        $post_types = $this->_post_types();
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'eames' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php esc_attr_e($title); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('current_post_type'); ?>"><?php _e('Post Type', 'eames'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('current_post_type'); ?>" name="<?php echo $this->get_field_name('current_post_type'); ?>">
                <?php foreach($post_types as $key=>$post_type): ?>
                <option value="<?php echo $key; ?>" <?php echo $post_type==$current_post_type ? 'selected="selected"': ''; ?>><?php echo $post_type; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
<?php

    }

    /**
    * Function that list the selectable post types for the builder
    */
    private function _post_types(){
        $post_types = array();
        $args=array(
            '_builtin' => false // Get custom post types only
        );
        // Built-in post types
        $post_types['page']='Page';
        $post_types['post']='Post';

        $custom_types = get_post_types($args, 'names');

        return array_merge($post_types, $custom_types);// Merge post types
    }
}

function mytheme_widgets_init(){
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Search');

    register_widget('Custom_Nav_Menu_Widget');
    register_widget('Custom_Widget_Search');
    register_widget('Any_Post_Widget');
    register_widget('Custom_Sample_Widget');
}
add_action('widgets_init', 'mytheme_widgets_init');

