<?php
/*
Plugin Name: Connect Woo with your api
Plugin URI: https://github.com/franciscoblancojn/connect-woo-with-your-api
Description: This is a plugin that allows you to generate routes to connect your api with wordpress giving it the permissions you want, such as creating, editing and deleting products, orders and users. It will also send information on the creation, updating and deletion of orders, users and products to your apis.
Author: franciscoblancojn
Version: 1.0.0
Author URI: https://franciscoblanco.vercel.app/
License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('is_plugin_active'))
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');



//CWWYA_
define("CWWYA_KEY", 'CWWYA');
define("CWWYA_LOG", true);
define("CWWYA_BASENAME", plugin_basename(__FILE__));
define("CWWYA_DIR", plugin_dir_path(__FILE__));
define("CWWYA_URL", plugin_dir_url(__FILE__));
define("CWWYA_RUTE","cwwya");

function CWWYA_get_version()
{
    $plugin_data = get_plugin_data(__FILE__);
    $plugin_version = $plugin_data['Version'];
    return $plugin_version;
}


function CWWYA_log_dependencia(String $text)
{
?>
    <div class="notice notice-error is-dismissible">
        <p>
            <?= $text ?>
        </p>
    </div>
<?php
}

function CWWYA_required_validations()
{
    $requiredValidations = [
        [
            "validation" => is_plugin_active('woocommerce/woocommerce.php'),
            "error" => ('Connect Woo with your api requiere the plugin "Woocommerce"')
        ],
        [
            "validation" => (is_callable('curl_init') &&
                function_exists('curl_init') &&
                function_exists('curl_close') &&
                function_exists('curl_exec') &&
                function_exists('curl_setopt_array')),
            "error" => ('Connect Woo with your api requiere "Curl"')
        ],
    ];
    $sw = true;
    for ($i = 0; $i < count($requiredValidations); $i++) {
        $vaidation = $requiredValidations[$i]['validation'];
        $error = $requiredValidations[$i]['error'] ?? '';
        if (!$vaidation) {
            add_action('admin_notices', function () use ($error) {
                CWWYA_log_dependencia($error);
            });
            $sw = false;
        }
    }
    return $sw;
}
if (CWWYA_required_validations()) {
    require_once CWWYA_DIR . 'update.php';
    github_updater_plugin_wordpress([
        'basename' => CWWYA_BASENAME,
        'dir' => CWWYA_DIR,
        'file' => "index.php",
        'path_repository' => 'franciscoblancojn/connect-woo-with-your-api',
        'branch' => 'master',
        'token_array_split' => [
            "g",
            "h",
            "p",
            "_",
            "G",
            "4",
            "W",
            "E",
            "W",
            "F",
            "p",
            "V",
            "U",
            "E",
            "F",
            "V",
            "x",
            "F",
            "U",
            "n",
            "b",
            "M",
            "k",
            "P",
            "R",
            "x",
            "o",
            "f",
            "t",
            "Y",
            "8",
            "z",
            "j",
            "t",
            "4",
            "E",
            "x",
            "b",
            "i",
            "9"
        ]
    ]);
    require_once CWWYA_DIR . 'src/_index.php';
}
