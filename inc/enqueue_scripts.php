<?php
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
	if (is_front_page()){
		wp_enqueue_script('app-home', get_template_directory_uri() . '/assets/js/app-home.js', array('jquery'), null, 'true');
	}
	if (is_page('signup')){
		wp_enqueue_script('app-signup', get_template_directory_uri() . '/assets/js/app-signup.js', array('jquery'), null, 'true');
		wp_localize_script('app-signup', 'sarehal_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax_nonce')));
	}
	if (is_page('voucher')){
		wp_enqueue_script('app-voucher', get_template_directory_uri() . '/assets/js/app-voucher.js', array('jquery'), null, 'true');
		wp_localize_script('app-voucher', 'sarehal_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax_nonce')));
	}
}

add_action('admin_enqueue_scripts', 'srh_admin_enqueue');
function srh_admin_enqueue()
{
	wp_enqueue_style('app-admin', get_template_directory_uri() . '/assets/css/app-admin.css');
	wp_enqueue_script('app-admin', get_template_directory_uri() . '/assets/js/app-admin.js', array('jquery'), null, 'true');
}