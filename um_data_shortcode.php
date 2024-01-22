<?php 

/** 
*    Call shortcode and optionally specify an ultimate member field to retrieve
*
*       [userdata value='first_name'] : returns first_name of current user
*
*        [userdata] : returns member_id of current user
*/

function get_user_data($atts) {
    return um_user(shortcode_atts( array (
        'value' => 'member_id'
    ), $atts )['value']);
}
add_shortcode('userdata', 'get_user_data');
?>