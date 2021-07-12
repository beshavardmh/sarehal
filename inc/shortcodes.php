<?php
add_shortcode( 'sarehal_home', 'sarehal_home_cb' );
function sarehal_home_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/home', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_voucher', 'sarehal_voucher_cb' );
function sarehal_voucher_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/voucher', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_order_received', 'sarehal_order_received_cb' );
function sarehal_order_received_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/order-received', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_plans', 'sarehal_plans_cb' );
function sarehal_plans_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/plans', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_signup', 'sarehal_signup_cb' );
function sarehal_signup_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/signup', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_eat', 'sarehal_eat_cb' );
function sarehal_eat_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/eat', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_blog', 'sarehal_blog_cb' );
function sarehal_blog_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/blog', null, compact('atts', 'content') );
    return ob_get_clean();
}

add_shortcode( 'sarehal_testpage', 'sarehal_testpage_cb' );
function sarehal_testpage_cb( $atts, $content = "" ) {
    ob_start();
    get_template_part( 'templates/shortcodes/testpage', null, compact('atts', 'content') );
    return ob_get_clean();
}