<?php

/**
 * The admin-specific functionality of the plugin.
 * 
 * Defines the plugin name, version, and metabox for upload documentation.
 * 
 * @package     Product_Documentation_Plugin
 * @subpackage  Product_Documentation_Plugin/admin
 * @author      Cristian Mateos López
 */
class Product_Documentation_Plugin_Admin
{
    /**
     * The ID of this plugin.
     * 
     * @since   1.0.0
     * @access  private
     * @var     string      $plugin_name        The id of this plugin.
     */
    private string $plugin_name;

    /**
     * Initialize the class and set its variables.
     * 
     * @since   1.0.0
     * 
     * @param   string      $plugin_name    The name of this plugin.
     */
    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
    }

    /**
     * Register the new meta boxes for the admin area.
     * 
     * @since   1.0.0
     */
    public function add_new_meta_box()
    {
        add_meta_box(
            $this->plugin_name . '-metabox',
            __('Add technical documentation', $this->plugin_name),
            array($this, ''),
            'product'
        );
    }

    public function custom_html()
    {
        echo 'hola';
    }
}
