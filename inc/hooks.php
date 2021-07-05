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
