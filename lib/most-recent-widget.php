<?php

class _themename_Most_Recent_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            '_themename_mst_recent_widget',
            esc_html__('Recent Posts', '_themename'),
            array(
                'description' => esc_html__('some description', '_themename')
            )
        );
    }

    public function form( $instance ) {
        echo "sldjlkj";
    }

    public function widget($args, $instance) {
        var_dump($args);
        echo "ljljl";
    }

    public function update($new_instance, $old_instance) {
    
    }
}

function _themename_register_most_recent_widget() {
    register_widget('_themename_Most_Recent_Widget');
}

add_action('widgets_init', '_themename_register_most_recent_widget');