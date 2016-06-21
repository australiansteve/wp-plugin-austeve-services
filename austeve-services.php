<?php
/**
 * Plugin Name: Services - Custom Post Type
 * Plugin URI: https://github.com/australiansteve/wp-plugin-austeve-services
 * Description: Showcase a portfolio of services
 * Version: 0.0.1
 * Author: AustralianSteve
 * Author URI: http://AustralianSteve.com
 * License: GPL2
 */

include( plugin_dir_path( __FILE__ ) . 'admin.php');
include( plugin_dir_path( __FILE__ ) . 'widget.php');

/*
* Creating a function to create our CPT
*/

function austeve_create_services_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'austeve-services' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'austeve-services' ),
		'menu_name'           => __( 'Services', 'austeve-services' ),
		'parent_item_colon'   => __( 'Parent Service', 'austeve-services' ),
		'all_items'           => __( 'All Services', 'austeve-services' ),
		'view_item'           => __( 'View Service', 'austeve-services' ),
		'add_new_item'        => __( 'Add New Service', 'austeve-services' ),
		'add_new'             => __( 'Add New', 'austeve-services' ),
		'edit_item'           => __( 'Edit Service', 'austeve-services' ),
		'update_item'         => __( 'Update Service', 'austeve-services' ),
		'search_items'        => __( 'Search Service', 'austeve-services' ),
		'not_found'           => __( 'Not Found', 'austeve-services' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'austeve-services' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Services', 'austeve-services' ),
		'description'         => __( 'Services of any type', 'austeve-services' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'author', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'rewrite'           => array( 'slug' => 'services' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'austeve-services', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'austeve_create_services_post_type', 0 );

function service_include_template_function( $template_path ) {
    if ( get_post_type() == 'austeve-services' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-services.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-services.php';
            }
        }
        else if ( is_archive() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'archive-services.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/archive-services.php';
            }
        }
    }
    return $template_path;
}
add_filter( 'template_include', 'service_include_template_function', 1 );

function service_filter_archive_title( $title ) {

    if( is_tax('austeve_service_types' ) ) {

        $title = single_cat_title( '', false ) . ' services';

    }
    else if ( is_post_type_archive('austeve-services') ) {

        $title = post_type_archive_title( '', false );

    }

    return $title;

}

add_filter( 'get_the_archive_title', 'service_filter_archive_title');

function austeve_services_enqueue_style() {
	wp_enqueue_style( 'austeve-services', plugin_dir_url( __FILE__ ). '/style.css' , false , '4.6'); 
}

function austeve_services_enqueue_script() {
	//wp_enqueue_script( 'my-js', 'filename.js', false );
}

add_action( 'wp_enqueue_scripts', 'austeve_services_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'austeve_services_enqueue_script' );

if ( ! function_exists( 'austeve_services_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function austeve_services_entry_footer() {
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'austeve-services' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

?>