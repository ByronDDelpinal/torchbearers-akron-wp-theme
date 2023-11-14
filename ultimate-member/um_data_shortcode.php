<?php 
function get_user_data($atts) {
    return um_user(shortcode_atts( array (
        'value' => 'member_id'
    ), $atts )['value']);
}
add_shortcode('userdata', 'get_user_data');
?>