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

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Countries', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Countries', 'textdomain' ),
		'all_items'         => __( 'All Countries', 'textdomain' ),
		'parent_item'       => __( 'Parent Country', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Country:', 'textdomain' ),
		'edit_item'         => __( 'Edit Country', 'textdomain' ),
		'update_item'       => __( 'Update Country', 'textdomain' ),
		'add_new_item'      => __( 'Add New Country', 'textdomain' ),
		'new_item_name'     => __( 'New Country Name', 'textdomain' ),
		'menu_name'         => __( 'Country', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', array( 'cl_films' ), $args );
        
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


add_filter( 'the_content', 'add_data_in_film_type' );
function add_data_in_film_type( $content ) {
 
    // Check if we're inside the main loop in a single post page.
    if ( is_post_type_archive('cl_films') ) {
        $meta_content = '';
        $tax_list = array(
                    'genre'=>'Genre',
                    'country'=>'Country',
                    );
		
        foreach($tax_list as $tax_id=>$tax){
            $meta_content .= "<h5 class='d-inline'>$tax : </h5>";

            $terms = wp_get_post_terms(get_the_ID(), $tax_id, array("fields" => "all"));
            $list = array();
            foreach ($terms as $term) {
                $list[] = '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
            }

            $meta_content .= implode(', ',$list);
            $meta_content .= "<br />";
        }
        
        $meta_content .= "<h5 class='d-inline'>Ticket Price:</h5> ". get_field( 'ticket_price', get_the_ID())."$";
        $meta_content .= "<br />";
        // get raw date
        $date = get_field('release_date', false, false);

        // make date object
        $date = new DateTime($date);
        
        $meta_content .= "<h5 class='d-inline'>Release Date:</h5>". $date->format('j M Y');
        return $content . $meta_content;
    }
 
    return $content;
}


add_action( 'widgets_init', 'films_widget_init' );
 
function films_widget_init() {
    register_widget( 'films_widget' );
}
 
class films_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'films_widget',
            'description' => 'A widget to show 5 films posts'
        );
 
        parent::__construct( 'films_widget', 'Films Widget', $widget_details );
 
    }
 
    public function form( $instance ) {
        // Backend Form
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {
        // Frontend display HTML
        $args = array(
            'numberposts' => 5,
            'post_type'   => 'cl_films'
        );

        $latest_films = get_posts( $args );
        
//        echo "<pre>";print_r($latest_films);echo "</pre>";
//        exit;

        
        echo "<h1>5 Latest Films</h1>";
        echo '<ul class="list-group list-group-flush">';
        if ( $latest_films ) {
            foreach ( $latest_films as $post ) :
                //setup_postdata( $post ); ?>
                <li class="list-group-item"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title . $post->ID; ?></a></li>

            <?php
            endforeach; 
            wp_reset_postdata();
        }
                    
        echo '</ul>';
        
    }
 
}

//$debug_tags = array();
//add_action( 'all', function ( $tag ) {
//    global $debug_tags;
//    if ( in_array( $tag, $debug_tags ) ) {
//        return;
//    }
//    echo "<pre>" . $tag . "</pre>";
//    $debug_tags[] = $tag;
//} );