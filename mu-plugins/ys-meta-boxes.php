<?php

add_action('add_meta_boxes_product', 'ys_product_register_meta_boxes');

function ys_product_register_meta_boxes()
{

    add_meta_box(
        'ys-product-model',
        'Product Model',
        'ys_product_model_meta_box',
        'product',
        'advanced',
        'high'
    );
}

function ys_product_model_meta_box($post)
{

    // Get the existing product model.
    $model = get_post_meta($post->ID, 'product_model', true);

    // Add a nonce field to check on save.
    wp_nonce_field(basename(__FILE__), 'ys-product-model'); ?>

    <p>
        <label>
            Product model name:
            <br />
            <input type="text" name="ys-product-model" value="<?php echo esc_attr($model); ?>" />
        </label>
    </p>

<?php }

add_action('save_post_product', 'ys_product_save_post');

function ys_product_save_post($post_id, $post)
{

    // Verify the nonce before proceeding.
    if (
        !isset($_POST['ys-product-model']) ||
        !wp_verify_nonce($_POST['ys-product-model'], basename(__FILE__))
    ) {
        return;
    }

    // Bail if user doesn't have permission to edit the post.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Bail if this is an Ajax request, autosave, or revision.
    if (
        wp_doing_ajax() ||
        wp_is_post_autosave($post_id) ||
        wp_is_post_revision($post_id)
    ) {
        return;
    }

    // Get the existing book author if the value exists.
    // If no existing book author, value is empty string.
    $old_model = get_post_meta($post_id, 'product_model', true);

    // Strip all tags from posted book author.
    // If no value is passed from the form, set to empty string.
    $new_model = isset($_POST['ys-product-model'])
        ? wp_strip_all_tags($_POST['ys-product-model'])
        : '';

    // If there's an old value but not a new value, delete old value.
    if (!$new_model & $old_model) {
        delete_post_meta($post_id, 'product_model');

        // If the new value doesn't match the new value, add/update.
    } elseif ($new_model !== $old_model) {
        update_post_meta($post_id, 'product_model', $new_model);
    }
}
