<?php
function _themename__pluginname_register_skills_tax() {
    $labels = [
        'name'              => esc_html_x('Skills', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Skill', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Skills', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Skills', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Skill', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Skill:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Skill', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Skill', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Skill', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Skill Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Skills', '_themename-_pluginname'),
	];
    $args = [
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_admin_column' => true,
		'rewrite'           => ['slug' => 'skills'],
    ];
	register_taxonomy('_themename_skills', ['_themename_portfolio'], $args);
}
add_action('init', '_themename__pluginname_register_skills_tax');