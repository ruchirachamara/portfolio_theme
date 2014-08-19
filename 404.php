<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

        <div id="inner_middle_content_wrapper" class="span12">    
        
            <div class="container">
                <img src="<?=get_bloginfo('template_directory')?>/images/404_man.jpg" alt="Page not found" title="Page not found" />
            </div>    

        </div><!-- inner_middle_content_wrapper -->
        
	</div><!-- middle_content -->
    
	<?php get_sidebar( 'right' ); ?>

</div><!-- main_wrapper -->
    
<?php get_footer(); ?>