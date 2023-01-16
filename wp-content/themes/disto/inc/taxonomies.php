<?php
/*
* Creating a function to create our CPT
*/
 
add_action( 'init', 'festival_post_type', 0 );
function festival_post_type() {
    $labels = array(
        'name'                => _x( 'Festivals', 'Post Type General Name', 'disto' ),
        'singular_name'       => _x( 'Festival', 'Post Type Singular Name', 'disto' ),
        'menu_name'           => __( 'Festivals', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Festival', 'disto' ),
        'all_items'           => __( 'All Festivals', 'disto' ),
        'view_item'           => __( 'View Festival', 'disto' ),
        'add_new_item'        => __( 'Add New Festival', 'disto' ),
        'add_new'             => __( 'Add New', 'disto' ),
        'edit_item'           => __( 'Edit Festival', 'disto' ),
        'update_item'         => __( 'Update Festival', 'disto' ),
        'search_items'        => __( 'Search Festival', 'disto' ),
        'not_found'           => __( 'Not Found', 'disto' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'disto' ),
    );
 
    $args = array(
        'label'               => __( 'festival', 'disto' ),
        'description'         => __( 'Festival', 'disto' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'locations', 'genres', 'months', 'sizes', 'numberofdays', 'category', 'years', 'camping', 'miscellaneous' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
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
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'festivals', $args );
}

add_action( 'init', 'create_festival_location_taxonomy', 0 );
function create_festival_location_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item' => __( 'Edit Location' ), 
    'update_item' => __( 'Update Location' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
    'menu_name' => __( 'Locations' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('locations','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location' ),
  ));
}

add_action( 'init', 'create_festival_genre_taxonomy', 0 );
function create_festival_genre_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'menu_name' => __( 'Genres' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('genres','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genre' ),
  ));
}

add_action( 'init', 'create_festival_month_taxonomy', 0 );
function create_festival_month_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Months', 'taxonomy general name' ),
    'singular_name' => _x( 'Month', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Months' ),
    'all_items' => __( 'All Months' ),
    'parent_item' => __( 'Parent Month' ),
    'parent_item_colon' => __( 'Parent Month:' ),
    'edit_item' => __( 'Edit Month' ), 
    'update_item' => __( 'Update Month' ),
    'add_new_item' => __( 'Add New Month' ),
    'new_item_name' => __( 'New Month Name' ),
    'menu_name' => __( 'Months' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('months','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'month' ),
  ));
}

add_action( 'init', 'create_festival_size_taxonomy', 0 );
function create_festival_size_taxonomy() {
  
  $labels = array(
    'name' => _x( 'Sizes', 'taxonomy general name' ),
    'singular_name' => _x( 'Size', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sizes' ),
    'all_items' => __( 'All Sizes' ),
    'parent_item' => __( 'Parent Size' ),
    'parent_item_colon' => __( 'Parent Size:' ),
    'edit_item' => __( 'Edit Size' ), 
    'update_item' => __( 'Update Size' ),
    'add_new_item' => __( 'Add New Size' ),
    'new_item_name' => __( 'New Size Name' ),
    'menu_name' => __( 'Sizes' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('sizes','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'size' ),
  ));
}

add_action( 'init', 'create_festival_days_taxonomy', 0 );
function create_festival_days_taxonomy() {
  $labels = array(
    'name' => _x( 'Number of days', 'taxonomy general name' ),
    'singular_name' => _x( 'Number of days', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Number of days' ),
    'all_items' => __( 'All Number of days' ),
    'parent_item' => __( 'Parent Number of days' ),
    'parent_item_colon' => __( 'Parent Number of days:' ),
    'edit_item' => __( 'Edit Number of days' ), 
    'update_item' => __( 'Update Number of days' ),
    'add_new_item' => __( 'Add New Number of days' ),
    'new_item_name' => __( 'New Number of days Name' ),
    'menu_name' => __( 'Number of days' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('numberofdays','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'numberofdays' ),
  ));
}

add_action( 'init', 'create_festival_year_taxonomy', 0 );
function create_festival_year_taxonomy() {
  $labels = array(
    'name' => _x( 'Years', 'taxonomy general name' ),
    'singular_name' => _x( 'Year', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Years' ),
    'all_items' => __( 'All Years' ),
    'parent_item' => __( 'Parent Year' ),
    'parent_item_colon' => __( 'Parent Year:' ),
    'edit_item' => __( 'Edit Year' ), 
    'update_item' => __( 'Update Year' ),
    'add_new_item' => __( 'Add New Year' ),
    'new_item_name' => __( 'New Year Name' ),
    'menu_name' => __( 'Years' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('years','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'years' ),
  ));
}

add_action( 'init', 'create_festival_camping_taxonomy', 0 );
function create_festival_camping_taxonomy() {
  $labels = array(
    'name' => _x( 'Camping', 'taxonomy general name' ),
    'singular_name' => _x( 'Camping', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Camping' ),
    'all_items' => __( 'All Camping' ),
    'parent_item' => __( 'Parent Camping' ),
    'parent_item_colon' => __( 'Parent Camping:' ),
    'edit_item' => __( 'Edit Camping' ), 
    'update_item' => __( 'Update Camping' ),
    'add_new_item' => __( 'Add New Camping' ),
    'new_item_name' => __( 'New Year Camping' ),
    'menu_name' => __( 'Camping' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('camping','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'camping' ),
  ));
}

add_action( 'init', 'create_festival_miscellaneous_taxonomy', 0 );
function create_festival_miscellaneous_taxonomy() {
  $labels = array(
    'name' => _x( 'Miscellaneous', 'taxonomy general name' ),
    'singular_name' => _x( 'Miscellaneous', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search miscellaneous' ),
    'all_items' => __( 'All miscellaneous' ),
    'parent_item' => __( 'Parent miscellaneous' ),
    'parent_item_colon' => __( 'Parent miscellaneous:' ),
    'edit_item' => __( 'Edit miscellaneous' ), 
    'update_item' => __( 'Update miscellaneous' ),
    'add_new_item' => __( 'Add New miscellaneous' ),
    'new_item_name' => __( 'New Year miscellaneous' ),
    'menu_name' => __( 'Miscellaneous' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('miscellaneous','festivals', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'miscellaneous' ),
  ));
}