<?php 


if ( ! defined( 'ABSPATH' ) ) exit;
function CWWYA_getPOST(){
    $post = json_decode(sanitize_text_field(json_encode(array(
        "data"=>$_POST
    ))));
    return $post["data"];
}