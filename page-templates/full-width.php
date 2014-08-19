<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: This is the home page template without any sidebars and only suits for the home page
 *
 * @package WordPress
 * @subpackage Highres-media
 * @since Highres-media 1.0
 */
get_header(); 

$desired_sub_layout = checkForTheRestOfThePagesAndLoadDifferentSubLayouts($_SERVER['REQUEST_URI']);
?>
	<div id="other_pages_middle_content" class="row">
    	<div class="container-fluid">
			<div id="portfolio_select_menu_header" class="col-md-12 extended_version_for_other_pages"><!-- --></div><!-- portfolio_select_menu_header / col-md-12 -->   		
			<?php get_template_part( $desired_sub_layout, 'page' ); ?>
			<div class="back-to-top hidden-phone hidden-tablet" style="display: block;">
				<i class="icon-chevron-up"></i>
				<span>Back to top</span>
			</div><!-- back-to-top / hidden-phone / hidden-tablet -->			
        </div><!-- container-fluid -->    
    </div><!-- other_pages_middle_content / row -->        
<?php get_footer(); ?>