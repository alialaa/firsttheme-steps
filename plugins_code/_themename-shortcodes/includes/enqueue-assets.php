<?php

function _themename__pluginname_scripts( ) {
    wp_enqueue_script( '_themename-_pluginname-scripts', plugins_url( '_themename-shortcodes/dist/assets/js/bundle.js' ), array( 'jquery' ), '1.0.0', true);

    wp_enqueue_style( '_themename-_pluginname-stylesheet',  plugins_url('_themename-shortcodes/dist/assets/css/bundle.css'), array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', '_themename__pluginname_scripts' );