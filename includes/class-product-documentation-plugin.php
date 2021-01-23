<?php

/**
 * The core plugin class.
 *
 * This is used to define internazionalization, admin-specifig hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since       1.0.0
 * @package     Product_Documentation_Plugin
 * @subpackage  Product_Documentation_Plugin/includes
 * @author      Cristian Mateos López
 */
class Product_Documentation_Plugin
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since   1.0.0
     * @access  protected
     * @var     Product_Documentation_Plugin_Loader     $loader     Maintians and registers all hooks for the plugin.
     */
    protected Product_Documentation_Plugin_Loader $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since   1.0.0
     * @access  protected
     * @var     string          $plugin_name        The string used to uniquely identify this plugin.
     */
    protected string $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since   1.0.0
     * @access  protected
     * @var     string          $version            The current version of the plugin.
     */
    protected string $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since   1.0.0
     */
    public function __construct()
    {
        if (defined('PRODUCT_DOCUMENTATION_PLUGIN_VERSION')) {
            $this->version = PRODUCT_DOCUMENTATION_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'product-documentation-plugin';

        $this->load_dependencies();
        $this->define_admin_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     * - Product_Documentation_Plugin_Loader. Orchestrates the hooks of the plugin.
     * - Product_Documentation_Plugin_i18n. Defines internationalization functionality.
     * - Product_Documentation_Plugin_Admin. Defines all hooks for the admin area.
     * - Product_Documentation_Plugin_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks.
     *
     * @since   1.0.0
     * @access  private
     */
    private function load_dependencies(): void
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-product-documentation-plugin-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-product-documentation-plugin-admin.php';

        $this->loader = new Product_Documentation_Plugin_Loader();
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since   1.0.0
     * @access  private
     */
    private function define_admin_hooks(): void
    {
        $plugin_admin = new Product_Documentation_Plugin_Admin($this->plugin_name);

        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'add_new_meta_box');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since 1.0.0
     */
    public function run(): void
    {
        $this->loader->run();
    }
}
