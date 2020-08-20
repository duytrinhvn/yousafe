<?php

add_action('init', 'ys_products_register_meta');

function ys_products_register_meta()
{
    register_post_meta('ys_product', 'product_model', [
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => function ($value) {
            return wp_strip_all_tags($value);
        }
    ]);
}
