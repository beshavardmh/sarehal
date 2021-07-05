<?php /* Template Name: simple header & footer */

get_header('simple');

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        the_content();
    }
} else {
    get_template_part( 'templates/content-none' );
}

get_footer('simple');