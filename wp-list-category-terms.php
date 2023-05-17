<?php
/**
 * Plugin Name: WP List Category Terms
 * Description: A Gutenberg block to display custom taxonomy terms with custom fields.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants.
define('WPLCT_VERSION', '1.0.0');
define('WPLCT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WPLCT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include the main plugin class.
require_once WPLCT_PLUGIN_DIR . 'includes/class-wp-list-category-terms.php';

// Initialize the plugin.
$wp_list_category_terms = new WP_List_Category_Terms();
$wp_list_category_terms->init();
