<?php

add_action( 'admin_menu', 'sarehal_plans_menu' );

function sarehal_plans_menu(){
    add_menu_page(
        'اشتراک‌ها',
        'اشتراک‌ها',
        'manage_options',
        'sarehal-plans',
        'sarehal_plans_menu_cb',
        'dashicons-awards',
        6
    );
}

function sarehal_plans_menu_cb(){
    get_template_part('templates/admin_menus/plans');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_plans_options_menu');

function sarehal_plans_options_menu() {
    add_submenu_page(
        'sarehal-plans',
        'گزینه‌های اشتراک‌ها',
        'گزینه‌ها',
        'manage_options',
        'sarehal-plans-options',
        'sarehal_plans_options_menu_cb' );
}

function sarehal_plans_options_menu_cb() {
    get_template_part('templates/admin_menus/options_plans');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_plans_duration_menu');

function sarehal_plans_duration_menu() {
    add_submenu_page(
        'sarehal-plans',
        'مدت‌های اشتراک‌ها',
        'مدت‌ها',
        'manage_options',
        'sarehal-plans-durations',
        'sarehal_plans_durations_menu_cb' );
}

function sarehal_plans_durations_menu_cb() {
    get_template_part('templates/admin_menus/duration_plans');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_plans_discounts_menu');

function sarehal_plans_discounts_menu() {
    add_submenu_page(
        'sarehal-plans',
        'کد‌های تخفیف',
        'کد‌های تخفیف',
        'manage_options',
        'sarehal-plans-discounts',
        'sarehal_plans_discounts_menu_cb' );
}

function sarehal_plans_discounts_menu_cb() {
    get_template_part('templates/admin_menus/discounts_plans');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_transactions_menu');

function sarehal_transactions_menu() {
    add_menu_page(
        'تراکنش‌ها',
        'تراکنش‌ها',
        'manage_options',
        'sarehal-transactions',
        'sarehal_transactions_menu_cb',
        'dashicons-money-alt',
        6
    );
}

function sarehal_transactions_menu_cb() {
    get_template_part('templates/admin_menus/transactions');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_users_menu');

function sarehal_users_menu() {
    add_menu_page(
        'لید‌ها',
        'لید‌ها',
        'manage_options',
        'sarehal-leads',
        'sarehal_users_menu_cb',
        'dashicons-groups',
        6
    );
}

function sarehal_users_menu_cb() {
    get_template_part('templates/admin_menus/users');
}

//--------------------------------------------------------------

add_action('admin_menu', 'sarehal_customers_menu');

function sarehal_customers_menu() {
    add_menu_page(
        'مشتری‌ها',
        'مشتری‌ها',
        'manage_options',
        'sarehal-customers',
        'sarehal_customers_menu_cb',
        'dashicons-buddicons-buddypress-logo',
        6
    );
}

function sarehal_customers_menu_cb() {
    get_template_part('templates/admin_menus/customers');
}