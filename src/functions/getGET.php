<?php 


if ( ! defined( 'ABSPATH' ) ) exit;
function CWWYA_getGET(){
    $post = wp_json_decode(sanitize_text_field(wp_json_encode(array(
        "data"=>$_GET
    ))));
    return $post["data"];
}