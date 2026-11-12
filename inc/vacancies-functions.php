<?php 
/* Filter vacancy post template*/
function include_vacancies_template_function( $template_path ) {
    if ( get_post_type() == 'vacancy' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-vacancy.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = IM_VACANCIES_PLUGIN_DIR . 'templates/single-vacancy.php';
            }
        }
        if(is_archive()){
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'archive-vacancy.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = IM_VACANCIES_PLUGIN_DIR . 'templates/archive-vacancy.php';
            }
        }
    }
    return $template_path;
}
add_filter( 'template_include', 'include_vacancies_template_function', 1 );

//Archive Fix
function vacancies_archive_filter($query){
	 if ( ! is_admin() && is_post_type_archive( 'vacancy' ) && $query->is_main_query() ) {
		$today = date('Ymd');
		$query->set( 'order', 'ASC');
		$query->set( 'orderby', 'meta_value_num' );
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