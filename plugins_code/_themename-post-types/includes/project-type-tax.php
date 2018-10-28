<?php

function _themename__pluginname_register_project_type_tax() {
    $labels = [
        'name'              => esc_html_x('Project Type', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Project Type', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Project Types', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Project Types', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Project Type', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Project Type:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Project Type', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Project Type', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Project Type', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Project Type Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Project Types', '_themename-_pluginname'),
    ];
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'project_type')
    );
    register_taxonomy('_themename_project_type', ['_themename_portfolio'], $args);
}

add_action('init', '_themename__pluginname_register_project_type_tax');