<?php

add_filter('upload_mimes', 'sarehal_mime_types');
function sarehal_mime_types($mimes)
{
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

add_filter('iran_date', 'get_iran_date');
function get_iran_date($format = 'Y-m-d H:i:s')
{
    $date = new DateTime("now", new DateTimeZone("Asia/Tehran"));
    return $date->format($format);
}



function sarehal_print_scripts_styles()
{
    $result = [];
    $result['scripts'] = [];
    $result['styles'] = [];
    $wp_scripts = wp_scripts();
    $wp_styles = wp_styles();

    $jquery_scripts = array('jquery-core', 'jquery-migrate');
    foreach ($jquery_scripts as $script) {
        $result['scripts'][] = $wp_scripts->registered[$script]->src;
    }

    foreach ($wp_scripts->queue as $script) :
        $result['scripts'][] = $wp_scripts->registered[$script]->src;
    endforeach;

    foreach ($wp_styles->queue as $style) :
        $result['styles'][] = $wp_styles->registered[$style]->src;
    endforeach;

    $GLOBALS['sarehal_assets'] = $result;
}

function sarehal_deregister_scripts_styles()
{
    $wp_scripts = wp_scripts();
    $wp_styles = wp_styles();

    foreach ($wp_scripts->registered as $wp_script) {
        wp_deregister_script($wp_script->handle);
    }

    foreach ($wp_styles->registered as $wp_style) {
        wp_deregister_style($wp_style->handle);
    }
}

function sarehal_preload_bundles()
{
    ob_start();
    ?>
    <link rel="preload" as="style" href="<?php echo get_template_directory_uri() . '/assets/compress/bundle.min.css'; ?>">
    <link rel="preload" as="script" href="<?php echo get_template_directory_uri() . '/assets/compress/bundle.min.js'; ?>" importance="hight">
    <link rel="preload" as="image" href="https://sarehal.com/wp-content/uploads/2021/06/Linear-Logo.svg">
    <?php
    ob_end_flush();
}

function sarehal_enqueue_bundles(){
    global $sarehal_assets;

    require_once 'assets_compress.php';

    wp_enqueue_script('bundle', Assets_compress::js($sarehal_assets['scripts'], 'bundle.min.js',1), null, null, 'true');

    wp_enqueue_style('bundle', Assets_compress::css($sarehal_assets['styles'], 'bundle.min.css',1));

    wp_localize_script('bundle', 'sarehal_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax_nonce')));
}

function assets_compress(){
    if( !(current_user_can('editor') || current_user_can('administrator')) ) {
        add_action('wp_enqueue_scripts', 'sarehal_print_scripts_styles', 99995);
        add_action('wp_enqueue_scripts', 'sarehal_deregister_scripts_styles', 99996);
        add_action('wp_head', 'sarehal_preload_bundles', 1);
        add_action('wp_enqueue_scripts', 'sarehal_enqueue_bundles', 99997);
    }
}

assets_compress();


