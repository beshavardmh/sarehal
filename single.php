<?php
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		get_template_part('templates/single-content');
	}
} else {
	get_template_part( 'templates/content-none' );
}

get_footer();