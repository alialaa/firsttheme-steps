<?php

require_once('lib/customize.php');
require_once('lib/helpers.php');
require_once('lib/enqueue-assets.php');
require_once('lib/sidebars.php');
require_once('lib/theme-support.php');
require_once('lib/navigation.php');
require_once('lib/include-plugins.php');
require_once('lib/comment-callback.php');
//require_once('lib/metaboxes.php');


if (!isset($content_width)) {
    $content_width = 800;
}

function _themename_content_width() {
    global $content_width;
    global $post;

    if (is_single() && $post->post_type === 'post') {
        $layout = _themename_meta( $post->ID, '__themename_post_layout', 'full' );
        $sidebar = is_active_sidebar( 'primary-sidebar' );
        if($layout === 'sidebar' && !$sidebar) {
            $layout = 'full';
        }
        $content_width = $layout === 'full' ? 800 : 738;
    }
}

add_action('template_redirect', '_themename_content_width');


function _themename_image_sizes( $sizes, $size, $image_src, $image_meta, $attachent_id ){
    $width = $size[0];
    global $content_width;
    return 'slfjl';
}

add_filter('wp_calculate_image_sizes','_themename_image_sizes' , 10, 5);



function _themename_handle_delete_post() {
    if( isset($_GET['action']) && $_GET['action'] === '_themename_delete_post' ) {
        if(!isset($_GET['nonce']) || !wp_verify_nonce( $_GET['nonce'], '_themename_delete_post_' . $_GET['post'] ) ) {
            return;
        }
        $post_id = isset($_GET['post']) ? $_GET['post'] : null;
        $post = get_post((int) $post_id);
        if(empty($post)) {
            return;
        }
        if(!current_user_can( 'delete_post', $post_id )) {
            return;
        }

        wp_trash_post( $post_id );
        wp_safe_redirect( home_url() );

        die;
    }
}

add_action( 'init', '_themename_handle_delete_post' ); 

?>