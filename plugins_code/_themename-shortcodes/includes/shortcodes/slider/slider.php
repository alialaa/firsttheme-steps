<?php 

function _themename_slider($atts = [], $content = null, $tag = '') {
	extract(shortcode_atts([
		'autoplay' => false,
		'arrows' => false
	],$atts, $tag));

	$o = '<div data-slick=\'{"autoplay":' . ($autoplay ? 'true' : 'false') . ', "arrows": ' . ($arrows ? 'true' : 'false') . '}\'>';

	$o .= '</div>';

	return $o;
}

add_shortcode( '_themename_slider', '_themename_slider' );