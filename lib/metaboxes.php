<?php 

function _themename_add_meta_box() {
    add_meta_box( 
        '_themename_post_metabox', 
        'Post Settings', 
        '_themename_post_metabox_html', 
        'post', 
        'normal', 
        'default');
}

add_action( 'add_meta_boxes', '_themename_add_meta_box' );

function _themename_post_metabox_html($post) {
	$subtitle = get_post_meta($post->ID, '__themename_post_subtitle', true);
	?>
	<p>
        <label for="_themename_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_themename' ); ?></label>
        <br />
        <input class="widefat" type="text" name="_themename_post_subtitle_field" id="_themename_post_metabox_html" value="<?php echo esc_attr( $subtitle ); ?>" />
    </p>
	<?php 
}

function _themename_save_post_metabox($post_id, $post) {

	if(array_key_exists('_themename_post_subtitle_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__themename_post_subtitle', 
            sanitize_text_field($_POST['_themename_post_subtitle_field'])
        );
    }

}

add_action( 'save_post', '_themename_save_post_metabox', 10, 2 );