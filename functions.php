<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', 'srh_setup');
function srh_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );

    add_filter('use_block_editor_for_post_type', '__return_false');

    add_action('init', function (){
        if(!session_id()) {
            session_start();
        }
    }, 1);
}


add_action('wp_enqueue_scripts', 'srh_enqueue');
function srh_enqueue()
{
    wp_enqueue_style('bootstrap-customize', get_template_directory_uri() . '/assets/css/bootstrap-customize.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/app.css');

    wp_enqueue_script('bootstrap-customize', get_template_directory_uri() . '/assets/js/bootstrap-customize.min.js', array('jquery'), null, 'true');
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, 'true');
    wp_enqueue_script('sarehal-lazyload', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array('jquery'), null, 'true');
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), null, 'true');
    wp_localize_script('app', 'sarehal_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax_nonce')));
}

add_action('admin_enqueue_scripts', 'srh_admin_enqueue');
function srh_admin_enqueue()
{
    wp_enqueue_style('app-admin', get_template_directory_uri() . '/assets/css/app-admin.css');
    wp_enqueue_script('app-admin', get_template_directory_uri() . '/assets/js/app-admin.js', array('jquery'), null, 'true');
}


require_once("inc/db_manager.php");

require_once("inc/hooks.php");

require_once("inc/shortcodes.php");

require_once("inc/ajaxHandler.php");

require_once("inc/admin_menus.php");

