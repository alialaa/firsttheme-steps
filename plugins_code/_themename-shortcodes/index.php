<?php
/*
Plugin Name:  _themename _pluginname
Plugin URI:   
Description:  Adding Shortcodes for _themename
Version:      1.0.0
Author:       Ali Alaa
Author URI:   http://alialaa.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  _themename-_pluginname
Domain Path:  /languages
*/

if( !defined('WPINC')) {
    die;
}

function _themename__pluginname_init(){
	include_once('includes/shortcodes/button/button.php');
}


add_action( 'init', '_themename__pluginname_init' );

include_once('includes/enqueue-assets.php');