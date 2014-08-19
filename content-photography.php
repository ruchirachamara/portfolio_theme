<?php
$album_types = get_terms('album_type', 
							array(
								  'orderby'    => 'count',
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
			  <?php foreach($album_types as $each_album_type):?>	              
                <li>
                    <a id="album_type_<?=$each_album_type->slug?>" href="#filter" data-option-value=".<?=$each_album_type->slug?>"><?=strtoupper($each_album_type->name)?></a>
                </li>
              <?php endforeach;?>
            </ul><!-- top_header_portfolio_types_menu -->
            <ul id="top-header-social-icons-menu">
                <li><span>FOLLOW US ON</span></li>
                <li>
                    <a target="_new" href="https://www.facebook.com/www.highresmedia.net?ref=hl"><img src="<?=get_bloginfo('template_directory')?>/images/fb.jpg" alt="Follow us with facebook" /></a>
                </li>
                <li>
                    <div class="fb-like" data-href="https://www.facebook.com/www.highresmedia.net" data-width="100" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
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
			<i class="icon-chevron-up"></i>
			<span>Back to top</span>
		</div>
    </div><!-- span12 -->
</div><!-- portfolio_page_middle_content -->
