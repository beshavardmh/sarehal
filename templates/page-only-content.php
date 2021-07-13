<?php /* Template Name: without header & footer */
ob_start();
get_header('none');

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        the_content();
    }
} else {
    get_template_part( 'templates/content-none' );
}

get_footer('none');
ob_end_flush();