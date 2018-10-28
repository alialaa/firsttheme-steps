<?php 

function _themename_slider($atts = [], $content = null, $tag = '') {
	extract(shortcode_atts([
		'autoplay' => false,
		'arrows' => false
	],$atts, $tag));

	$o = '<div class="_themename-slider" data-slick=\'{"autoplay":' . ($autoplay ? 'true' : 'false') . ', "arrows": ' . ($arrows ? 'true' : 'false') . '}\'>';

		if(!is_null($content)){
			$o .= do_shortcode(shortcode_unautop($content));
		}

	$o .= '</div>';

	return $o;
}

add_shortcode( '_themename_slider', '_themename_slider' );


function _themename_slide($atts = [], $content = null, $tag = '') {
	extract(shortcode_atts([
		'image' => null,
		'caption' => ''
	],$atts, $tag));

	$o = '<div class="_themename-slide">';
	if($image) {
		$o .= wp_get_attachment_image( $image, 'large');
	}
	if($caption) {
		$o .= '<div class="_themename-slide-caption">' . esc_html($caption) . '</div>';
	}
	$o .= '</div>';

	return $o;
}
add_shortcode( '_themename_slide', '_themename_slide' );