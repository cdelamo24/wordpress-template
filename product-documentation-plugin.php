<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Product_Documentation_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Product Documentation Plugin
 * Description:       This plugin attach documentation to products.
 * Version:           1.0.0
 * Author:            Cristian Mateos López
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       product-documentation-plugin
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 */
define('PRODUCT_DOCUMENTATION_PLUGIN_VERSION', '1.0.0');

/**
 * Delegate plugin activation to class Product_Documentation_Plugin_Activator.
 */
function activate_product_documentation_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-product-documentation-plugin-activator.php';
    Product_Documentation_Plugin_Activator::activate();
}

/**
 * Delegate plugin deactivation to class Product_Documentation_Plugin_Deactivator.
 */
function deactivate_product_documentation_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-product-documentation-plugin-deactivator.php';
    Product_Documentation_Plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_product_documentation_plugin');
register_deactivation_hook(__FILE__, 'deactivate_product_documentation_plugin');

require plugin_dir_path(__FILE__) . 'includes/class-product-documentation-plugin.php';

/**
 * Begins execution of the plugin.
 * 
 * @since 1.0.0
 */
function run_product_documentation_plugin()
{
    $plugin = new Product_Documentation_Plugin();
    $plugin->run();
}
run_product_documentation_plugin();
