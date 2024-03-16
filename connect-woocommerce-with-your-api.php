<?php
/*
Plugin Name: Connect Woocommerce with your api
Plugin URI: https://github.com/franciscoblancojn/connect-woocommerce-with-your-api
Description: This is a plugin that allows you to generate routes to connect your api with wordpress giving it the permissions you want, such as creating, editing and deleting products, orders and users. It will also send information on the creation, updating and deletion of orders, users and products to your apis.
Author: franciscoblancojn
Version: 1.0.0
Author URI: https://franciscoblanco.vercel.app/
License: ISC
 */

 if ( ! defined( 'ABSPATH' ) ) exit;
if (!function_exists( 'is_plugin_active' ))
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
if(!is_plugin_active( 'woocommerce/woocommerce.php' )){
    function CWWYA_log_dependencia() {
        ?>
        <div class="notice notice-error is-dismissible">
            <p>
                Connect Woocommerce with your api requiere the plugin  "Woocommerce"
            </p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'CWWYA_log_dependencia' );
}else{
    if ( is_callable('curl_init') && 
        function_exists('curl_init') && 
        function_exists('curl_close') && 
        function_exists('curl_exec') && 
        function_exists('curl_setopt_array')
    ){

        function CWWYA_get_version() {
            $plugin_data = get_plugin_data( __FILE__ );
            $plugin_version = $plugin_data['Version'];
            return $plugin_version;
        }


        define("CWWYA_LOG",false);
        define("CWWYA_PATH",plugin_dir_path(__FILE__));
        define("CWWYA_URL",plugin_dir_url(__FILE__));
        
        require_once CWWYA_PATH . "src/_index.php";
    }else{
        function CWWYA_log_dependencia() {
            ?>
            <div class="notice notice-error is-dismissible">
                <p>
                Connect Woocommerce with your api requiere "Curl"
                </p>
            </div>
            <?php
        }
        add_action( 'admin_notices', 'CWWYA_log_dependencia' );
    }
}