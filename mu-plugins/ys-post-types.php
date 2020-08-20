<?php

add_action('init', 'ys_products_post_types');

function ys_products_post_types()
{

    register_post_type('ys_product', [

        // Post type arguments.
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_rest'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-products',
        'hierarchical'        => false,
        'has_archive'         => 'products',
        'query_var'           => 'product',
        'map_meta_cap'        => true,

        // The rewrite handles the URL structure.
        'rewrite' => [
            'slug'       => 'products',
            'with_front' => false,
            'pages'      => true,
            'feeds'      => true,
            'ep_mask'    => EP_PERMALINK,
        ],

        // Features the post type supports.
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ],

        'taxonomies' => [
            'category'
        ],


        // Text labels.
        'labels' => [
            'name'                     => 'Yousafe Products',
            'singular_name'            => 'Yousafe Product',
            'add_new'                  => 'Add New',
            'add_new_item'             => 'Add New Yousafe Product',
            'edit_item'                => 'Edit Yousafe Product',
            'new_item'                 => 'New Yousafe Product',
            'view_item'                => 'View Yousafe Product',
            'view_items'               => 'View Yousafe Products',
            'search_items'             => 'Search Yousafe Products',
            'not_found'                => 'No Yousafe Products found.',
            'not_found_in_trash'       => 'No Yousafe Products found in Trash.',
            'all_items'                => 'All Yousafe Products',
            'archives'                 => 'Yousafe Product Archives',
            'attributes'               => 'Yousafe Product Attributes',
            'insert_into_item'         => 'Insert into Yousafe Product',
            'uploaded_to_this_item'    => 'Uploaded to this Yousafe Product',
            'featured_image'           => 'Yousafe Product Image',
            'set_featured_image'       => 'Set Yousafe Product image',
            'remove_featured_image'    => 'Remove Yousafe Product image',
            'use_featured_image'       => 'Use as Yousafe Product image',
            'filter_items_list'        => 'Filter Yousafe Products list',
            'items_list_navigation'    => 'Yousafe Products list navigation',
            'items_list'               => 'Yousafe Products list',
            'item_published'           => 'Yousafe Product published.',
            'item_published_privately' => 'Yousafe Product published privately.',
            'item_reverted_to_draft'   => 'Yousafe Product reverted to draft.',
            'item_scheduled'           => 'Yousafe Product scheduled.',
            'item_updated'             => 'Yousafe Product updated.',

        ]

    ]);
}
