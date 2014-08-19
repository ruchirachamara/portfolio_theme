<?php
/**
 * The Header template for our theme
 *
 * @package WordPress
 * @subpackage highres-media
 * @since highres-media 1.0
 */
/* 
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/
$top_menu = generate_custom_menus(wp_get_nav_menu_items('top_menu'));
$modified_url_segments = explode_given_url_to_custom_parts($_SERVER['REQUEST_URI']);
$current_url = end($modified_url_segments);
if ($current_url == "www.highres-media.com") $current_url = "";
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?=language_attributes?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?=language_attributes()?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?=language_attributes()?>>
<!--<![endif]--><head>
<meta charset="<?=bloginfo( 'charset' )?>" />
<meta name="viewport" content="width=device-width" />
<title><?=wp_title( '|', true, 'right' )?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?=home_url()?>/wp-content/uploads/2013/09/icon-150x90.png" />
<link rel="pingback" href="<?=bloginfo( 'pingback_url' )?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?=get_template_directory_uri()?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<!-- Include the bootstrap css file -->
<link href="<?=get_template_directory_uri()?>/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<!-- Include google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>    
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!-- Jquery Integration -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1-beta1/jquery.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript" language="javascript"></script>
<!-- Include Share JS file -->
<script src="<?=get_bloginfo('template_directory')?>/js/share.js" type="text/javascript" language="javascript"></script>
<!-- Include our custom css file -->
<link href="<?=get_template_directory_uri()?>/css/custom.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!-- Facebook like integration -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=676679132380203&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End of facebook like integration modification -->
	<div id="main_wrapper" class="row">    
        <header>      
            <div class="container">
                <div id="logo_wrapper" class="span4"><!-- --></div><!-- logo_wrapper -->
                <div id="header_menu_wrapper" class="span8">
                    <ul>
                        <li class="">                                            
							<a class="" href="http://www.highresmedia.net">HOME</a>                                    
                    	</li>  
                        <li class="seperator_wrapper"><span>^</span></li>                
                    <?php foreach($top_menu as $eachMenu):?>
                        <li class="<?=((isset($eachMenu['submenu'])) ? 'have_sub' : '')?>">
                            <a class="<?=((($eachMenu['attr_title'] == "Portfolio") && (is_front_page())) || ($current_url != "") && (strstr($eachMenu['url'], $current_url))) ? 'visited_menu_links' : ''?>" href="<?=$eachMenu['url']?>"><?=strtoupper($eachMenu['title'])?></a>                                
                            <?php if (isset($eachMenu['submenu'])):?>
                            <ul>
                                <?php foreach($eachMenu['submenu'] as $each_submenu_item):?>
                                    <li>
                                        <a class="top_most_menu_link_child <?=((($eachMenu['attr_title'] == "Portfolio") && (is_front_page())) || ($current_url != "") && (strstr($each_submenu_item['url'], $current_url))) ? 'visited_menu_links' : ''?>" href="<?=$each_submenu_item['url']?>"><?=strtoupper($each_submenu_item['title'])?></a>                                        
                                    </li>                                                
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>                                    
                        </li>                    
                        <li class="seperator_wrapper"><span>^</span></li>                        
                    <?php endforeach;?>           	
                    </ul>
                    <?php /*
                    <div id="header_select_menu_mobile" class="list-group">
                    <?php foreach($top_menu as $eachMenu):?>                  
                      	<a href="<?=$eachMenu['url']?>" class="list-group-item <?=(($current_url != "") && (strstr($eachMenu['url'], $current_url))) ? 'active' : ''?>"><?=$eachMenu['title']?></a>
                    <?php endforeach;?><!-- header_select_menu_mobile -->           	
                    </div>
                    */?>
                </div><!-- header_menu_wrapper -->  
            </div><!-- container -->   
        </header><!-- header -->        