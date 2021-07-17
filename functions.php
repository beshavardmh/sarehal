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

    add_image_size( 'sarehal_blog_thumbnail', 450, 300, true );
}

require_once("inc/enqueue_scripts.php");

require_once("inc/db_manager.php");

require_once("inc/hooks.php");

require_once("inc/shortcodes.php");

require_once("inc/ajaxHandler.php");

require_once("inc/admin_menus.php");

