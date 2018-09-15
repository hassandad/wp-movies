<?php

function unite_child_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'unite-style' for the Unite theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles' );


function create_fils_posttype() {
  register_post_type( 'cl_films',
    array(
      'labels' => array(
        'name' => __( 'Films' ),
        'singular_name' => __( 'Film' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'films'),
    )
  );
}
add_action( 'init', 'create_fils_posttype' );


// create four taxonomies, Genre, Country, Year and Actors for the post type "cl_films"
function create_film_taxonomies() {
    
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Genres', 'textdomain' ),
		'all_items'         => __( 'All Genres', 'textdomain' ),
		'parent_item'       => __( 'Parent Genre', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
		'edit_item'         => __( 'Edit Genre', 'textdomain' ),
		'update_item'       => __( 'Update Genre', 'textdomain' ),
		'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
		'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
		'menu_name'         => __( 'Genre', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'cl_films' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Countries', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Country', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Countries', 'textdomain' ),
		'popular_items'              => __( 'Popular Countries', 'textdomain' ),
		'all_items'                  => __( 'All Countries', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Country', 'textdomain' ),
		'update_item'                => __( 'Update Country', 'textdomain' ),
		'add_new_item'               => __( 'Add New Country', 'textdomain' ),
		'new_item_name'              => __( 'New Country Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate countries with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove countries', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used countries', 'textdomain' ),
		'not_found'                  => __( 'No countries found.', 'textdomain' ),
		'menu_name'                  => __( 'Countries', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', 'cl_films', $args );
        
        // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Years', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Years', 'textdomain' ),
		'all_items'         => __( 'All Year', 'textdomain' ),
		'parent_item'       => __( 'Parent Year', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Year:', 'textdomain' ),
		'edit_item'         => __( 'Edit Year', 'textdomain' ),
		'update_item'       => __( 'Update Year', 'textdomain' ),
		'add_new_item'      => __( 'Add New Year', 'textdomain' ),
		'new_item_name'     => __( 'New Year Name', 'textdomain' ),
		'menu_name'         => __( 'Year', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'year' ),
	);

	register_taxonomy( 'year', array( 'cl_films' ), $args );
        
        
        // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Actors', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Actor', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Actors', 'textdomain' ),
		'all_items'         => __( 'All Actors', 'textdomain' ),
		'parent_item'       => __( 'Parent Actor', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Actor:', 'textdomain' ),
		'edit_item'         => __( 'Edit Actor', 'textdomain' ),
		'update_item'       => __( 'Update Actor', 'textdomain' ),
		'add_new_item'      => __( 'Add New Actor', 'textdomain' ),
		'new_item_name'     => __( 'New Actor Name', 'textdomain' ),
		'menu_name'         => __( 'Actor', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'actor' ),
	);

	register_taxonomy( 'actor', array( 'cl_films' ), $args );
}
// hook into the init action and call create_film_taxonomies when it fires
add_action( 'init', 'create_film_taxonomies', 0 );
