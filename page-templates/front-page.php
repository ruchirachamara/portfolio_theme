<?php
/**
 * Template Name: Front Page Template, No Sidebar
 *
 * Description: This is the home page template without any sidebars and only suits for the home page
 *
 * @package WordPress
 * @subpackage highres-media
 * @since highres-media 1.0
 */
get_header(); 
// This is to get the custom post type portals 
$args = array(
    'post_type' => 'Portfolios',
    'post_status' => 'publish', 
    'posts_per_page' => -1,     	
    'orderby' => 'post_date', 
    'order' => 'DESC'
);
$Portfolios_query = new WP_Query($args);

wp_reset_postdata();

$olderIe = detect_ie_older_versions();

get_template_part( 'content', 'home' ); 

get_footer(); 
?>