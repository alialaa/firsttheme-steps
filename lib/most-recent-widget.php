<?php
class _themename_Most_Recent_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            '_themename_mst_recent_widget',
            esc_html__('Recent Posts', '_themename'),
            array(
                'description' => esc_html__('some description', '_themename'),
                'customize_selective_refresh' => true
            )
        );
    }

    public function form( $instance ) {
        var_dump($instance);
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        else {
            $title = "";
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php esc_html_e('Title:', '_themename'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <?php
    }

    public function widget($args, $instance) {
        var_dump($args);
        echo "ljljl";
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = isset($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}

function _themename_register_most_recent_widget() {
    register_widget('_themename_Most_Recent_Widget');
}

add_action('widgets_init', '_themename_register_most_recent_widget');