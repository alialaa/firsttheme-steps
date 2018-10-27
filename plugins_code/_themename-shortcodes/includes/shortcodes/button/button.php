<?php 
function _themename_button($atts = [], $content = null, $tag=null) {
    extract(shortcode_atts([
        'color' => 'red',
        'text' => 'Button'
    ], $atts, $tag));

    return '<button class="_themename_button" style="background-color: ' . esc_attr($color) . '">' . do_shortcode($content) .'</button>';
}
add_shortcode( '_themename_button', '_themename_button' );