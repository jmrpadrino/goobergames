<?php
    ////////////////////////////////////////
    // WhataGoober TAXONOMIES
    ////////////////////////////////////////

    // Register Custom Taxonomy products
    function product_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'whatagoober' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'whatagoober' ),
            'menu_name'                  => __( 'Product Categories', 'whatagoober' ),
            'all_items'                  => __( 'All Items', 'whatagoober' ),
            'parent_item'                => __( 'Parent Item', 'whatagoober' ),
            'parent_item_colon'          => __( 'Parent Item:', 'whatagoober' ),
            'new_item_name'              => __( 'New Item Name', 'whatagoober' ),
            'add_new_item'               => __( 'Add New Item', 'whatagoober' ),
            'edit_item'                  => __( 'Edit Item', 'whatagoober' ),
            'update_item'                => __( 'Update Item', 'whatagoober' ),
            'view_item'                  => __( 'View Item', 'whatagoober' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'whatagoober' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'whatagoober' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'whatagoober' ),
            'popular_items'              => __( 'Popular Items', 'whatagoober' ),
            'search_items'               => __( 'Search Items', 'whatagoober' ),
            'not_found'                  => __( 'Not Found', 'whatagoober' ),
            'no_terms'                   => __( 'No items', 'whatagoober' ),
            'items_list'                 => __( 'Items list', 'whatagoober' ),
            'items_list_navigation'      => __( 'Items list navigation', 'whatagoober' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array( 'slug' => 'product' ),
        );
        register_taxonomy( 'type', array( 'product' ), $args );

    }
    add_action( 'init', 'product_taxonomy', 0 );

?>