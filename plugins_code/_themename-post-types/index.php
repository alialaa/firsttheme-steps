<?php
/*
Plugin Name:  _themename _pluginname
Plugin URI:   
Description:  Adding Custom Post Types for _themename
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

include_once('includes/portfolio-post-type.php');
include_once('includes/project-type-tax.php');
include_once('includes/skills-tax.php');