<?php 
class WP_List_Category_Terms {
    public function init() {
        // Register the Gutenberg block.
        add_action( 'init', array( $this, 'register_block' ) );
    }

    public function register_block() {
        // Register block scripts and styles.
        wp_register_script(
            'wp-list-category-terms-block',
            WPLCT_PLUGIN_URL . 'assets/js/block.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            WPLCT_VERSION,
            true
        );

        wp_register_style(
            'wp-list-category-terms-block',
            WPLCT_PLUGIN_URL . 'assets/css/block.css',
            array(),
            WPLCT_VERSION
        );

        // Register the block.
        register_block_type( 'wp-list-category-terms/block', array(
            'editor_script' => 'wp-list-category-terms-block',
            'editor_style'  => 'wp-list-category-terms-block',
            'render_callback' => array( $this, 'render_block' ),
            'attributes' => array(
                'taxonomy' => array(
                    'type' => 'string',
                    'default' => 'your_custom_taxonomy',
                ),
            ),
        ) );
    }

    public function render_block( $attributes ) {
        // Get the taxonomy slug from the block attributes.
        $taxonomy = $attributes['taxonomy'];

        // Get the custom taxonomy terms.
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ) );

        // Start the output buffer.
        ob_start();
        struct -i dist -o new.tree
        // Loop through the terms and display them with their custom fields.
        foreach ( $terms as $term ) {
            // Get the custom fields for the term.
            $custom_fields = get_term_meta( $term->term_id );

            // Output the term name and custom fields.
            echo '<h2>' . $term->name . '</h2>';
            echo '<ul>';
            foreach ( $custom_fields as $key => $value ) {
                if ( ! empty( $value[0] ) ) {
                    echo '<li><strong>' . $key . ':</strong> ' . $value[0] . '</li>';
                }
            }
            echo '</ul>';
        }

        // End the output buffer and return the content.
        $content = ob_get_clean();
        return $content;
    }
}
