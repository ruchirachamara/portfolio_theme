<?php
$portfolio_types = get_terms('portfolio_types', 
							array(
								  'orderby'    => 'DESC',
								  'hide_empty' => 0
			 					)
						);
?>
<div id="portfolio_page_middle_content" class="row">
	<div id="portfolio_select_menu_header" class="span12">
      <div id="options" class="container">
            <ul id="top_header_portfolio_types_menu" class="option-set" data-option-key="filter">
              <li>
                  <a href="#filter" data-option-value="*" class="selected active_portfolio_type">SHOW ALL</a>
              </li>
			  <?php foreach($portfolio_types as $each_portfolio_type):?>	              
                <li>
                    <a id="portfolio_type_<?=$each_portfolio_type->slug?>" href="#filter" data-option-value=".<?=$each_portfolio_type->slug?>"><?=strtoupper($each_portfolio_type->name)?></a>
                </li>
              <?php endforeach;?>
            </ul><!-- top_header_portfolio_types_menu -->
            <ul id="top-header-social-icons-menu">
                <li><span>FOLLOW US ON</span></li>
                <li>
                    <a target="_new" href="https://www.facebook.com/people/Highresmedia-Techies/100008302214236"><img src="<?=get_bloginfo('template_directory')?>/images/fb.jpg" alt="Follow us with facebook" /></a>
                </li>
                <li>                    
                    <div class="fb-like" data-href="https://www.facebook.com/people/Highresmedia-Techies/100008302214236" data-width="100" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </li>
                <li>
                    <a target="_new" href="javascript:void(0);"><img src="<?=get_bloginfo('template_directory')?>/images/twit.jpg" alt="Follow us with twitter" /></a>
                </li>
                <li>
                    <a target="_new" href="javascript:void(0);"><img src="<?=get_bloginfo('template_directory')?>/images/linked.jpg" alt="Follow us with linkdin" /></a>
                </li>
            </ul><!-- top-header-social-icons-menu -->
        </div><!-- options / container -->   
  	</div><!-- portfolio_select_menu_header -->
    <div class="portfolio_content_wrapper span12">
    	<div id="portfolio_wrapper_internal_content" class="container ib-container">    
			<?php the_content(); ?>
        </div><!-- container -->  
        <div class="back-to-top hidden-phone hidden-tablet" style="display: block;">
			<i class="fa fa-chevron-up"></i>
			<span>Back to top</span>
		</div><!-- back-to-top hidden-phone hidden-tablet -->
    </div><!-- span12 -->
</div><!-- portfolio_page_middle_content -->
<!-- This is for the ajax preloader modal box when clicking the portfoio types buttons in the portfoio modal box -->
<div id="portfoio_waiting_modal_box" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div id="fadingBarsG">
            <div id="fadingBarsG_1" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_2" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_3" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_4" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_5" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_6" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_7" class="fadingBarsG"><!-- --></div>
            <div id="fadingBarsG_8" class="fadingBarsG"><!-- --></div>
        </div>	    	  
    	<div class="row waitingmodal_box_details">
        	<span>Please wait...</span>
        </div><!-- waitingmodal_box_details -->        
    </div><!-- modal-content -->
  </div><!-- modal-dialog modal-sm -->
</div><!-- portfoio_waiting_modal_box -->
<!-- This is for the right switching panel -->
<div class="switching_panel_wrapper_offset"><!-- --></div>	    
<div class="switching_panel_wrapper">
    <!--<a class="switching_button_link" href="javascript:void(0);"><img src="<?//=get_bloginfo('template_directory')?>/images/switch_image.png" class="switching_button" alt="Switch to Highresmedia Photography" /></a>-->
	<img src="<?=get_bloginfo('template_directory')?>/images/switch_image.png" class="switching_button" alt="Switch to Highresmedia Photography" />
    <span>SWITCH TO PHOTOGRAPHY</span>
</div><!-- switching_panel_wrapper -->
<!-- This is for the behind the scene switcing panel -->
<div class="switching_panel_behind_scene">
	<div class="row">
    	<img src="<?=get_bloginfo('template_directory')?>/images/dimuthu_prof_image.png" alt="Dimuthu Profile" />
    </div><!-- row -->
    <div class="row behind_panel_other_details">
    	<span>My name is Dimuthu Singhaarachchi, and I'm a Multimedia Artist and a Photographer.</span>
    </div><!-- behind_panel_other_details -->
    <div class="row behind_panel_other_details">
    	<a href="http://photography.highresmedia.net/">PHOTOGRAPHY.<br />HIGHRESMEDIA.NET</a>
    </div><!-- behind_panel_other_details -->
</div><!-- switching_panel_behind_scene -->