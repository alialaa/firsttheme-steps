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

function _themename__pluginname_activate() {
    _themename__pluginname_setup_post_type();
    _themename__pluginname_register_project_type_tax();
    _themename__pluginname_register_skills_tax();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, '_themename__pluginname_activate');

function _themename__pluginname_deactivate() {
    unregister_post_type('_themename_portfolio');
    unregister_taxonomy('_themename_project_type');
    unregister_taxonomy('_themename_skills');
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, '_themename__pluginname_deactivate');