<?php

//Register Portfolio 
add_action( 'init', 'register_cpt_Portfolio' );

function register_cpt_Portfolio() {
    
    $labels = array( 
        'name' => __( 'Portfolios', 'mint' ),
        'singular_name' => __( 'Portfolio', 'mint' ),
        'add_new' => __( 'Add New Portfolio', 'mint' ),
        'add_new_item' => __( 'Add New Portfolio', 'mint' ),
        'edit_item' => __( 'Edit Portfolio', 'mint' ),
        'new_item' => __( 'New Portfolio', 'mint' ),
        'view_item' => __( 'View Portfolio', 'mint' ),
        'search_items' => __( 'Search Portfolios', 'mint' ),
        'not_found' => __( 'No Portfolios found', 'mint' ),
        'not_found_in_trash' => __( 'No Portfolios found in Trash', 'mint' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'mint' ),
        'menu_name' => __( 'Portfolios', 'mint' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'Portfolio_category','skills' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_stylesheet_directory_uri(). '/images/admin_ico_portfolio.png', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Portfolio', $args );
}
//Add Port folio Skill
    
add_action( 'init', 'create_Skills_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skills for your posts

function create_Skills_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Skills', 'mint' ),
    'singular_name' => __( 'Skill', 'mint' ),
    'search_items' =>  __( 'Search Skills','mint' ),
    'all_items' => __( 'All Skills','mint' ),
    'parent_item' => __( 'Parent Skill','mint' ),
    'parent_item_colon' => __( 'Parent Skill:','mint' ),
    'edit_item' => __( 'Edit Skill','mint' ), 
    'update_item' => __( 'Update Skill','mint' ),
    'add_new_item' => __( 'Add New Skill','mint' ),
    'new_item_name' => __( 'New Skill Name','mint' ),
    'menu_name' => __( 'Skills','mint' ),
  );     

// Now register the taxonomy

  register_taxonomy('Skills',array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'skills' ),
  ));

}
?>