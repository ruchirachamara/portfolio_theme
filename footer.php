<?php
/**
 * The Footer template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Highres-media
 * @since Highres-media 1.0
 */
$bottom_menu = generate_custom_menus(wp_get_nav_menu_items('bottom_menu')); 
$modified_url_segments = explode_given_url_to_custom_parts($_SERVER['REQUEST_URI']);
$current_url = end($modified_url_segments);
if ($current_url == "www.highres-media.com") $current_url = "";
?>
</div><!-- main_wrapper -->    
<footer>    
		<div id="facebook_twitter_plugins_container" class="container">
				<div id="google_plus_feed_wrapper" class="col-md-4">        
						<iframe src="http://widgetsplus.com:8080/48208.htm" width="325" height="295" style="padding:0; margin:0; overflow:hidden;" frameborder="0"></iframe>
				</div><!-- twitts_wrapper / col-md-6 -->
				<div id="client_testomonails_wrapper" class="col-md-4">
					<div id="twitts_wrapper" class="row">
						<div id="twitter-feed"><!-- --></div>
					</div><!-- twitter_feed_wrapper / row -->          
					<?php /*?>
					<div id="events_section" class="row">
							<h2>Last Activities</h2>
							<div id="past_photo_shoots" class="col-md-12">                  
									<ul id="events_ticker">                            
									<?php foreach($events_query->posts as $each_block):?>                               
											<li>
													<a href="<?=home_url().'/events/'.$each_block->post_name;?>"><?=( (strlen($each_block->post_title) > 80) ? (substr($each_block->post_title, 0, 80).'...') : ($each_block->post_title) );?></a>
											</li> 
									<?php endforeach;?>
									</ul>                  
							</div><!-- past_photo_shoots -->
					</div><!-- events_section -->
					<?php */?>
				</div><!-- client_testomonails_wrapper / col-md-5 -->  
				<div id="facepie_wrapper" class="col-md-4">
					<div class="fb-facepile" data-app-id="676679132380203" data-href="https://www.facebook.com/people/Highresmedia-Techies/100008302214236" data-width="325" data-height="295" data-max-rows="1" data-colorscheme="light" data-size="medium" data-show-count="true"></div>					
				</div><!-- facepie_wrapper / col-md-6 -->
		</div><!-- facebook_twitter_plugins_container / row -->
		<div id="footer_bottom_content" class="container">
				<div class="col-md-8">
						<div id="main_bottom_menu_wrapper" class="col-md-12">
								<ul id="main_bottom_menu">
										<?php foreach($bottom_menu as $eachMenu):?>
												<li class="<?=((isset($eachMenu['submenu'])) ? 'have_sub' : '')?>">
														<a class="<?=(($current_url != "") && (strstr($eachMenu['url'], $current_url))) ? 'selected_main_bottom_menu' : ''?>" href="<?=$eachMenu['url']?>"><?=$eachMenu['title']?></a>                                
														<?php if (isset($eachMenu['submenu'])):?>
														<ul>
																<?php foreach($eachMenu['submenu'] as $each_submenu_item):?>
																		<li>
																				<a class="top_most_menu_link_child <?=(($current_url != "") && (strstr($each_submenu_item['url'], $current_url))) ? 'selected_main_header_menu' : ''?>" href="<?=$each_submenu_item['url']?>"><?=$each_submenu_item['title']?></a>                                        
																		</li>                                                
																<?php endforeach;?>
														</ul>
														<?php endif;?>                                    
												</li>
												<li class="seperator"><span>|</span></li>                                        
										<?php endforeach;?>             
								</ul><!-- main_bottom_menu / ul -->
								<span id="copyright_msg_wrapper_span">&copy; 2014 Highresmedia</span>
						</div><!-- main_bottom_menu_wrapper -->    
						<div id="copyright_msg_wrapper" class="col-md-12">
								<!--<span>&copy; 2014 Highresmedia.</span>-->
						</div><!-- copyright_msg_wrapper -->
				</div><!-- col-md-8 -->    
				<div id="solution_provider_name_wrapper" class="col-md-4 originalPosition">
						<span>Design &amp; Concept by </span>
				</div><!-- solution_provider_name_wrapper -->
		</div><!-- footer_bottom_content -->    
</footer><!-- footer -->    
<?php wp_footer(); ?>
<!-- Bootstrap Integration -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- Carousels js Integration -->
<script src="<?=get_bloginfo('template_directory')?>/js/carousels.js" type="text/javascript" language="javascript"></script>
<!-- Image Loading Plug in Integration -->
<script src="<?=get_bloginfo('template_directory')?>/js/jquery.isotope.min.js" type="text/javascript" language="javascript"></script>
<!-- Sharethis plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/share.js" type="text/javascript" language="javascript"></script>
<!-- Expander plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/jquery.expander.js" type="text/javascript" language="javascript"></script>
<!-- jQuery Rating plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/jRating.jquery.js" type="text/javascript" language="javascript"></script>
<!-- jQuery newsticker js plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/vticker.js" type="text/javascript" language="javascript"></script>
<!-- jQuery twitter widget js plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/widgets.js" type="text/javascript" language="javascript"></script>
<!-- jQuery mouse scroller js plug in -->
<script src="<?=get_bloginfo('template_directory')?>/js/jquery.mousewheel-3.0.6.pack.js" type="text/javascript" language="javascript"></script>
<!-- Our Custom js -->
<script src="<?=get_bloginfo('template_directory')?>/js/custom.js" type="text/javascript" language="javascript"></script>
<!-- Google analytics code goes here -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-52128603-1', 'highresmedia.net');
	ga('send', 'pageview');

</script>
<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u=(("https:" == document.location.protocol) ? "https" : "http") + "://localhost/piwik/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', 1]);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
		g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<noscript><p><img src="http://localhost/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html>