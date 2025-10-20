<?php
/*
Plugin Name: SchoolCMS Vacancies
Plugin URI: http://www.innermedia.co.uk
Description: This requires Contact form 7, Contact form DB and Contact Form 7 Dynamic Text Extension. Updated to work with the 2017 version of SchoolCMS.
Version: 0.6
Author URI: http://www.innermedia.co.uk
GitHub Plugin URI: https://github.com/Esme-IM/cms-login-page
Primary Branch: main
*/
//add vacancies post type
add_action('init', 'cptui_register_my_cpt_vacancy');
function cptui_register_my_cpt_vacancy() {
register_post_type('vacancy', array(
'label' => 'Vacancies',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'vacancies', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','editor','excerpt','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'Vacancies',
  'singular_name' => 'Vacancy',
  'menu_name' => 'Vacancies',
  'add_new' => 'Add Vacancy',
  'add_new_item' => 'Add New Vacancy',
  'edit' => 'Edit',
  'edit_item' => 'Edit Vacancy',
  'new_item' => 'New Vacancy',
  'view' => 'View Vacancy',
  'view_item' => 'View Vacancy',
  'search_items' => 'Search Vacancies',
  'not_found' => 'No Vacancies Found',
  'not_found_in_trash' => 'No Vacancies Found in Trash',
  'parent' => 'Parent Vacancy',
)
) ); }
/* Filter vacancy post template*/
function include_vacancies_template_function( $template_path ) {
    if ( get_post_type() == 'vacancy' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-vacancy.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-vacancy.php';
            }
        }
        if(is_archive()){
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'archive-vacancy.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/archive-vacancy.php';
            }
        }
    }
    return $template_path;
}
add_filter( 'template_include', 'include_vacancies_template_function', 1 );

function register_vacancies_plugin_styles() {
       /* Register our stylesheet. */     
       wp_register_script('schoolcms-vacancies-scripts', plugins_url( 'schoolcms-vacancies/js/scripts.js' ));
       wp_enqueue_script('schoolcms-vacancies-scripts');
       wp_register_style( 'schoolcms-vacancies', plugins_url( 'schoolcms-vacancies/vacancy-style.css' ) );    
       wp_enqueue_style( 'schoolcms-vacancies' );        
   }
 add_action( 'wp_enqueue_scripts', 'register_vacancies_plugin_styles' );

if(!function_exists('return_job_ref')){
	function return_job_ref($args){
	  global $post;
	  return get_field('job_ref',$post->ID);
	}
	add_shortcode('job-ref','return_job_ref');
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5ac393d769392',
	'title' => 'Job Summary',
	'fields' => array (
		array (
			'key' => 'field_5ac393e6e6b90',
			'label' => 'Deadline',
			'name' => 'deadline',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'Ymd',
			'first_day' => 1,
		),
		array (
			'key' => 'field_5ac39439e6b92',
			'label' => 'Role',
			'name' => 'role',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5ac39440e6b93',
			'label' => 'Employment Type',
			'name' => 'employment_type',
			'type' => 'text',
			'instructions' => 'Full time, part time etc.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5ac39464e6b94',
			'label' => 'Salary',
			'name' => 'salary',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5ac39491e6b95',
			'label' => 'Further Information',
			'name' => 'further_information',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_5ac394a5e6b96',
					'label' => 'Label',
					'name' => 'label',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5ac39563e6b97',
					'label' => 'Info',
					'name' => 'info',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),		
		array (
			'key' => 'field_5ac3959be6b99',
			'label' => 'Qualification',
			'name' => 'qualification',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5ac395ade6b9a',
			'label' => 'Experience',
			'name' => 'experience',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5ac395bbe6b9b',
			'label' => 'Related Downloads',
			'name' => 'related_downloads',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_5ac395d1e6b9c',
					'label' => 'Documents',
					'name' => 'documents',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
		array (
			'key' => 'field_5ac395e8e6b9d',
			'label' => 'Online Application',
			'name' => 'online_application',
			'type' => 'true_false',
			'instructions' => 'This job can be applied for online',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_5ac39609e6b9e',
			'label' => 'Application Form',
			'name' => 'application_form',
			'type' => 'post_object',			
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5ac395e8e6b9d',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'vacancy',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
if(!function_exists("dropdownBox"))
{
function dropdownBox($atts,$content = null){
$a = shortcode_atts(array(
  'title'=>'',
),$atts);
  return '<div class="faq"><h3 class="faq-title">'.esc_attr($a['title']).'</h3>
					<div class="faq-content">'.do_shortcode($content).'</div>
					</div>';
}
add_shortcode('dropdown_box','dropdownBox');
}

//Archive Fix
function vacancies_archive_filter($query){
	 if ( ! is_admin() && is_post_type_archive( 'vacancy' ) && $query->is_main_query() ) {
		$today = date('Ymd');
		$query->set( 'posts_per_page', 10 );
		$query->set( 'meta_key', 'deadline' );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC');
		$query->set( 'meta_query', array(
			array(
				'key' => 'deadline',
				'compare' => '>=',
				'value' => $today,
			)
		));
	}	
}
add_action( 'pre_get_posts', 'vacancies_archive_filter' );

?>