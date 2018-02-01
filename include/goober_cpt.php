<?php
    /*--------------------------------------
    Custom Post Types for Whatabooger
    --------------------------------------*/

    // Register Custom Post Type for Gamess
    function goober_Games() {

        $labels = array(
            'name'                  => _x( 'Games', 'Post Type General Name', 'goobergames' ),
            'singular_name'         => _x( 'Game', 'Post Type Singular Name', 'goobergames' ),
            'menu_name'             => __( 'Games', 'goobergames' ),
            'name_admin_bar'        => __( 'Game', 'goobergames' ),
            'archives'              => __( 'Item Archives', 'goobergames' ),
            'attributes'            => __( 'Item Attributes', 'goobergames' ),
            'parent_item_colon'     => __( 'Parent Item:', 'goobergames' ),
            'all_items'             => __( 'All Items', 'goobergames' ),
            'add_new_item'          => __( 'Add New Item', 'goobergames' ),
            'add_new'               => __( 'Add New', 'goobergames' ),
            'new_item'              => __( 'New Item', 'goobergames' ),
            'edit_item'             => __( 'Edit Item', 'goobergames' ),
            'update_item'           => __( 'Update Item', 'goobergames' ),
            'view_item'             => __( 'View Item', 'goobergames' ),
            'view_items'            => __( 'View Items', 'goobergames' ),
            'search_items'          => __( 'Search Item', 'goobergames' ),
            'not_found'             => __( 'Not found', 'goobergames' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'goobergames' ),
            'featured_image'        => __( 'Featured Image', 'goobergames' ),
            'set_featured_image'    => __( 'Set featured image', 'goobergames' ),
            'remove_featured_image' => __( 'Remove featured image', 'goobergames' ),
            'use_featured_image'    => __( 'Use as featured image', 'goobergames' ),
            'insert_into_item'      => __( 'Insert into item', 'goobergames' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'goobergames' ),
            'items_list'            => __( 'Items list', 'goobergames' ),
            'items_list_navigation' => __( 'Items list navigation', 'goobergames' ),
            'filter_items_list'     => __( 'Filter items list', 'goobergames' ),
        );
        $args = array(
            'label'                 => __( 'Games', 'goobergames' ),
            'description'           => __( 'Goober Games', 'goobergames' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'gallery',  ),
            'taxonomies'            => array( 'games' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-smiley',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'our-games',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type( 'game', $args );

    }
    add_action( 'init', 'goober_Games', 0 );

?>