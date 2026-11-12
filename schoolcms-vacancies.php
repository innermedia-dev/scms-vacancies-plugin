<?php
/*
Plugin Name: Innermedia Vacancies Classic
Plugin URI: http://www.innermedia.co.uk
Description: 
Author URI: http://www.innermedia.co.uk
Version: 1.0
*/
//add vacancies post type
if ( ! defined( 'WPINC' ) ) {
	die;
}
function schoolcms_vacancies_scripts_styles(){
	wp_enqueue_style( 'schoolcms-vacancies-style', plugin_dir_url( __FILE__ ) . '/css/vacancies.css' );
	wp_enqueue_script( 'schoolcms-vacancies-script', plugin_dir_url( __FILE__ ) . '/js/vacancies.js',  array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'schoolcms_vacancies_scripts_styles' ); 

// Plugin Folder Path.
if ( ! defined( 'IM_VACANCIES_PLUGIN_DIR' ) ) {
	define( 'IM_VACANCIES_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
// Plugin Folder URL.
if ( ! defined( 'IM_VACANCIES_PLUGIN_URL' ) ) {
	define( 'IM_VACANCIES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
// Plugin Root File.
if ( ! defined( 'IM_VACANCIES_PLUGIN_FILE' ) ) {
	define( 'IM_VACANCIES_PLUGIN_FILE', __FILE__ );
}

//Register Post type
function scmsvacancies_register_cpt_vacancy() {
	register_post_type( 'vacancy', array(
	'labels' => array(
		'name' => 'Vacancies',
		'singular_name' => 'Vacancy',
		'menu_name' => 'Vacancies',
		'all_items' => 'All Vacancies',
		'edit_item' => 'Edit Vacancy',
		'view_item' => 'View Vacancy',
		'view_items' => 'View Vacancies',
		'add_new_item' => 'Add New Vacancy',
		'add_new' => 'Add New Vacancy',
		'new_item' => 'New Vacancy',
		'parent_item_colon' => 'Parent Vacancy:',
		'search_items' => 'Search Vacancies',
		'not_found' => 'No vacancies found',
		'not_found_in_trash' => 'No vacancies found in the bin',
		'archives' => 'Vacancy Archives',
		'attributes' => 'Vacancy Attributes',
		'insert_into_item' => 'Insert into vacancy',
		'uploaded_to_this_item' => 'Uploaded to this vacancy',
		'filter_items_list' => 'Filter vacancies list',
		'filter_by_date' => 'Filter vacancies by date',
		'items_list_navigation' => 'Vacancies list navigation',
		'items_list' => 'Vacancies list',
		'item_published' => 'Vacancy published.',
		'item_published_privately' => 'Vacancy published privately.',
		'item_reverted_to_draft' => 'Vacancy reverted to draft.',
		'item_scheduled' => 'Vacancy scheduled.',
		'item_updated' => 'Vacancy updated.',
		'item_link' => 'Vacancy Link',
		'item_link_description' => 'A link to a vacancy.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-id-alt',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
		2 => 'excerpt',
		3 => 'revisions',
		4 => 'thumbnail',
		5 => 'custom-fields',
	),
	'has_archive' => 'vacancies',
	'rewrite' => array(
		'feeds' => false,
	),
	'delete_with_user' => false,
) );
}
add_action( 'init', 'scmsvacancies_register_cpt_vacancy' );

register_activation_hook( __FILE__, function() {
    scmsvacancies_register_cpt_vacancy();
    flush_rewrite_rules();
} );


include( 'fields/vacancies-fields.php' );
include( 'inc/vacancies-functions.php' );