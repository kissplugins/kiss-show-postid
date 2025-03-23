<?php
/**
 * Plugin Name: KISS Show Post ID Admin
 * Description: Adds a sortable post ID column to the far right of the admin post list for all post types.
 * Version: 1.1.1
 * Author: Your Name
 * License: GPL2+
 * Text Domain: kiss-show-post-id-admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Block activation if Admin Columns Pro is active
register_activation_hook( __FILE__, function () {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'codepress-admin-columns/codepress-admin-columns.php' ) ) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( 'KISS Show Post ID Admin cannot be activated because Admin Columns Pro is active.' );
    }
});

// Hook earlier to catch post types for column display
add_action( 'admin_init', function () {
    $post_types = get_post_types( [ 'show_ui' => true ], 'names' );

    foreach ( $post_types as $post_type ) {

        // Add the ID column
        add_filter( "manage_{$post_type}_posts_columns", function ( $columns ) {
            $columns['kiss_post_id'] = 'ID';
            return $columns;
        }, 999 );

        // Display the post ID
        add_action( "manage_{$post_type}_posts_custom_column", function ( $column_name, $post_id ) {
            if ( $column_name === 'kiss_post_id' ) {
                echo (int) $post_id;
            }
        }, 10, 2 );

        // Make it sortable
        add_filter( "manage_edit-{$post_type}_sortable_columns", function( $columns ) {
            $columns['kiss_post_id'] = 'ID';
            return $columns;
        } );

        // Sorting logic
        add_action( 'pre_get_posts', function( $query ) use ( $post_type ) {
            if (
                is_admin() &&
                $query->is_main_query() &&
                $query->get( 'post_type' ) === $post_type &&
                $query->get( 'orderby' ) === 'ID'
            ) {
                $query->set( 'orderby', 'ID' );
            }
        } );
    }
});