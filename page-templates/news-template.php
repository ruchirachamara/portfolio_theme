<?php
/**
 * Template Name: News Page Template, No Sidebar
 *
 * Description: This is the home page template without any sidebars and only suits for the home page
 *
 * @package WordPress
 * @subpackage highres-media
 * @since highres-media 1.0
 */
get_header(); ?>
	<div id="home_page_middle_content" class="span12">
    	<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
        </div>    
    </div>        
<?php get_footer(); ?>