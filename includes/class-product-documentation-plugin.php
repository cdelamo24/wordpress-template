<?php

class Product_Documentation_Plugin {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __constructor() {
        if ( defined( 'PRODUCT_DOCUMENTATION_PLUGIN_VERSION' ) ) {
            $this->version = PRODUCT_DOCUMENTATION_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'product-documentation-plugin';
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-product-documentation-plugin-loader.php';

        $this->loader = new Product_Documentation_Plugin_Loader();
    }

    public function run() {
        $this->loader->run();
    } 
}