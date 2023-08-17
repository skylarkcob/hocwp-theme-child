<?php
/**
 * Template Name: Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$args = array(
	'paged' => HT_Frontend()->get_paged()
);

$query = new WP_Query( $args );

HOCWP_Theme()->add_loop_data( 'query', $query );

HT_Custom()->load_template( 'template-blog' );

get_footer();