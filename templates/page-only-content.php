<?php /* Template Name: without header & footer */

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