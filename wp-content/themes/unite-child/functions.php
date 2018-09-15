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

