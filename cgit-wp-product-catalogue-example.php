<?php

/*

Plugin Name: Castlegate IT WP Product Catalogue Example
Plugin URI: http://github.com/castlegateit/cgit-wp-product-catalogue-example
Description: Example plugin demonstrating an extension to the Product Catalogue.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

/**
 * Add custom fields
 *
 * Custom fields are added with ACF. This functions appends a field to the array
 * of options passed to the acf_add_local_field_group() function for the main
 * product field group.
 */
add_filter('cgit_product_fields', function($fields) {
    $fields['fields'][] = array(
        'label' => 'Manufacturer',
        'name' => 'manufacturer',
        'key' => 'manufacturer',
        'type' => 'radio',
        'choices' => array(
            'nintendo' => 'Nintendo',
            'sony' => 'Sony',
            'sega' => 'Sega',
        ),
    );

    return $fields;
});

/**
 * Add custom fields to available query parameters
 *
 * This is the array of arguments that can appear in query strings and in the
 * options passed to the cgit_products() function. This function sets the
 * default search value for any product-related custom fields.
 */
add_filter('cgit_product_default_args', function($args) {
    $args['manufacturer'] = false;
    return $args;
});

/**
 * Add custom fields to meta query
 *
 * This function converts an argument or query string into the correct WordPress
 * meta query for the custom field(s). Combined with the default arguments
 * function above, this allow searches to include parameters such as
 * `?manufacturer=nintendo`.
 */
add_filter('cgit_product_meta_query', function($meta_query, $args) {
    if (isset($args['manufacturer']) && $args['manufacturer']) {
        $meta_query[] = array(
            'key' => 'manufacturer',
            'value' => $args['manufacturer'],
            'compare' => '=',
        );
    }

    return $meta_query;
}, 10, 2);

/**
 * Add custom field to product properties
 *
 * This filters converts an associative array into additional properties on the
 * Cgit\Product object.
 */
add_filter('cgit_product_properties', function($args, $id) {
    $args['product_manufacturer'] = get_field('manufacturer', $id);
    return $args;
}, 10, 2);

/**
 * Replace default search form
 *
 * This form will be used as the output of the cgit_product_search_form()
 * function, the product_search shortcode, and the product search widget.
 */
add_filter('cgit_product_render_search', function() {
    ob_start();
    include dirname(__FILE__) . '/views/search.php';
    return ob_get_clean();
});
